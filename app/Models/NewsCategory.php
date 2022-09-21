<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Kalnoy\Nestedset\NodeTrait;
    use Illuminate\Support\Facades\DB;

    class NewsCategory extends BaseModel
    {
        use HasFactory, NodeTrait;

        protected $table = 'news_category';
        protected $slugField = 'slug';
        protected $slugFromField = 'name';

        protected $fillable = ['name', 'description', 'status', 'parent_id', 'create_user', 'update_user'];

        protected $fieldSearchAccepted = ['id', 'name'];


        public function posts()
        {
            return $this->belongsToMany(NewsPosts::class, 'news_category_posts')->withTimestamps();
        }

        public function listItems($params = null, $options = null)
        {
            $result = null;

            if ($options['task'] == 'ad-list-items') {
                $query = $this->with('author')->orderBy('id', 'desc');

                if ($params['filter']['status'] !== "all") {
                    $query->where('status', '=', $params['filter']['status']);
                }

                $result = $query->withDepth()
                    ->having('depth', '>', 0)
                    ->defaultOrder()
                    ->get()
                    ->toFlatTree();
            }
            return $result;
        }

        public function getItems($params = null, $options = null)
        {
            $result = null;
            // Get all categories form
            if ($options['task'] == 'get-item') {
                $result = $this->select('id', 'name', 'slug', 'icon_class', 'description', 'parent_id', 'status')
                    ->where('id', $params['id'])->first();
            }
            // Get list categories form
            if ($options['task'] == 'ad-list-category-form') {
                $query = $this->select('id', 'name')
                    ->withDepth()
                    ->defaultOrder();

                if (isset($params['id'])) {
                    $node = $this->findOrFail($params['id']);
                    $query->where('_lft', '<', $node->_lft)
                        ->orWhere('_rgt', '>', $node->_rgt);
                }

                $nodes = $query->get()->toFlatTree();

                foreach ($nodes as $node) {
                    $result[$node['id']] = str_repeat('|--', $node['depth']) . ' ' . $node['name'];
                }
            }

            // Get list categories form
            if ($options['task'] == 'ad-list-category-posts-form') {
                $result = $this->withDepth()
                    ->having('depth', '>', 0)
                    ->defaultOrder()
                    ->get()
                    ->toTree()->toArray();
            }

            return $result;
        }

        public function saveItem($params = null, $options = null)
        {
            if ($options['task'] == 'add-item') {
                $parent = $this->findOrFail($params['parent_id']);

                $this->create($this->prepareParams($params), $parent);
            }

            if ($options['task'] == 'edit-item') {
                $parent = $this->findOrFail($params['parent_id']);
                $query  = $current = $this->findOrFail($params['id']);

                $query->update($this->prepareParams($params));
                if ($current->parent_id != $params['parent_id']) $query->prependToNode($parent)->save();
            }
        }

        public function countItems($params = null, $options = null)
        {
            $result = null;
            if ($options['task'] == 'ad-count-items-group-by-status') {
                $query  = $this->where('id', '>', 1)
                    ->groupBy('status')
                    ->select(DB::raw('status , COUNT(id) as count'))
                    ->orderBy('status', 'DESC');
                $result = $query->get()->toArray();
            }
            return $result;
        }

        public function deleteItem($params = null, $options = null)
        {
            if ($options['task'] == 'delete-item') {
                $this->findOrFail($params['id'])->delete();
//            $node = $this->findOrFail($params['id']);
//            $node->delete();
            }

            if ($options['task'] == 'delete-all-item') {
                $this->whereIn('id', $params['id'])->delete();
            }
        }
    }

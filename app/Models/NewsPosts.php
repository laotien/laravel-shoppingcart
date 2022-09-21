<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

    class NewsPosts extends BaseModel
    {
        use HasFactory;

        protected $table = 'news_posts';
        protected $slugField = 'slug';
        protected $slugFromField = 'name';
        protected $crudNotAccepted = [];

        protected $fillable = ['name', 'description', 'content', 'slug', 'status', 'image', 'is_featured', 'views',];

        public function categories()
        {
            return $this->belongsToMany(NewsCategory::class, 'news_category_posts')->withTimestamps();
        }

        public function listItems($params = null, $options = null)
        {
            $result = null;

            if ($options['task'] == 'ad-list-items') {
                $query = $this->with('author', 'categories')->orderBy('id', 'desc');

                if ($params['filter']['status'] !== "all") {
                    $query->where('status', '=', $params['filter']['status']);
                }

                $result = $query->get();
            }
            return $result;
        }

        public function getItems($params = null, $options = null)
        {
            $result = null;
            // Get all categories form
            if ($options['task'] == 'ad-get-item') {
                $result = $this->with(['categories' => function ($q) {
                    $q->select('news_category.id', 'name');
                }])
                    ->select('id','name', 'description', 'content', 'slug', 'status', 'image', 'is_featured')
                    ->where('id', $params['id'])->first();
            }
            // Get select categories node
            if ($options['task'] == 'ad-get-category') {
                $query = $this->select('id', 'name')->where('_lft', '<>', NULL)
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
            return $result;
        }

        public function saveItem($params = null, $options = null)
        {
            if ($options['task'] == 'ad-add-item') {
                $post = $this->create($this->prepareParams($params));
                if (!empty($params['categories'])) $post->categories()->sync($params['categories']);
            }

            if ($options['task'] == 'ad-edit-item') {
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

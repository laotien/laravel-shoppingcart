<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Kalnoy\Nestedset\NodeTrait;
    use Illuminate\Support\Facades\DB;

    class BlogCategory extends BaseModel
    {
        use HasFactory, NodeTrait;

        protected $table = 'core_blog_category';

        protected $fillable
            = [
                'name',
                'description',
                'status',
                'parent_id',
                'create_user',
                'update_user'
            ];

        protected $fieldSearchAccepted
            = [
                'id',
                'name'
            ];

        protected $slugField = 'slug';
        protected $slugFromField = 'name';

        public function listItems($params = null, $options = null)
        {
            $result = null;

            if ($options['task'] == 'admin-list-items') {
                $query = $this->orderBy('id', 'desc');

                if ($params['filter']['status'] !== "all") {
                    $query->where('status', '=', $params['filter']['status']);
                }

                $result = $query->withDepth()
                    ->having('depth', '>', 0)
                    ->defaultOrder()
                    ->get()
                    ->toFlatTree()
                    ->toArray();
            }
            return $result;
        }

        public function getItems($params = null, $options = null)
        : array
        {
            $result = null;
            // Get all category form
            if ($options['task'] == 'get-item') {
                $result = self::select('id', 'name', 'slug', 'icon_class', 'description', 'parent_id', 'status')
                    ->where('id', $params['id'])->first();
            }
            // Get select categories node
            if ($options['task'] == 'get-category') {
                $query = self::select('id', 'name')->where('_lft', '<>', NULL)
                    ->withDepth()
                    ->defaultOrder();

                if (isset($params['id'])) {
                    $node = self::findOrFail($params['id']);
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
            if ($options['task'] == 'add-item') {
                $parent = self::findOrFail($params['parent_id']);

                self::create($this->prepareParams($params), $parent);
            }

            if ($options['task'] == 'edit-item') {
                $parent = self::findOrFail($params['parent_id']);
                $query  = $current = self::findOrFail($params['id']);

                $query->update($this->prepareParams($params));
                if ($current->parent_id != $params['parent_id']) $query->prependToNode($parent)->save();
            }
        }

        public function countItems($params = null, $options = null)
        {
            $result = null;
            if ($options['task'] == 'admin-count-items-group-by-status') {
                $query = self::groupBy('status')
                    ->select(DB::raw('status , COUNT(id) as count'))
                    ->orderBy('status', 'DESC');
                $result = $query->get()->toArray();
            }
            return $result;
        }

        public function deleteItem($params = null, $options = null)
        {
            if ($options['task'] == 'delete-item') {
                self::findOrFail($params['id'])->delete();
//            $node = self::findOrFail($params['id']);
//            $node->delete();
            }

            if ($options['task'] == 'delete-all-item') {
                self::whereIn('id', $params['id'])->delete();
            }
        }
    }

<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Kalnoy\Nestedset\NodeTrait;
    use Illuminate\Support\Facades\DB;

    class Category extends BaseModel
    {
        use HasFactory, NodeTrait;

        protected $table = 'categories';

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

        public function getAuthor ()
        {
            return $this->belongsTo(User::class, "create_user", "id");
        }

        public function listItems ($params = null, $options = null)
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
        {
            $result = null;
            // Get all categories form
            if ($options['task'] == 'get-item') {
                $result = $this->select('id', 'name', 'slug', 'icon_class', 'description', 'parent_id', 'status')
                    ->where('id', $params['id'])->first();
            }
            // Get select categories node
            if ($options['task'] == 'get-category') {
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
            if ($options['task'] == 'admin-count-items-group-by-status') {
                $query = $this->where('id', '>', 1)
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

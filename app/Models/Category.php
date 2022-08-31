<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;

class Category extends BaseModel
{
    use HasFactory, NodeTrait;

    protected $table = 'core_blog_category';

    protected $fillable = [
        'name',
        'description',
        'status',
        'parent_id',
        'create_user',
        'update_user'
    ];

    protected $slugField     = 'slug';
    protected $slugFromField = 'name';

    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'admin-list-items') {
            $result = self::withDepth()
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
        // Get all category form
        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'icon_class', 'description', 'parent_id', 'status')
                ->where('id', $params['id'])->first();
        }
        // Get select categories node
        if ($options['task'] == 'get-category') {
            $query = self::select('id', 'name')->where('_lft', '<>', NULL)->withDepth()->defaultOrder();

            if (isset($params['id'])) {
                $node = self::find($params['id']);
                $query->where('_lft', '<', $node->_lft)->orWhere('_rgt', '>', $node->_rgt);
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
        if($options['task'] == 'add-item') {
            $parent = self::find($params['parent_id']);

            self::create($this->prepareParams($params), $parent);
        }


    }
}

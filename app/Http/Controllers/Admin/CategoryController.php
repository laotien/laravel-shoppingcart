<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest as MainRequest;
use App\Models\Category as MainModel;

class CategoryController extends BaseController
{
    protected $params = [];
    protected $controllerName;
    protected $model;
    protected $pathViewController;

    public function __construct()
    {
        $this->model              = new MainModel();

        $this->pathViewController = 'admin.pages.category.';
        $this->controllerName     = 'category';
    }

    public function index(Request $request)
    {
        $items = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        return view($this->pathViewController . 'index', compact('items'));
    }

    public function form(Request $request)
    {
        $item     = null;

        if ($request->id !== null) {
            $this->params["id"] = $request->id;

            $item     = $this->model->getItems($this->params, ['task' => 'get-item']);
        }
        $categoryNodes = $this->model->getItems($this->params, ['task' => 'get-category']);

        $data = [
            'item'          => $item,
            'categoryNodes' => $categoryNodes,
            'breadcrumbs'   => [
                [
                    'name' => __('Categories'),
                    'url'  => route('admin.category.index')
                ],
                [
                    'name'  => __('Created'),
                    'class' => 'active'
                ],
            ],

        ];

        return view($this->pathViewController . 'form', compact('data'));
    }

    public function save(MainRequest $request)
    {
//        if ($request->isMethod('post')) {
//            $params = $request->all();
//
//            $task   = "add-item";
//            $notify = __('Create successful categories');
//
//            if($params['id'] !== null) {
//                $task   = "edit-item";
//                $notify = __('Update successful categories');
//            }
//
//            $this->model->saveItem($params, ['task' => $task]);
//            return redirect()->route($this->controllerName . 'index')->with("notify", $notify);
        }
    }
}

<?php

    namespace App\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use App\Http\Requests\PostUpdateRequest as MainRequest;
    use App\Models\Category as MainModel;

    class PostsController extends BaseController
    {
        protected $params = [];
        protected $controllerName;
        protected $model;
        protected $pathViewController;

        public function __construct()
        {
            $this->model              = new MainModel();
            $this->pathViewController = 'admin.pages.post.';
            $this->controllerName     = 'posts';

            view()->share('controllerName', $this->controllerName);
        }

        public function index(Request $request)
        {
            $this->params['filter']['status'] = $request->input('filter_status', 'all');

            $items            = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
            $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['status', 'count']]

            return view($this->pathViewController . 'index', [
                'params'           => $this->params,
                'items'            => $items,
                'itemsStatusCount' => $itemsStatusCount
            ]);
        }

        public function form(Request $request)
        {
            $item = null;

            if ($request->id !== null) {
                $this->params["id"] = $request->id;
                $item = $this->model->getItems($this->params, ['task' => 'get-item']);
            }
            $item['category'] = $this->model->getItems($this->params, ['task' => 'get-category']);

            return view($this->pathViewController . 'form', compact('item'));
        }


        public function save(MainRequest $request)
        {
            if ($request->isMethod('post')) {
                $params = $request->all();

                $task   = "add-item";
                $notify = __('Created successfully');

                if($params['id'] !== null) {
                    $task   = "edit-item";
                    $notify = __('Updated successfully');
                }

                $this->model->saveItem($params, ['task' => $task]);
                return redirect()->route($this->controllerName)->with("notify", $notify);
            }
        }

        public function destroy(Request $request)
        {
            $params["id"] = $request->id;
            $this->model->deleteItem($params, ['task' => 'delete-item']);

            return response("Deleted successfully.", 200);
        }

        public function itemsDestroy(Request $request)
        {
            $params["id"] = $request->ids;
            $this->model->deleteItem($params, ['task' => 'delete-all-item']);

            return response("Selected categories(s) deleted successfully.", 200);
        }

    }

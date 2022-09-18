@php
    // List categories
    $xhtmlCategory = '';
    if (count($categories) > 0) {
        $xhtmlCategory .= '<ul class="form-check list-unstyled">';
        \App\Helpers\Template::categories($categories, $xhtmlCategory);
    }
    $xhtmlCategory .= '</ul>';

    $statusValue = ['publish' => config('temp.template.status.publish.name'), 'draft' => config('temp.template.status.draft.name')];

    if (isset($item['id'])) {
		$pageTitle = "Edit: " . $item['name'];
		$breadcrumbs = config('breadcrumbs.category.edit');
	} else {
		$pageTitle = 'Create new categories';
		$breadcrumbs = config('breadcrumbs.category.created');
	}
@endphp
@extends('admin.app', ['pageTitle' => $pageTitle])
@section('css')
    <link href="{{ asset('admin/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('admin.parts.breadcrumb', ['breadcrumbs' => config('breadcrumbs.posts.created')])
    @include('admin.components.notify')
    {{ Form::open([
        'method' => 'POST',
        'url'=> route("$controllerName.save"),
        'accept-charset' => 'UTF-8',
	])}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        {!! Form::label('name', 'Name',['class' => 'form-label']) !!}
                        {!! Form::text('name', old('name', @$item['name']), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter post name']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                        {!! Form::textarea('description', old('description', @$item['description']), ['class' => 'form-control', 'rows' => 3, 'maxlength' => 100, 'placeholder' => __('Must enter minimum of a 100 characters')]) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('ckeditor', 'Content', ['class' => 'form-label']) !!}
                        <div id="ckeditor-classic"></div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __('Publish') }}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        {!! Form::label('status', __('Status'), ['class' => 'form-label']) !!}
                        {!! Form::select('status', $statusValue, old('status', @$item['status']),['class' => 'form-select', 'data-choices', 'data-choices-sorting-false', 'data-choices-search-false']) !!}

                        <div class="text-end mb-3">
                            {!! Form::hidden('id', @$item['id']) !!}
                            {!! Form::submit(__('Save'), ['class' => 'btn btn-success w-sm', 'type' => 'submit']) !!}
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Categories</h5>
                </div>
                <div class="card-body">{!! $xhtmlCategory !!}</div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tags</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1">
                            <input class="form-control" data-choices data-choices-multiple-remove="true"
                                   placeholder="Enter tags" type="text"
                                   value="Cotton"/>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
    </form>
@endsection
@section('script')
    <script src="{{ asset('admin/assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/ecommerce-product-create.init.js') }}"></script>

    <script src="{{ asset('/admin/assets/js/app.min.js') }}"></script>
@endsection

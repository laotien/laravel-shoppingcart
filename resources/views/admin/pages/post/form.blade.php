@php

    $statusValue = ['published' => config('temp.template.status.published.name'), 'draft' => config('temp.template.status.draft.name')];
    if (isset($item['id'])) {
		$pageTitle = "Edit: " . $item['name'];
		$breadcrumbs = config('breadcrumbs.posts.edit');
	} else {
		$pageTitle = 'Create new post';
		$breadcrumbs = config('breadcrumbs.posts.created');
	}
@endphp
@extends('admin.app', ['pageTitle' => $pageTitle])
@section('css')
    <link href="{{ asset('admin/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('admin.parts.breadcrumb', ['pageIndex' => true, 'breadcrumbs' => $breadcrumbs])
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
                        {!! Form::textarea('description', old('description', @$item['description']), ['class' => 'form-control', 'rows' => 3, 'maxlength' => 400, 'placeholder' => __('Must enter minimum of a 100 characters')]) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('content', 'Content', ['class' => 'form-label']) !!}
                        {!! Form::textarea('content', old('content', @$item['content']), ['class' => 'form-control', 'id' => 'ckeditor-classic']) !!}
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
                    <h5 class="card-title mb-0">{{__('Categories')}}</h5>
                </div>
                <div class="card-body">
                    @php
                       $xhtmlCategory = '';
                       if (count($categories) > 0) {
						   $xhtmlCategory .= '<ul class="form-check list-unstyled">';
						   (isset($item['id'])) ? $ids = $item->categories->pluck('id')->toArray() : $ids = [];

						   \App\Helpers\Template::categories($categories, $ids, $xhtmlCategory);
                       }
                       $xhtmlCategory .= '</ul>';
                    @endphp

                    {!! $xhtmlCategory !!}

                </div>
                <!-- end card body -->
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('Feature Image')}}</h5>
                </div>
                <div class="card-body"></div>
                <!-- end card body -->
            </div>
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('Tags')}}</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1">
                            {!! Form::text('tags', @$item['tags'], ['class' => 'form-control', 'data-choices-multiple-remove' => true, 'data-choices', 'placeholder'=> 'Enter tags']) !!}
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
    {{ Form::close() }}
@endsection
@section('script')
    <script src="{{ asset('admin/assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/ecommerce-product-create.init.js') }}"></script>

    <script src="{{ asset('/admin/assets/js/app.min.js') }}"></script>
@endsection

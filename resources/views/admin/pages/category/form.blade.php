@php
    $statusValue = ['publish' => config('temp.template.status.publish.name'), 'draft' => config('temp.template.status.draft.name')];
@endphp
@extends('admin.app', ['pageTitle' => 'Create new category'])
@section('content')
    @include('admin.parts.breadcrumb', ['breadcrumbs' => config('breadcrumbs.category.created')])
    @include('admin.components.notify')
    {{ Form::open([
        'method' => 'POST',
        'url'=> route("admin.category.save"),
        'accept-charset' => 'UTF-8',
        'novalidate'
	])}}

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}
                        {!! Form::text('name', old('name', @$item['name']), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Enter category name']) !!}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {!! Form::label('slug', __('Slug'), ['class' => 'form-label']) !!}
                        {!! Form::text('slug', old('slug', @$item['slug']), ['class' => 'form-control', 'placeholder' => 'Enter category name']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('parent', __('Parent'), ['class' => 'form-label']) !!}
                        {!! Form::select('parent_id', $categorySelect, old('parent_id', @$item['parent_id']),['class' => 'form-select', 'data-choices', 'data-choices-sorting-false', 'data-choices-search']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('icon', __('Icon'), ['class' => 'form-label']) !!}
                        {!! Form::text('icon', old('icon', @$item['icon']), ['class' => 'form-control', 'placeholder' => 'Enter category icon']) !!}
                    </div>
                    <div>
                        {!! Form::label('icon', __('Category Description'), ['class' => 'form-label']) !!}
                        {!! Form::textarea('description', old('description', @$item['description']), ['class' => 'form-control', 'rows' => 3, 'maxlength' => 100, 'placeholder' => __('Must enter minimum of a 100 characters')]) !!}
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
                    </div>

                    <div>
                        <div class="text-end mb-3">
                            {!! Form::hidden('id', @$item['id']) !!}
                            {!! Form::submit(__('Save'), ['class' => 'btn btn-success w-sm', 'type' => 'submit']) !!}
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    {{ Form::close() }}
@endsection
@section('script')
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
@endsection

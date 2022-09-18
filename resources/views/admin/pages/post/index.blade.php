@extends('admin.app', ['pageTitle' => 'Post'])
@section('content')
    @include('admin.parts.breadcrumb', ['breadcrumbs' => config('breadcrumbs.posts.index')])

    <div class="row">
        <div class="col-lg-12">
            @include('admin.components.notify')
            <div class="card">
                @include('admin.components.card-header')
                @include('admin.components.tab')
                <div class="card-body">
{{--                    @include('admin.pages.post.list')--}}
{{--                    @include('admin.components.modal')--}}
                </div>
                <!-- end card body -->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ asset('/admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/app.min.js') }}"></script>
@endsection


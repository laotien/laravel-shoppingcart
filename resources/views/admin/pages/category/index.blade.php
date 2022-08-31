@extends('admin.app')
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('admin.parts.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="categoryList">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">{{ __('All Categories') }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn"
                                        data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i> {{ __('Add Category') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-header border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                           placeholder="Search for category or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-6">
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="">
                                            <input type="text" class="form-control" id="datepicker-range"
                                                   data-provider="flatpickr" data-range="true"
                                                   placeholder="Select date">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-4">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                    data-choices-search-false name="choices-single-default"
                                                    id="idStatus">
                                                <option value="">Status</option>
                                                <option value="all" selected>All</option>
                                                <option value="Active">Active</option>
                                                <option value="Block">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-sm-4">
                                        <div>
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                                <i
                                                    class="ri-equalizer-fill me-2 align-bottom"></i>Filters
                                            </button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <!-- end card header -->
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                       role="tab">
                                        All <span
                                            class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published"
                                       role="tab">
                                        Published <span
                                            class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft"
                                       role="tab">
                                        Draft
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    @include('admin.pages.category.list')
                    <!-- end tab content -->
                    <!-- Modal -->
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                   colors="primary:#f7b84b,secondary:#f06548"
                                                   style="width:100px;height:100px">
                                        </lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>Are you sure ?</h4>
                                            <p class="text-muted mx-4 mb-0">Are you sure you want to
                                                remove this record ?</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                        <button type="button" class="btn w-sm btn-light"
                                                data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes,
                                            Delete
                                            It!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
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
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

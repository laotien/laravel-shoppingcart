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

<div class="card-header border-bottom-dashed">
    <div class="row g-4 align-items-center">
        <div class="col-sm">
            <div>
                <h5 class="card-title mb-0">{{ __('All Categories') }}</h5>
            </div>
        </div>
        <div class="col-sm-auto">
            <div>
                <button class="btn btn-soft-danger" onClick="deleteMultiple()" data-delete-url="{{ route("$controllerName.items-destroy") }}">
                    <i class="ri-delete-bin-2-line"></i></button>
                <a class="btn btn-success add-btn" id="create-btn" href="{{ route("$controllerName.form") }}">
                    <i class="ri-add-line align-bottom me-1"></i> {{ __('Add Category') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- end card header -->

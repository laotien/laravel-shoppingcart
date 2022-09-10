<!-- Danger Alert -->
@if ($errors->any())
    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-error-warning-line me-3 align-middle"></i><strong>{{__('Warning!')}}</strong> -
        {{__("Please check the form below for errors")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Danger Successfully -->
@if (session('notify'))
    <!-- Success Alert -->
    <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-check-double-line me-3 align-middle"></i> <strong>{{__('Success!')}}</strong> - {{ session('notify') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



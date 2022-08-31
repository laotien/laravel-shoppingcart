<!-- Danger Alert -->
@if ($errors->any())
    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="ri-check-double-line me-3 align-middle"></i><strong>{{__('Warning!')}}</strong>
        {{__("Please check the form below for errors")}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



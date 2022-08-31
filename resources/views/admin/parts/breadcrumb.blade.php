<!-- start page title -->
@if(!empty($breadcrumbs))
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('Categories') }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                    @foreach($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item {{ $breadcrumb['class'] ?? ''}}">
                            @if(!empty($breadcrumb['url']))
                                <a href="{{url($breadcrumb['url'])}}">{{ $breadcrumb['name'] }}</a>
                            @else
                                {{ $breadcrumb['name'] }}
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</div>
@endif
<!-- end page title -->

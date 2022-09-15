@php
	$xhtmlButtonFilter = \App\Helpers\Template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status']);
@endphp
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0">
                {!! $xhtmlButtonFilter !!}
            </ul>
        </div>
    </div>
</div>
<!-- end card header -->

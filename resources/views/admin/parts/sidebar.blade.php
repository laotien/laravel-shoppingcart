@php
    $menus = [
		'dashboard'=>[
            'url'   => route('dashboard.index'),
            'title' => __("Dashboard"),
            'icon'  => 'bx bxs-dashboard',
        ],
        'posts'=>[
            'url'   => 'sidebarNews',
            'title' => __("News"),
            'icon'  => 'bx bxs-news',
            'children' => [
				'posts'=>[
                    'url'        => route('posts'),
                    'title'      => __('All News'),
                    'icon'       => '',
                ],
                'add_news'=>[
                    'url'        => route('posts.form'),
                    'title'      => __('Add News'),
                    'icon'       => '',
                ],
                'category'=>[
                    'url'        => route('category'),
                    'title'      => __('Categories'),
                    'icon'       => '',
                ],
                'tags'=>[
                    'url'        => '',
                    'title'      => __('Tags'),
                    'icon'       => '',
                ],
            ],
        ],
    ];
    @endphp

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{ __('General') }}</span></li>
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link menu-link @if(!empty($menu['children'])) collapsed @endif" href="{{ $menu['url'] }}" @if (!empty($menu['children'])) data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $menu['url'] }}" @endif>
                            @if(!empty($menu['icon']))
                                <i class="{{ $menu['icon'] }}"></i>
                            @endif
                            <span>{{ $menu['title'] }}</span>
                        </a>
                        @if (!empty($menu['children']))
                            <div class="collapse menu-dropdown" id="{{ $menu['url'] }}">
                                <ul class="nav nav-sm flex-column">
                                    @foreach($menu['children'] as $menuChild)
                                        <li class="nav-item">
                                            <a href="{{ $menuChild['url'] }}" class="nav-link">{{ $menuChild['title'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>{!! $pageTitle !!} - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('admin.elements.head-css')
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">
    @include('admin.parts.menu')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('admin.parts.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
@include('admin.parts.customizer')
@include('admin.elements.vendor-scripts')
</body>

</html>

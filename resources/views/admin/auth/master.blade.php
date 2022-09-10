<!doctype html>
<html lang="" data-topbar="light">

    <head>
    <meta charset="utf-8" />
    <title>{{ $pageTitle }} | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Laotien" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
        @include('admin.elements.head-css')
  </head>

    <body>
        @yield('content')
        @include('admin.elements.vendor-scripts')
    </body>
</html>

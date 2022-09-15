@extends('admin.app', ['pageTitle' => 'Dashboard'])
@section('content')
    @include('admin.parts.breadcrumb')
@endsection
@section('script')
    <!-- App js -->
    <script src="{{ asset('/assets/js/app.min.js') }}"></script>
@endsection

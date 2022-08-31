@extends('admin.app')
@section('content')
    @include('admin.parts.breadcrumb')
@endsection
@section('script')
    <!-- App js -->
    <script src="{{ asset('/assets/js/app.min.js') }}"></script>
@endsection

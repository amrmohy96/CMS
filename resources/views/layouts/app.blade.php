<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">


    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('frontend/images/icon.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


    <!-- START: toastr CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/toastr.css')}}">
    <!-- END: toastr CSS-->

    <!-- START: bootstrap-fileinput CSS-->
    <link href="{{ asset('frontend/js/fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <!-- END: bootstrap-fileinput CSS-->

    <!-- Modernizer js -->
    <script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    @yield('style')
</head>
<body>
<div id="app">
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        @include('layouts.includes.frontend.header')
        <main>
            @yield('content')
        </main>
        @include('layouts.includes.frontend.footer')
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/active.js')}}"></script>
<!-- BEGIN: form-toastr JS-->
<script src="{{asset('frontend/js/toastr.min.js')}}"></script>
<script src="{{asset('frontend/js/toastr.js')}}"></script>
<!-- END: form-toastr JS-->

<!-- BEGIN: bootstrap-fileinput JS-->
<script src="{{ asset('frontend/js/fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('frontend/js/fileinput/js/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('frontend/js/fileinput/js/plugins/purify.min.js') }}"></script>

<script src="{{ asset('frontend/js/fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('frontend/js/fileinput/themes/fa/theme.js') }}"></script>
<!-- END: bootstrap-fileinput JS-->


@include('layouts.includes.frontend.session')
<!-- END: form-toastr JS-->
@yield('script')
</body>
</html>

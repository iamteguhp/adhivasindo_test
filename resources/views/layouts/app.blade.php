<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('') }}/homepage_assets/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('') }}/homepage_assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('') }}/homepage_assets/css/responsive-footer.css">
    <style>

    </style>
    @stack('styles')
    @show

</head>

<body>
    <div class="content-wrapper">

        <!-- /header -->
        @if (View::hasSection('header_type'))
            @include('layouts/header_bg_white')
        @else
            @include('layouts/header')
        @endif
        
        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    @include('layouts/footer')
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="{{ asset('') }}/homepage_assets/js/plugins.js"></script>
    <script src="{{ asset('') }}/homepage_assets/js/theme.js"></script>

    @stack('scripts')
    @show

</body>

</html>
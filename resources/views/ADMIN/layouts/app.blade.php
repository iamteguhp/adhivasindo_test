<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin_assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin_assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/libs/select2/css/select2.min.css">
    <style>
        .navbar-brand-box{
            padding: unset !important;
        }
        .breadcrumb-item+.breadcrumb-item::before{
            content: unset !important;
        }
        .required {
            color: red;
        }
    </style>
    @stack('styles')
    @show
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Header Start ========== -->
        @include('ADMIN/layouts/header')
        <!-- ========== Header Start ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('ADMIN/layouts/navigation')
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- start: scripts -->
    @include('ADMIN/layouts/scripts')
    <!-- start: scripts -->
    @stack('scripts')
    @show
    <script>
        // Active Menu
        $(function(){
            $('a').each(function(){
                if ($(this).prop('href') == window.location.href) {
                    //$(this).addClass('active'); 
                    $(this).parents('li').addClass('mm-active');
                    $(this).closest('.tree').show();
                }
            });
        });
    </script>
</body>

</html>
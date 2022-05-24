<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/assets/admin/template1/images/LoGo_Doan.png">
    <!-- Favicon -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap"
        rel="stylesheet" />
    <!-- All CSS Flies   -->
    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <link rel="stylesheet" href="/assets/home/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/ionicons.min.css" />
    <!--===== Plugins CSS (All Plugins Files) =====-->
    <link rel="stylesheet" href="/assets/home/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/meanmenu.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/owl-carousel.css" />
    <link rel="stylesheet" href="/assets/home/css/plugins/slick.css" />
    <!--===== Main Css Files =====-->
    <link rel="stylesheet" href="/assets/home/css/style.css" />
    <!-- ===== Responsive Css Files ===== -->
    <link rel="stylesheet" href="/assets/home/css/responsive.css" />
</head>

<body>
    <!--====== PRELOADER PART ENDS ======-->
    <div id="main">
        <!-- Header Start -->
        @include('home/layout/header')
        @yield('main-content')
        @include('home/layout/footer')
    </div>
    <!--====== Vendors js ======-->
    <script src="/assets/home/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/assets/home/js/vendor/modernizr-3.7.1.min.js"></script>
    <!--====== Plugins js ======-->
    <script src="/assets/home/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/home/js/plugins/popper.min.js"></script>
    <script src="/assets/home/js/plugins/meanmenu.js"></script>
    <script src="/assets/home/js/plugins/owl-carousel.js"></script>
    <script src="/assets/home/js/plugins/jquery.nice-select.js"></script>
    <script src="/assets/home/js/plugins/countdown.js"></script>
    <script src="/assets/home/js/plugins/elevateZoom.js"></script>
    <script src="/assets/home/js/plugins/jquery-ui.min.js"></script>
    <script src="/assets/home/js/plugins/slick.js"></script>
    <script src="/assets/home/js/plugins/scrollup.js"></script>
    <script src="/assets/home/js/plugins/range-script.js"></script>
    <script src="/assets/home/js/main.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->


    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('nadmin/assets/vendor/simple-datatables/style.css') }}">


    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('nadmin/assets/css/style.css') }}">

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.2.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        @include('layouts.navigation')

    </header><!-- End Header -->




    <!-- ======= Sidebar ======= -->
    @include('layouts.aside')



    <main id="main" class="main">
        {{ $slot }}
    </main>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            © Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->


    <script src="{{ asset('nadmin/assets/vendor/apexcharts/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('nadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('nadmin/assets/vendor/chart.js/chart.min.js') }}" defer></script>
    <script src="{{ asset('nadmin/assets/vendor/echarts/echarts.min.js') }}" defer></script>
    <script src="{{ asset('nadmin/assets/vendor/quill/quill.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}" defer></script>
    <script src="{{ asset('nadmin/assets/vendor/tinymce/tinymce.min.js') }}" defer></script>
    <script src="{{ asset('nadmin/" assets/vendor/php-email-form/validate.js') }}" defer></script>



    <!-- Template Main JS File -->

    <script src="{{ asset('nadmin/assets/js/main.js') }}" defer></script>



    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>

</html>

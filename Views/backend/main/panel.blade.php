<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <title>ساین ادمین - قالب مدیریتی بوت استرپ 5</title>
    {{ $view->make('backend/main/layout/style') }}
</head>

<body class="rtl">
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        {{ $view->make('Backend/main/layout/sidebar-header') }}
        <!--navigation-->
        {!! $navigation !!}
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    {!! $header !!}
    {!! $content !!}
    {{--    {{ $content }}--}}
    <!--end header -->
{{--    <!--start page wrapper -->--}}
{{--    {{ $view->make('Backend/main/layout/page-wrapper') }}--}}
{{--    <!--end page wrapper -->--}}
    <!--start overlay-->
    {{ $view->make('Backend/main/layout/overlay') }}
    <!--end overlay-->
    <!--Start Back To Top Button-->
    {{ $view->make('Backend/main/layout/back-to-top-button') }}
    <!--End Back To Top Button-->
    <!-- start footer-->
    {{ $view->make('Backend/main/layout/footer') }}
    <!-- end footer -->
</div>
<!--end wrapper-->
<!--start switcher-->
{{ $view->make('Backend/main/layout/switcher') }}
<!--end switcher-->
{{ $view->make('backend/main/layout/script') }}
</body>
<!-- Bootstrap JS -->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/highcharts.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/exporting.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/export-data.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/accessibility.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script>
    new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/index.js"></script>
<!--app JS-->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/app.js"></script>
</html>
<!doctype html>
<html lang="en">
hey
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <title>ساین ادمین - قالب مدیریتی بوت استرپ 5</title>
    <?php echo $view->render('backend/main/layout/style') ?>
</head>

<body class="rtl">
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
    {{ $view->make('Backend/main/layout/sidebar-header') }}
    <!--navigation-->
    {{ $view->make('Backend/main/layout/navigation') }}
    <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
{{ $view->make('Backend/main/layout/header') }}

    <?php echo $content ?>
<!--end header -->
    <!--start page wrapper -->
{{--{{ $view->make('Backend/main/layout/page-wrapper') }}--}}
{{--<!--end page wrapper -->--}}
{{--    <!--start overlay-->--}}
{{--{{ $view->make('Backend/main/layout/overlay') }}--}}
{{--<!--end overlay-->--}}
{{--    <!--Start Back To Top Button-->--}}
{{--{{ $view->make('Backend/main/layout/back-to-top-button') }}--}}
<!--End Back To Top Button-->
{{ $view->make('Backend/main/layout/footer') }}
</div>
<!--end wrapper-->
<!--start switcher-->
{{ $view->make('Backend/main/layout/switcher') }}
<!--end switcher-->
<?php echo $view->render('backend/main/layout/script')?>
</body>
</html>
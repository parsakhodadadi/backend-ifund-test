<!doctype html>
<html lang="en">
hey
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/pace.min.css" rel="stylesheet">
    <script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/app.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/css/header-colors.css" />
    <title>ساین ادمین - قالب مدیریتی بوت استرپ 5</title>
</head>

<body class="rtl">
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
    <?php echo e($view->make('Backend/main/layout/sidebar-header')); ?>

    <!--navigation-->
    <?php echo e($view->make('Backend/main/layout/navigation')); ?>

    <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
<?php echo e($view->make('Backend/main/layout/header')); ?>

<!--end header -->
    <!--start page wrapper -->
<?php echo e($view->make('Backend/main/layout/page-wrapper')); ?>

<!--end page wrapper -->
    <!--start overlay-->
<?php echo e($view->make('Backend/main/layout/overlay')); ?>

<!--end overlay-->
    <!--Start Back To Top Button-->
<?php echo e($view->make('Backend/main/layout/back-to-top-button')); ?>

<!--End Back To Top Button-->
    <?php echo e($view->make('Backend/main/layout/footer')); ?>

</div>
<!--end wrapper-->
<!--start switcher-->
<?php echo e($view->make('Backend/main/layout/switcher')); ?>

<!--end switcher-->
<!-- Bootstrap JS -->
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/js/highcharts.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/js/exporting.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/js/export-data.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/highcharts/js/accessibility.js"></script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script>
    new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/js/index.js"></script>
<!--app JS-->
<script src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/js/app.js"></script>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/panel.blade.php ENDPATH**/ ?>
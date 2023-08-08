<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <title>ساین ادمین - قالب مدیریتی بوت استرپ 5</title>
    <?php echo e($view->make('backend/main/layout/style')); ?>

</head>

<body class="rtl">
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <?php echo e($view->make('Backend/main/layout/sidebar-header')); ?>

        <!--navigation-->
        <?php echo $navigation; ?>

        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php echo $header; ?>

    <?php echo $content; ?>

    
    <!--end header -->



    <!--start overlay-->
    <?php echo e($view->make('Backend/main/layout/overlay')); ?>

    <!--end overlay-->
    <!--Start Back To Top Button-->
    <?php echo e($view->make('Backend/main/layout/back-to-top-button')); ?>

    <!--End Back To Top Button-->
    <!-- start footer-->
    <?php echo e($view->make('Backend/main/layout/footer')); ?>

    <!-- end footer -->
</div>
<!--end wrapper-->
<!--start switcher-->
<?php echo e($view->make('Backend/main/layout/switcher')); ?>

<!--end switcher-->
<?php echo e($view->make('backend/main/layout/script')); ?>

</body>
<!-- Bootstrap JS -->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/highcharts.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/exporting.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/export-data.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/highcharts/js/accessibility.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script>
    new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/index.js"></script>
<!--app JS-->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/app.js"></script>
</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/panel.blade.php ENDPATH**/ ?>
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
    <?php echo e($view->make('Backend/main/layout/header')); ?>

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
</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/panel.blade.php ENDPATH**/ ?>
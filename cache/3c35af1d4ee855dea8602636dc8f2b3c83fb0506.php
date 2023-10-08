<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>مجله ارون</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Blogzine">
    <meta name="description" content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

    <!-- Dark mode -->
    <?php echo e($view->make('frontend/main/layout/script')); ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/plyr/plyr.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css/')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('frontend/main/layout/preloader')); ?>

<!-- Preloader END -->

<!-- Top alert START -->
<?php echo e($view->make('frontend/main/layout/topalert')); ?>

<!-- Top alert END -->

<!-- Offcanvas START -->
<?php echo e($view->make('frontend/main/layout/off-canvas')); ?>

<!-- Offcanvas END -->

<!-- =======================
Header START -->
<?php echo e($view->make('frontend/main/layout/header')); ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- =======================
    Trending START -->
    <section class="py-2">
        <div class="container">
            <div class="row g-0">
                <div class="col-12 bg-primary bg-opacity-10 p-2 rounded">
                    <div class="d-sm-flex align-items-center text-center text-sm-start">
                        <!-- Title -->
                        <div class="me-3">
                            <span class="badge bg-primary p-2 px-3">اخبار امروز:</span>
                        </div>
                        <!-- Slider -->
                        <div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
                            <div class="tiny-slider-inner"
                                 data-autoplay="true"
                                 data-hoverpause="true"
                                 data-gutter="0"
                                 data-arrow="true"
                                 data-dots="false"
                                 data-items="1">
                                <!-- Slider items -->
                                <div> <a href="#" class="text-reset btn-link">افزایش آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></div>
                                <div> <a href="#" class="text-reset btn-link">حضورمسیحیان در حرم سامرابا آغاز سال جدید </a></div>
                                <div> <a href="#" class="text-reset btn-link">انتقاد ستاره رئال از شعارهای نژادپرستانه </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Trending END -->

    <!-- =======================
    Main hero START -->




















































































































    <!-- =======================
    Main content START -->
    <?php echo $posts; ?>

    <!-- =======================
    Main content END -->

    <!-- Divider -->
    <div class="container"><div class="border-bottom border-primary border-2 opacity-1"></div></div>

    <!-- =======================
    Section START -->





















                            <!-- Card item START -->




































                            <!-- Card item END -->
                            <!-- Card item START -->































                            <!-- Card item END -->
                            <!-- Card item START -->





























                            <!-- Card item END -->
                            <!-- Card item START -->




































                            <!-- Card item END -->
                            <!-- Card item START -->





























                            <!-- Card item END -->






    <!-- =======================
    Section END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<?php echo e($view->make('/frontend/main/layout/footer')); ?>

<!-- =======================
Footer END -->

<!-- Back to top -->
<?php echo e($view->make('frontend/main/layout/back-to-top')); ?>


<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider-rtl.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/sticky-js/sticky.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/plyr/plyr.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>assets/js/functions.js"></script>
<!-- rtl-theme script-->
<script src="https://files-de.rtl-theme.com/jsdemos/79df7d11747f944da7628dfc1c76f709661cfe8f.js?pid=254067"></script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/main.blade.php ENDPATH**/ ?>
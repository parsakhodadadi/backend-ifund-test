<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

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
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Title -->
                    <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        <h2 class="m-0"><i class="bi bi-megaphone"></i> مطالب پیشنهادی</h2>
                        <a href="#" class="text-body small"><u>مشاهده همه</u></a>
                    </div>
                    <div class="tiny-slider arrow-hover arrow-blur arrow-dark arrow-round">
                        <div class="tiny-slider-inner"
                             data-autoplay="true"
                             data-hoverpause="true"
                             data-gutter="24"
                             data-arrow="true"
                             data-dots="false"
                             data-items-xl="4"
                             data-items-md="3"
                             data-items-sm="2"
                             data-items-xs="1">

                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>blog/4by3/07.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle" title="8.5 rating">8.5</div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>post-single-3.html" class="btn-link text-reset">افزایش آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>avatar/07.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">مریم ترابی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">7 دی، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>blog/4by3/08.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>post-single-3.html" class="btn-link text-reset">آمار فرزندان حاصل از روش‌های کمک‌ باروری در جهان</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <div class="avatar-img rounded-circle bg-warning">
                                                            <span class="text-dark position-absolute top-50 start-50 translate-middle fw-bold small">MK</span>
                                                        </div>
                                                    </div>
                                                    <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">رضا مرادی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">15 خرداد، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>blog/4by3/09.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>سیاست</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>post-single-3.html" class="btn-link text-reset">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>avatar/09.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">سارا حقیقت نژاد</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">1 دی، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>blog/4by3/10.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-white-soft bg-blur text-white rounded-circle" title=""><i class="fas fa-image"></i></div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>فرهنگ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>post-single-3.html" class="btn-link text-reset">به همین دلیل امسال سال استارت آپ ها خواهد بود؟</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>avatar/10.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">نیلوفر راد</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">7 آذر، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>blog/4by3/11.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href=<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>"post-single-3.html" class="btn-link text-reset">بهترین تابلوهای پینترست برای یادگیری در مورد تجارت</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images/')); ?>avatar/12.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">المیرا کرمی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">7 شهریور، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
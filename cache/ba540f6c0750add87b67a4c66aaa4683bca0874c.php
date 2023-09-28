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
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('frontend/main/layout/preloader')); ?>

<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo e($view->make('frontend/main/layout/header')); ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Main hero START -->
    <section>
        <div class="container">
            <div class="row g-4 align-items-center justify-content-between pb-lg-5">
                <div class="col-lg-6 mt-0 position-relative">
                    <!-- Hero image -->
                    <img class="rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/12.jpg" alt="">
                    <!-- Hero info -->
                    <div class="mt-lg-n5 d-none d-sm-block">
                        <div class="col-4 position-absolute bottom-0 end-0 me-4 mb-3 mb-lg-0 me-lg-n5">
                            <div class="bg-body rounded shadow text-center px-3 py-4">
                                <i class="bi bi-mic fs-1 h6"></i>
                                <p class="mb-0">هر دوشنبه قسمت های جدید پخش می کنیم!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Hero title -->
                    <p><span class="badge text-bg-primary me-1">جدید</span> تمام فصل جدید با کارآفرینان!</p>
                    <h1 class="display-5">پادکست با صدای استاد شجریان</h1>
                    <p>مصاحبه با متفکران، بنیانگذاران و هنرمندان برتر از سال 2012 با بیش از 10 میلیون دانلود در هفته.</p>
                    <!-- Listen on -->
                    <ul class="list-unstyled d-flex gap-1 gap-sm-2 align-items-center mt-4">
                        <li class="h5 mb-0">گوش کنید به:</li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/apple-podcasts.svg" alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/divider-icon.svg" alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/spotify.svg" alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/google-podcasts.svg" alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/pocket.svg" alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/sound-cloud.svg" alt=""> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main hero END -->

    <!-- =======================
    Recent Episodes START -->
    <section class="pt-0 pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Title -->
                    <h2 class="mb-4">لیست اپیزودها</h2>

                    <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Episodes Item START -->
                        <div class="card border rounded-3 p-3 mb-4">
                            <div class="row g-4">
                                <!-- Image -->
                                <div class="col-md-5">
                                    <div class="position-relative">
                                        <img class="rounded-3" src="<?php echo e(route('/') . $episode->photo); ?>" alt="Card image">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-between mb-2">
                                        <!-- Episode -->
                                        <a href="podcast-single.html" class="badge text-bg-danger mb-2"> قسمت<?php echo e($episodeNum); ?></a>
                                        <span> <i class="bi bi-clock-fill"></i> 4ساعت 5دقیقه</span>
                                    </div>
                                    <!-- Title -->
                                    <h4 class="card-title">
                                        <a href="podcast-single.html" class="btn-link text-reset"><?php echo e($episode->title); ?></a>
                                    </h4>
                                    <!-- Author info -->
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xs me-2">
                                            <img class="avatar-img  rounded-circle" src="<?php echo e(route('/') . current($users->get(['id' => $episode->user_id]))->photo); ?>" alt="avatar">
                                        </div>
                                        <h6 class="mb-0"><a href="#" class="stretched-link text-reset btn-link"><?php echo e(current($users->get(['id' => $episode->user_id]))->first_name . ' ' . current($users->get(['id' => $episode->user_id]))->last_name); ?></a></h6>
                                    </div>
                                    <!-- Play Episode -->
                                    <div class="d-xl-flex align-items-center justify-content-between mt-4">
                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('/podcasts/') . $episode->id); ?>">پخش</a>
                                        <ul class="list-unstyled d-flex gap-2 align-items-center">
                                            <li class="h6 mb-0">گوش کنید به:</li>
                                            <li><a href="#"> <img class="h-20" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/apple-podcasts.svg" alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/divider-icon.svg" alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/spotify.svg" alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/pocket.svg" alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/sound-cloud.svg" alt=""> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Episodes Item END -->
                        <?php ($episodeNum--); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Episodes Item END -->

                <!-- Sidebar START -->
                <div class="col-lg-4">
                    <!-- Card START -->
                    <div class="card card-overlay-bottom h-400" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/11.jpg); background-position: center left; background-size: cover;">
                        <!-- Card featured -->
                        <span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span>
                        <!-- Card Image overlay -->
                        <div class="card-img-overlay d-flex flex-column p-3 p-sm-5">
                            <!-- Card play button -->
                            <div class="position-absolute top-50 start-50 translate-middle pb-5">
                                <!-- Popup video -->
                                <a href="https://www.aparat.com/video/video/embed/videohash/yTpSD/vt/frame" class="icon-lg bg-primary d-block text-white rounded-circle" data-glightbox data-gallery="y-video">
                                    <i class="bi bi-play-btn"></i>
                                </a>
                            </div>
                            <!-- Card overlay Bottom  -->
                            <div class="w-100 mt-auto">
                                <div class="col text-center">
                                    <!-- Card title -->
                                    <h3 class="text-white"><a href="post-single.html" class="btn-link text-reset fw-normal">هرگز تاثیر رسانه های اجتماعی را دست کم نگیرید!</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Trending podcast START -->
                    <div class="mt-4">
                        <h5 class="mb-3">پادکست های محبوب</h5>
                        <!-- Recent post item -->
                        <div class="card mb-3">
                            <div class="d-flex">
                                <div>
                                    <!-- Popup podcast -->
                                    <a href="podcast-single.html" class="icon-md border border-primary d-block text-primary rounded-circle">
                                        <i class="bi bi-play-fill fs-3"></i>
                                    </a>
                                </div>
                                <div class="ms-3">
                                    <!-- Info -->
                                    <h6><a href="podcast-single.html" class="btn-link stretched-link text-reset">حضور ایرانسل در رویداد فناورانه خودروهای آینده</a></h6>
                                    <div class="small mt-1">17 دی، 1400</div>
                                </div>
                            </div>
                        </div>
                        <!-- Recent post item -->
                        <div class="card mb-3">
                            <div class="d-flex">
                                <div>
                                    <!-- Popup podcast -->
                                    <a href="podcast-single.html" class="icon-md border border-primary d-block text-primary rounded-circle">
                                        <i class="bi bi-play-fill fs-3"></i>
                                    </a>
                                </div>
                                <div class="ms-3">
                                    <!-- Info -->
                                    <h6><a href="podcast-single.html" class="btn-link stretched-link text-reset">هشدار درباره یک بیماری حاد تنفسی در سرما</a></h6>
                                    <div class="small mt-1">4 مهر، 1400</div>
                                </div>
                            </div>
                        </div>
                        <!-- Recent post item -->
                        <div class="card mb-3">
                            <div class="d-flex">
                                <div>
                                    <!-- Popup podcast -->
                                    <a href="podcast-single.html" class="icon-md border border-primary d-block text-primary rounded-circle">
                                        <i class="bi bi-play-fill fs-3"></i>
                                    </a>
                                </div>
                                <div class="ms-3">
                                    <!-- Info -->
                                    <h6><a href="podcast-single.html" class="btn-link stretched-link text-reset">پنج حقیقت باورنکردنی در مورد پول</a></h6>
                                    <div class="small mt-1">30 تیر، 1400</div>
                                </div>
                            </div>
                        </div>
                        <!-- Recent post item -->
                        <div class="card mb-3">
                            <div class="d-flex">
                                <div>
                                    <!-- Popup podcast -->
                                    <a href="podcast-single.html" class="icon-md border border-primary d-block text-primary rounded-circle">
                                        <i class="bi bi-play-fill fs-3"></i>
                                    </a>
                                </div>
                                <div class="ms-3">
                                    <!-- Info -->
                                    <h6><a href="podcast-single.html" class="btn-link stretched-link text-reset">رونمایی از طرح بزرگترین تلسکوپ نوری آسیا</a></h6>
                                    <div class="small mt-1">29 آبان، 1400</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trending podcast END -->

                    <!-- Podcast social START -->
                    <div class="row mt-4 mt-lg-0 g-2">
                        <!-- Facebook -->
                        <div class="col-6 col-sm-3">
                            <a href="#" class="bg-facebook rounded text-center text-white-force p-3 d-block">
                                <i class="fab fa-facebook-square fs-5 mb-2"></i>
                                <h6 class="m-0">1.5K</h6>
                                <span class="small">طرفدار</span>
                            </a>
                        </div>
                        <!-- Instagram -->
                        <div class="col-6 col-sm-3">
                            <a href="#" class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block">
                                <i class="fab fa-instagram fs-5 mb-2"></i>
                                <h6 class="m-0">1.8M</h6>
                                <span class="small">آرشیو</span>
                            </a>
                        </div>
                        <!-- Youtube -->
                        <div class="col-6 col-sm-3">
                            <a href="#" class="bg-youtube rounded text-center text-white-force p-3 d-block">
                                <i class="fab fa-youtube-square fs-5 mb-2"></i>
                                <h6 class="m-0">22K</h6>
                                <span class="small">اخبار</span>
                            </a>
                        </div>
                        <!-- Twitter -->
                        <div class="col-6 col-sm-3">
                            <a href="#" class="bg-twitter rounded text-center text-white-force p-3 d-block">
                                <i class="fab fa-twitter-square fs-5 mb-2"></i>
                                <h6 class="m-0">5K</h6>
                                <span class="small">بازدید</span>
                            </a>
                        </div>
                    </div>
                    <!-- Podcast social END -->
                </div>
                <!-- Sidebar END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Featured video END -->

    <!-- =======================
    Featured Guests START -->
    <section class="bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-12 ">
                    <!-- Title -->
                    <div class="mb-4">
                        <h2>گویندگان محبوب</h2>
                    </div>
                    <!-- Slider -->
                    <div class="tiny-slider arrow-hover arrow-dark arrow-blur arrow-round">
                        <div class="tiny-slider-inner"
                             data-autoplay="false"
                             data-hoverpause="true"
                             data-gutter="24"
                             data-arrow="true"
                             data-dots="false"
                             data-items-xl="6"
                             data-items-lg="4"
                             data-items-md="3"
                             data-items-sm="2"
                             data-items-xs="2"
                        >
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/01.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">نیلوفر عظیمی</h5>
                                        <small>دستیار دفتر</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/02.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">رضا کریمی</h5>
                                        <small>مدیر فروش</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/03.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">احمد حسینی</h5>
                                        <small>مهندس نرم افزار</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/04.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">علی ستاری</h5>
                                        <small>پزشک پرستار</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/05.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">مریم ترابی</h5>
                                        <small>مدیر بازاریابی</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/06.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">نازنین رزاق</h5>
                                        <small>دستیار اجرایی</small>
                                    </div>
                                </div>
                            </div>
                            <!-- Guest item -->
                            <div>
                                <div class="card bg-transparent">
                                    <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/07.jpg" alt="card image">
                                    <div class="card-body ps-0">
                                        <h5 class="mb-0">ملینا حقیقت نژاد</h5>
                                        <small>بازیگر</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Slider END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Featured Guests END -->

    <!-- =======================
    Featured shows START -->
    <section class="bg-dark">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2 class="m-sm-0 text-white">پادکست برگزیده</h2>
                        <a href="#" class="btn btn-sm bg-youtube"><i class="bi bi-youtube me-2 align-middle"></i>لایک در آپارات</a>
                    </div>
                </div>

                <!-- Card big START -->
                <div class="col-12">
                    <div class="card card-overlay-bottom h-400" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/10.jpg); background-position: center left; background-size: cover;">
                        <!-- Card Image overlay -->
                        <div class="card-img-overlay d-flex flex-column p-3 p-sm-5">
                            <!-- Card play button -->
                            <div class="position-absolute top-50 start-50 translate-middle pb-5">
                                <!-- Popup video -->
                                <a href="https://www.aparat.com/video/video/embed/videohash/XGdK3/vt/frame" class="icon-lg bg-primary d-block text-white rounded-circle" data-glightbox data-gallery="y-video">
                                    <i class="bi bi-play-btn"></i>
                                </a>
                            </div>
                            <!-- Card overlay Bottom  -->
                            <div class="w-100 mt-auto">
                                <div class="col text-center">
                                    <!-- Card category -->
                                    <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>آموزشی</a>
                                    <!-- Card title -->
                                    <h3 class="text-white"><a href="podcast-single.html" class="btn-link text-reset fw-normal">آموزش ساخت استایل متن با برنامه پیکسل در گوشی</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card big END -->

                <!-- Card small START -->
                <div class="col-sm-6 col-lg-3">
                    <!-- Card item START -->
                    <div class="card bg-transparent overflow-hidden">
                        <!-- Card img -->
                        <div class="position-relative rounded-3 overflow-hidden">
                            <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/small/05.jpg" alt="Card image">
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                <!-- Card overlay -->
                                <div class="w-100 my-auto">
                                    <!-- Popup video -->
                                    <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                                        <i class="bi bi-play-btn"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-3">
                        <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">رازهای کوچک کثیف در مورد صنعت تجارت</a></h5>
                        <!-- Card info -->
                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                            <li class="nav-item">
                                <div class="nav-link">
                                    با <a href="#" class="text-reset btn-link">علی حسنی</a>
                                </div>
                            </li>
                            <li class="nav-item">17 تیر، 1400</li>
                        </ul>
                    </div>
                    <!-- Card item END -->
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Card item START -->
                    <div class="card bg-transparent overflow-hidden">
                        <!-- Card img -->
                        <div class="position-relative rounded-3 overflow-hidden">
                            <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/small/06.jpg" alt="Card image">
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                <!-- Card overlay -->
                                <div class="w-100 my-auto">
                                    <!-- Popup video -->
                                    <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                                        <i class="bi bi-play-btn"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-3">
                            <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">رونمایی از طرح بزرگترین تلسکوپ نوری</a></h5>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        با <a href="#" class="text-reset btn-link">نیلوفر راد</a>
                                    </div>
                                </li>
                                <li class="nav-item">22 آذر، 1400</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Card item END -->

                <div class="col-sm-6 col-lg-3">
                    <!-- Card item START -->
                    <div class="card bg-transparent overflow-hidden">
                        <!-- Card img -->
                        <div class="position-relative rounded-3 overflow-hidden">
                            <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/small/07.jpg" alt="Card image">
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                <!-- Card overlay -->
                                <div class="w-100 my-auto">
                                    <!-- Popup video -->
                                    <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                                        <i class="bi bi-play-btn"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-3">
                            <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">کیفیت هوای تهران همچنان ناسالم</a></h5>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        با <a href="#" class="text-reset btn-link">رضا مرادی</a>
                                    </div>
                                </li>
                                <li class="nav-item">24 بهمن، 1400</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Card item START -->
                    <div class="card bg-transparent overflow-hidden">
                        <!-- Card img -->
                        <div class="position-relative rounded-3 overflow-hidden">
                            <img class="card-img" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/small/08.jpg" alt="Card image">
                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                <!-- Card overlay -->
                                <div class="w-100 my-auto">
                                    <!-- Popup video -->
                                    <a href="https://www.aparat.com/video/video/embed/videohash/yMQab/vt/frame" class="icon-md bg-primary d-block mx-auto text-white rounded-circle" data-glightbox data-gallery="y-video">
                                        <i class="bi bi-play-btn"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-3">
                            <h5 class="card-title"><a href="podcast-single.html" class="btn-link text-white">برگزاری جشنواره زمستانه آکادمی ایرانسل</a></h5>
                            <!-- Card info -->
                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        با <a href="#" class="text-reset btn-link">رضا کریمی</a>
                                    </div>
                                </li>
                                <li class="nav-item">7 شهریور، 1400</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card item END -->
                </div>
                <!-- Card small START -->
            </div>
        </div>
    </section>
    <!-- =======================
    Featured shows END -->

    <!-- =======================
    Ads START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <a href="#" class="card-img-flash d-block">
                        <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/adv-1.png" alt="adv">
                    </a>
                    <div class="smaller text-end mt-2">تبلیغ در سایت <a href="#" class="text-body"><u>انتخاب</u></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
   Ads START -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<?php echo e($view->make('frontend/main/layout/footer')); ?>

<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider-rtl.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/js/glightbox.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/podcasts.blade.php ENDPATH**/ ?>
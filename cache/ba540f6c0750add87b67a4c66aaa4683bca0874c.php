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
            if (el != 'undefined' && el != null) {
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
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

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
                    <img class="rounded"
                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/12.jpg" alt="">
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
                    <p>مصاحبه با متفکران، بنیانگذاران و هنرمندان برتر از سال 2012 با بیش از 10 میلیون دانلود در
                        هفته.</p>
                    <!-- Listen on -->
                    <ul class="list-unstyled d-flex gap-1 gap-sm-2 align-items-center mt-4">
                        <li class="h5 mb-0">گوش کنید به:</li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/apple-podcasts.svg"
                                        alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/divider-icon.svg"
                                        alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/spotify.svg"
                                        alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/google-podcasts.svg"
                                        alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/pocket.svg"
                                        alt=""> </a></li>
                        <li class="ms-2"><a href="#"> <img
                                        src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/sound-cloud.svg"
                                        alt=""> </a></li>
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
                                        <img class="rounded-3" src="<?php echo e(route('/') . $episode->photo); ?>"
                                             alt="Card image">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-between mb-2">
                                        <!-- Episode -->
                                        <a href="podcast-single.html" class="badge text-bg-danger mb-2">
                                            قسمت<?php echo e($episodeNum); ?></a>
                                        <span> <i class="bi bi-clock-fill"></i> 4ساعت 5دقیقه</span>
                                    </div>
                                    <!-- Title -->
                                    <h4 class="card-title">
                                        <a href="<?php echo e(route('/podcasts/') . $episode->id); ?>"
                                           class="btn-link text-reset"><?php echo e($episode->title); ?></a>
                                    </h4>
                                    <!-- Author info -->
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xs me-2">
                                            <img class="avatar-img  rounded-circle"
                                                 src="<?php echo e(route('/') . current($users->get(['id' => $episode->user_id]))->photo); ?>"
                                                 alt="avatar">
                                        </div>
                                        <h6 class="mb-0"><a href="#"
                                                            class="stretched-link text-reset btn-link"><?php echo e(current($users->get(['id' => $episode->user_id]))->first_name . ' ' . current($users->get(['id' => $episode->user_id]))->last_name); ?></a>
                                        </h6>
                                    </div>
                                    <!-- Play Episode -->
                                    <div class="d-xl-flex align-items-center justify-content-between mt-4">
                                        <a class="btn btn-sm btn-primary"
                                           href="<?php echo e(route('/podcasts/') . $episode->id); ?>">پخش</a>
                                        <ul class="list-unstyled d-flex gap-2 align-items-center">
                                            <li class="h6 mb-0">گوش کنید به:</li>
                                            <li><a href="#"> <img class="h-20"
                                                                  src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/apple-podcasts.svg"
                                                                  alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20"
                                                                  src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/divider-icon.svg"
                                                                  alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20"
                                                                  src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/spotify.svg"
                                                                  alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20"
                                                                  src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/pocket.svg"
                                                                  alt=""> </a></li>
                                            <li><a href="#"> <img class="h-20"
                                                                  src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/sound-cloud.svg"
                                                                  alt=""> </a></li>
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
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <!-- Card END -->

                <!-- Trending podcast START -->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <!-- Trending podcast END -->

                <!-- Podcast social START -->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <!-- Podcast social END -->
                <!-- Sidebar END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Featured video END -->

    <!-- =======================
    Featured Guests START -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- =======================
    Featured Guests END -->

    <!-- =======================
    Featured shows START -->
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- =======================
    Featured shows END -->

    <!-- =======================
    Ads START -->
    
    
    
    
    
    
    
    
    
    
    
    
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
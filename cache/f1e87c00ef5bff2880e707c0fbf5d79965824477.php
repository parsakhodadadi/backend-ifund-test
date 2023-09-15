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

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('backend/main/layout/preloader')); ?>

<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo $header; ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Inner intro START -->
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border p-4 text-center rounded-3">
                        <h1>نسخه 2</h1>
                        <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dots m-0">
                                <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house me-1"></i> خانه</a></li>
                                <li class="breadcrumb-item active">نسخه 2</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Main content START -->
    <section class="position-relative pt-0">
        <div class="container" data-sticky-container>
            <div class="row">
                <!-- Main Post START -->
                <div class="col-lg-9">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Card item START -->
                        <div class="card mb-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="rounded-3" src="<?php echo e(route('/') . $post->photo); ?>" alt="">
                                </div>
                                <div class="col-md-7 mt-3 mt-md-0">
                                    <h4><a href="post-single-2.html" class="btn-link stretched-link text-reset"><?php echo e($post->title); ?></a></h4>
                                    <p><?php echo e($post->short_description); ?></p>
                                    <p><?php echo e($post->text); ?></p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(current($users->get(['id' => $post->user_id]))->first_name . ' ' . current($users->get(['id' => $post->user_id]))->last_name); ?>" alt="avatar">
                                                    </div>
                                                    <span class="ms-3"><?php echo e($lang['by']); ?><a href="#" class="stretched-link text-reset btn-link"></a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><?php echo e($post->date . ' ' . $post->time); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Pagination START -->
                    <nav class="my-5" aria-label="navigation">
                        <ul class="pagination d-inline-block d-md-flex justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">15</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">بعد</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Pagination END -->
                </div>
                <!-- Main Post END -->

                <!-- Sidebar START -->
                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div data-sticky data-margin-top="80" data-sticky-for="767">
                        <!-- Trending topics widget START -->
                        <div>
                            <h4 class="mb-3">دسته بندی</h4>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/01.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#" class="stretched-link btn-link text-white h5">گردشگری</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/02.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#" class="stretched-link btn-link text-white h5">فناوری اطلاعات</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/03.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#" class="stretched-link btn-link text-white h5">فرهنگ</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/04.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#" class="stretched-link btn-link text-white h5">سیاست</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/05.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#" class="stretched-link btn-link text-white h5">ورزش</a>
                                </div>
                            </div>
                            <!-- View All Category button -->
                            <div class="text-center mt-3">
                                <a href="#" class="text-muted text-primary-hover"><u>مشاهده همه</u></a>
                            </div>
                        </div>
                        <!-- Trending topics widget END -->

                        <div class="row">
                            <!-- Recent post widget START -->
                            <div class="col-12 col-sm-6 col-lg-12">
                                <h4 class="mt-4 mb-3">پربحث ترین ها</h4>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/thumb/01.jpg" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">تداوم تنفس هوای ناسالم</a></h6>
                                            <div class="small mt-1">17 دی، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/thumb/02.jpg" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">جدول لیگ در پایان هفته</a></h6>
                                            <div class="small mt-1">4 آبان، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/thumb/03.jpg" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">گشت نامحسوس در بازار ارز</a></h6>
                                            <div class="small mt-1">30 خرداد، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/thumb/04.jpg" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset">7 مشکل اولیه استارت آپ ها</a></h6>
                                            <div class="small mt-1">29 بهمن، 1400</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent post widget END -->

                            <!-- ADV widget START -->
                            <div class="col-12 col-sm-6 col-lg-12 my-4">
                                <a href="#" class="d-block card-img-flash">
                                    <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/adv.png" alt="">
                                </a>
                                <div class="smaller text-end mt-2">تبلیغ در سایت <a href="#" class="text-muted"><u>انتخاب</u></a></div>
                            </div>
                            <!-- ADV widget END -->
                        </div>
                    </div>
                </div>
                <!-- Sidebar END -->
            </div> <!-- Row end -->
        </div>
    </section>
    <!-- =======================
    Main content END -->



</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<?php echo e($view->make('backend/main/layout/footer')); ?>

<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/sticky-js/sticky.min.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/post-categories/category-posts.blade.php ENDPATH**/ ?>
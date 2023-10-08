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

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/overlay-scrollbar/css/OverlayScrollbars.min.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

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
  Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3"><?php echo e($lang['categories']); ?> <span
                                    class="badge bg-primary bg-opacity-10 text-primary"><?php echo e(count($categories)); ?></span>
                        </h1>
                        <a href="<?php echo e(route('/panel/add-post-category')); ?>" class="btn btn-sm btn-primary mb-0"><i
                                    class="fas fa-plus me-2"></i><?php echo e($lang['add-new-category']); ?></a>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-xl-4">
                        <!-- Category item START -->
                        <div class="card border h-100">
                            <!-- Card header -->
                            <div class="card-header border-bottom p-3">
                                <div class="d-flex align-items-center">
                                    
                                    <h4 class="mb-0 ms-3"><?php echo e($category->title); ?></h4>
                                </div>
                            </div>

                            <!-- Card body START -->
                            <div class="card-body p-3">
                                <p><?php echo e($category->description); ?></p>

                                <!-- Followers and Post -->
                                <div class="d-flex justify-content-between">
                                    <!-- Total post -->
                                    <div>
                                        <h5 class="mb-0">
                                            <?php echo e(count($posts->get(['status' => 'approved', 'post_category_id' => $category->id]))); ?>

                                        </h5>
                                        <h6 class="mb-0 fw-light"><?php echo e($lang['all-posts']); ?></h6>
                                    </div>
                                    <!-- Avatar group -->
                                    <ul class="avatar-group mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                 src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/10.jpg"
                                                 alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                 src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/11.jpg"
                                                 alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                 src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/12.jpg"
                                                 alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><i
                                                        class="fas fa-plus text-white position-absolute top-50 start-50 translate-middle"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <!-- Card body END -->
                            <!-- Card footer -->
                            <div class="card-footer border-top text-center p-3">
                                <a href="<?php echo e(route('/panel/post-categories/') . $category->id . '/posts'); ?>"
                                   class="btn btn-primary-soft w-100 mb-0"><?php echo e($lang['show-posts']); ?></a>
                            </div>
                        </div>
                        <!-- Category item END -->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- =======================
    Main contain END -->

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
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/apexcharts/js/apexcharts.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/overlay-scrollbar/js/OverlayScrollbars.min.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/post-categories/list.blade.php ENDPATH**/ ?>
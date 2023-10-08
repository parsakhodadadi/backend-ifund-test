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

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/overlay-scrollbar/css/OverlayScrollbars.min.css">

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
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <!-- Counter START -->
                    <div class="row g-4">
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-body border p-3">
                                <div class="d-flex align-items-center">
                                    <!-- Icon -->
                                    <div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-3">
                                        <h3><?php echo e($views); ?></h3>
                                        <h6 class="mb-0">بازدید صفحات</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-body border p-3">
                                <div class="d-flex align-items-center">
                                    <!-- Icon -->
                                    <div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
                                        <i class="bi bi-file-earmark-text-fill"></i>
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-3">
                                        <h3><?php echo e(count($posts)); ?></h3>
                                        <h6 class="mb-0">کل مطالب</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-body border p-3">
                                <div class="d-flex align-items-center">
                                    <!-- Icon -->
                                    <div class="icon-xl fs-1 bg-danger bg-opacity-10 rounded-3 text-danger">
                                        <i class="bi bi-suit-heart-fill"></i>
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-3">
                                        <h3><?php echo e(count($likes)); ?></h3>
                                        <h6 class="mb-0">لایک</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-body border p-3">
                                <div class="d-flex align-items-center">
                                    <!-- Icon -->
                                    <div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">
                                        <i class="bi bi-bar-chart-line-fill"></i>
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-3">
                                        <h3><?php echo e(count($viewers)); ?></h3>
                                        <h6 class="mb-0">بازدیدکننده</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Counter END -->
                </div>

                <div class="col-xl-8">
                    <!-- Chart START -->
                    <div class="card border h-100">

                        <!-- Card header -->
                        <div class="card-header p-3 border-bottom">
                            <h4 class="card-header-title mb-0">بازدید هفته</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Apex chart -->
                            <div id="apexChartTrafficStats" class="mt-2"></div>
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>






































































































































































































































































































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

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/dashboard.blade.php ENDPATH**/ ?>
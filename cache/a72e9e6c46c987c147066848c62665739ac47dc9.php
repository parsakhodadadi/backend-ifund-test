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

                <div class="col-md-6 col-xxl-4">
                    <!-- Latest blog START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom p-3">
                            <h5 class="card-header-title mb-0">آخرین اخبار</h5>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-3">

                            <div class="row">
                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/01.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">رازهای کوچک کثیف در مورد صنعت تجارت</a>
                                            <p class="small mb-0">17 تیر، 1400</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/02.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">فیلم‌های بالیوودی الگوی ضدانقلاب شده!</a>
                                            <p class="small mb-0">11 دی، 1400</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/1by1/03.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a>
                                            <p class="small mb-0">1 خرداد، 1400</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->

                        <!-- Card footer -->
                        <div class="card-footer border-top text-center p-3">
                            <a href="#">مشاهده همه</a>
                        </div>

                    </div>
                    <!-- Latest blog END -->
                </div>

                <div class="col-md-6 col-xxl-4">
                    <!-- Recent comment START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom p-3">
                            <h5 class="card-header-title mb-0">آخرین نظرات</h5>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-3">

                            <div class="row">
                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/06.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با الهام کریمی</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/08.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با سارا موحد</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/04.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با سهراب رضایی</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/05.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با نگین جوان</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Recent comment END -->
                </div>

                <div class="col-md-6 col-xxl-4">
                    <!-- Notice board START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center  p-3">
                            <h5 class="card-header-title mb-0">نوتیفیکیشن ها</h5>
                            <!-- Dropdown button -->
                            <div class="dropdown text-end">
                                <a href="#" class="btn border-0 p-0 mb-0" role="button" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots fa-fw"></i>
                                </a>
                                <!-- dropdown button -->
                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-3">
                            <div class="custom-scrollbar h-350">
                                <div class="row">
                                    <!-- Notice board item -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between position-relative">
                                            <div class="d-sm-flex">
                                                <div class="icon-lg bg-warning bg-opacity-15 text-warning rounded-2 flex-shrink-0">
                                                    <i class="fas fa-user-tie fs-5"></i>
                                                </div>
                                                <!-- Info -->
                                                <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">ثبت نام نویسنده جدید</a></h6>
                                                    <p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
                                                    <span class="small">5 دقیقه پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <hr class="my-3">

                                    <!-- Notice board item -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between position-relative">
                                            <div class="d-sm-flex">
                                                <div class="icon-lg bg-success bg-opacity-10 text-success rounded-2 flex-shrink-0">
                                                    <i class="bi bi-chat-left-quote-fill fs-5"></i>
                                                </div>
                                                <!-- Info -->
                                                <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">افزودن 5 خبر جدید</a></h6>
                                                    <p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
                                                    <span class="small">4 ساعت پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <hr class="my-3">

                                    <!-- Notice board item -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between position-relative">
                                            <div class="d-sm-flex">
                                                <div class="icon-lg bg-danger bg-opacity-10 text-danger rounded-2 flex-shrink-0">
                                                    <i class="bi bi-bell-fill fs-5"></i>
                                                </div>
                                                <!-- Info -->
                                                <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">5 ثبت نام جدید در خبرنامه</a></h6>
                                                    <p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
                                                    <span class="small">4 ساعت پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider -->
                                    <hr class="my-3">

                                    <!-- Notice board item -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between position-relative">
                                            <div class="d-sm-flex">
                                                <div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2 flex-shrink-0"><i class="fas fa-globe fs-5"></i></div>
                                                <!-- Info -->
                                                <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">بروزرسانی ویژگی های جدید</a></h6>
                                                    <span class="small">3 روز پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Row END -->
                            </div>
                        </div>
                        <!-- Card body END -->

                        <!-- Card footer -->
                        <div class="card-footer border-top text-center p-3">
                            <a href="#">مشاهده همه</a>
                        </div>

                    </div>
                    <!-- Notice board END -->
                </div>

                <div class="col-md-6 col-xxl-4">
                    <div class="card border h-100">

                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                            <h5 class="card-header-title mb-0">آمار بازدید</h5>
                            <a href="#" class="btn btn-sm btn-link p-0 mb-0 text-reset">مشاهده همه</a>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-4">
                            <!-- Chart -->
                            <div class=" mx-auto">
                                <div id="apexChartTrafficSources"></div>
                            </div>
                            <!-- Content -->
                            <ul class="list-inline text-center mt-3">
                                <li class="list-inline-item pe-2"><i class="text-primary fas fa-circle pe-1"></i> مرورگر </li>
                                <li class="list-inline-item pe-2"><i class="text-success fas fa-circle pe-1"></i> وب سایت </li>
                                <li class="list-inline-item pe-2"><i class="text-danger fas fa-circle pe-1"></i> شبکه های اجتماعی </li>
                                <li class="list-inline-item pe-2"><i class="text-warning fas fa-circle pe-1"></i> سایر </li>
                            </ul>
                        </div>
                    </div>
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
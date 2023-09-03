<!DOCTYPE html>
<html lang="fa"dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author"content="Blogzine">
    <meta name="description"content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

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
    <link rel="shortcut icon"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet"type="text/css"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet"type="text/css"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet"type="text/css"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet"type="text/css"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/plyr/plyr.css">

    <!-- Theme CSS -->
    <link id="style-switch"rel="stylesheet"type="text/css"href="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/css/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<div class="preloader">
    <div class="loader">
        <div class="sh1"></div>
        <div class="sh2"></div>
    </div>
</div>
<!-- Preloader END -->

<!-- Top alert START -->
<div class="alert alert-warning py-2 m-0 bg-primary border-0 rounded-0 alert-dismissible fade show text-center overflow-hidden"role="alert">
    <!-- SVG shape START -->
    <figure class="position-absolute top-50 start-50 translate-middle">
        <svg width="1848"height="481"viewBox="0 0 1848.9 481.8"xmlns="http://www.w3.org/2000/svg">
            <path class="fill-success"d="m779.4 251c-10.3-11.5-19.9-23.8-29.4-36.1-9-11.6-18.4-22.8-27.1-34.7-15.3-21.2-30.2-45.8-54.8-53.3-10.5-3.2-21.6-3.2-30.6 2.5-7.6 4.8-13 12.6-17.3 20.9-10.8 20.6-16.1 44.7-24.6 66.7-7.9 20.2-19.4 38.6-33.8 54.3-14.7 16.2-31.7 30-50.4 41-15.9 9.4-33.4 17.2-52 19.3-18.4 2-38-2.5-56.5-6.2-22.4-4.4-45.1-9.7-67.6-10.9-9.8-0.5-19.8-0.3-29.1 2.3-9.8 2.8-18.7 8.6-26.6 15.2-17.3 14.5-30.2 34.4-43.7 52.9-12.9 17.6-26.8 34.9-45.4 45.4-19.5 11-42.6 12.1-65 6.6-52.3-13.1-93.8-56.5-127.9-101.5-8.8-11.6-17.3-23.4-25.6-35.4-0.6-0.9-1.1-1.8-1.6-2.7-1.1-2.4-0.9-2.6 0.6-1.2 1 0.9 1.9 1.9 2.7 3 35.3 47.4 71.5 98.5 123.2 123.9 22.8 11.2 48.2 17.2 71.7 12.2 23-5 40.6-21.2 55.3-39.7 24.5-30.7 46.5-75.6 87.1-83 19.5-3.5 40.7 0.1 60.6 3.7 21.2 3.9 42.3 9.1 63.6 11.7 17.8 2.3 35.8-0.1 52.2-7 20-8.1 38.4-20.2 54.8-34.6 16.2-14.1 31-30.7 41.8-50.4 11.1-20.2 17-43.7 24.9-65.7 6.1-16.9 13.8-36.2 29.3-44.5 16.1-8.6 37.3-1.9 52.3 10.6 18.7 15.6 31.2 39.2 46.7 58.2"/>
            <path class="fill-warning"d="m1157.9 344.9c9.8 7.6 18.9 15.8 28.1 24 8.6 7.7 17.6 15.2 26 23.2 14.8 14.2 29.5 30.9 51.2 34.7 9.3 1.6 18.8 0.9 26.1-3.8 6.1-3.9 10.2-9.9 13.2-16.2 7.6-15.6 10.3-33.2 15.8-49.6 5.2-15.1 13.6-29 24.7-41.3 11.4-12.6 24.8-23.6 40-32.8 12.9-7.8 27.3-14.6 43.1-17.3 15.6-2.6 32.8-0.7 49 0.7 19.6 1.7 39.4 4 58.8 3.4 8.4-0.3 17-1.1 24.8-3.6 8.2-2.7 15.4-7.4 21.6-12.7 13.7-11.6 23.1-26.7 33.3-40.9 9.6-13.5 20.2-26.9 35.3-35.6 15.8-9.2 35.6-11.6 55.2-9.1 45.7 5.8 84.8 34.3 117.6 64.4 8.7 8 17.2 16.2 25.6 24.6 2.5 3.2 1.9 3-1.2 1-34.3-32-69.7-66.9-116.5-81.9-20.5-6.5-42.7-9.2-62.4-4-19.3 5.1-33.1 17.9-44.3 32.2-18.5 23.7-33.9 57.5-68.1 65.5-16.5 3.8-34.9 2.6-52.3 1.3-18.5-1.4-37-3.7-55.4-4.2-15.5-0.5-30.7 2.5-44.2 8.5-16.5 7.2-31.3 17.1-44.3 28.5-12.8 11.2-24.1 24.1-31.9 39-7.9 15.3-11.1 32.5-16.2 48.9-3.9 12.6-9 26.9-21.6 33.9-13.1 7.3-31.9 3.8-45.7-4.1-17.2-10-29.9-26.1-44.6-38.8"/>
            <path class="fill-warning"d="m1840.8 379c-8.8 40.3-167.8 79.9-300.2 45.3-42.5-11.1-91.4-32-138.7-11.6-38.7 16.7-55 66-90.8 67.4-25.1 1-48.6-20.3-58.1-39.8-31-63.3 50.7-179.9 155.7-208.1 50.4-13.5 97.3-3.2 116.1 1.6 36.3 9.3 328.6 87.4 316 145.2z"/>
            <path class="fill-success"d="M368.3,247.3C265.6,257.2,134,226,110.9,141.5C85,47.2,272.5-9.4,355.5-30.7s182.6-31.1,240.8-18.6    C677.6-31.8,671.5,53.9,627,102C582.6,150.2,470.9,237.5,368.3,247.3z"/>
        </svg>
    </figure>
    <!-- SVG shape END -->
    <div class="position-relative">
        <p class="text-white m-0">دریافت مبلغ ویزیت از طریق تلفن کلینیک<a href="#"class="btn btn-xs btn-dark ms-3 mb-0">ورود به سایت</a></p>
    </div>
    <!-- Close button -->
    <button type="button"class="btn-close btn-close-white opacity-9 p-3"data-bs-dismiss="alert"aria-label="Close"></button>
</div>
<!-- Top alert END -->

<!-- Offcanvas START -->
<div class="offcanvas offcanvas-end"tabindex="-1"id="offcanvasMenu">
    <div class="offcanvas-header justify-content-end">
        <button type="button"class="btn-close text-reset"data-bs-dismiss="offcanvas"aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column pt-0">
        <div>
            <img class="light-mode-item my-3"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/logo.svg"alt="logo">
            <img class="dark-mode-item my-3"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/logo-light.svg"alt="logo">
            <p>موضوع وبلاگ، اخبار و مجله نسل بعدی برای شما برای شروع به اشتراک گذاری داستان های خود از امروز! </p>
            <!-- Nav START -->
            <ul class="nav d-block flex-column my-4">
                <li class="nav-item h5">
                    <a class="nav-link"href="index.html">خانه</a>
                <li class="nav-item h5">
                    <a class="nav-link"href="about-us.html">درباره ما</a>
                </li>
                <li class="nav-item h5">
                    <a class="nav-link"href="post-grid.html">خواندنی ها</a>
                </li>
                <li class="nav-item h5">
                    <a class="nav-link"href="contact-us.html">تماس با ما</a>
                </li>
            </ul>
            <!-- Nav END -->
            <div class="bg-primary bg-opacity-10 p-4 mb-4 text-center w-100 rounded">
                <span>پیشنهاد Blogzine</span>
                <h3>پکیج های خبرنامه</h3>
                <p>گزارش بینش مورد اعتماد در سراسر جهان را دریافت کنید. امروز عضو شوید</p>
                <a href="#"class="btn btn-warning">خرید و فعالسازی</a>
            </div>
        </div>
        <div class="mt-auto pb-3">
            <!-- Address -->
            <p class="text-body mb-2 fw-bold">ایران، تهران</p>
            <address class="mb-0">خیابان سعادت آباد، خیابان سرو غربی، مجتمع پارس</address>
            <p class="mb-2">شماره تماس: <a href="#"class="text-body"><u>469-537-2410</u> (مشاوره رایگان)</a> </p>
            <a href="#"class="text-body d-block">support@example.com</a>
        </div>
    </div>
</div>
<!-- Offcanvas END -->

<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static">
    <div class="navbar-top d-none d-lg-block small">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center my-2">
                <!-- Top bar left -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link ps-0"href="about-us.html">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="#">آرشیو</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="https://www.rtl-theme.com/blogzine-html-template/">خرید قالب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="signin.html">ورود / ثبت نام</a>
                    </li>
                </ul>
                <!-- Top bar right -->
                <div class="d-flex align-items-center">
                    <!-- Font size accessibility START -->
                    <div class="btn-group me-3"role="group"aria-label="font size changer">
                        <input type="radio"class="btn-check"name="fntradio"id="font-sm">
                        <label class="btn btn-xs btn-outline-primary mb-0"for="font-sm">A-</label>

                        <input type="radio"class="btn-check"name="fntradio"id="font-default"checked>
                        <label class="btn btn-xs btn-outline-primary mb-0"for="font-default">A</label>

                        <input type="radio"class="btn-check"name="fntradio"id="font-lg">
                        <label class="btn btn-xs btn-outline-primary mb-0"for="font-lg">A+</label>
                    </div>

                    <!-- Dark mode options START -->
                    <div class="nav-item dropdown mx-2">
                        <!-- Switch button -->
                        <button class="modeswitch"id="bd-theme"type="button"aria-expanded="false"data-bs-toggle="dropdown"data-bs-display="static">
                            <svg class="theme-icon-active"><use href="#"></use></svg>
                        </button>
                        <!-- Dropdown items -->
                        <ul class="dropdown-menu min-w-auto dropdown-menu-end"aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button"class="dropdown-item d-flex align-items-center"data-bs-theme-value="light">
                                    <svg width="16"height="16"fill="currentColor"class="bi bi-brightness-high-fill fa-fw mode-switch me-1"viewBox="0 0 16 16">
                                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                        <use href="#"></use>
                                    </svg>روشن
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button"class="dropdown-item d-flex align-items-center"data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg"width="16"height="16"fill="currentColor"class="bi bi-moon-stars-fill fa-fw mode-switch me-1"viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                        <use href="#"></use>
                                    </svg>تیره
                                </button>
                            </li>
                            <li>
                                <button type="button"class="dropdown-item d-flex align-items-center active"data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg"width="16"height="16"fill="currentColor"class="bi bi-circle-half fa-fw mode-switch me-1"viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                        <use href="#"></use>
                                    </svg>خودکار
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Dark mode options END -->

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5"href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5"href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5"href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5"href="#"><i class="fab fa-youtube-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 pe-0 fs-5"href="#"><i class="fab fa-vimeo"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Divider -->
            <div class="border-bottom border-2 border-primary opacity-1"></div>
        </div>
    </div>

    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand"href="index.html">
                <img class="navbar-brand-item light-mode-item"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/logo.svg"alt="logo">
                <img class="navbar-brand-item dark-mode-item"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/logo-light.svg"alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto"type="button"data-bs-toggle="collapse"data-bs-target="#navbarCollapse"aria-controls="navbarCollapse"aria-expanded="false"aria-label="Toggle navigation">
                <span class="text-body h6 d-none d-sm-inline-block">منو</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse"id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll mx-auto">

                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active"href="#"id="homeMenu"data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">خانه</a>
                        <ul class="dropdown-menu"aria-labelledby="homeMenu">
                            <li> <a class="dropdown-item active"href="index.html">نسخه 1</a></li>
                            <li> <a class="dropdown-item"href="index-lazy.html">نسخه 2</a></li>
                            <li> <a class="dropdown-item"href="index-3.html">نسخه 3</a></li>
                            <li> <a class="dropdown-item"href="index-4.html">نسخه 4</a></li>
                            <li> <a class="dropdown-item"href="index-5.html">نسخه 5</a></li>
                            <li> <a class="dropdown-item"href="index-6.html">نسخه 6</a></li>
                            <li> <a class="dropdown-item"href="index-7.html">نسخه 7</a></li>
                            <li> <a class="dropdown-item"href="index-8.html">نسخه 8</a></li>
                            <li> <a class="dropdown-item"href="index-9.html">نسخه 9</a></li>
                            <li> <a class="dropdown-item"href="index-10.html">نسخه 10</a></li>
                            <li> <a class="dropdown-item"href="index-11.html">نسخه 11</a></li>
                            <li> <a class="dropdown-item"href="index-12.html">نسخه 12</a></li>
                        </ul>
                    </li>

                    <!-- Nav item 2 Pages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"href="#"id="pagesMenu"data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">صفحات</a>
                        <ul class="dropdown-menu"aria-labelledby="pagesMenu">
                            <li> <a class="dropdown-item"href="about-us.html">درباره ما</a></li>
                            <li> <a class="dropdown-item"href="contact-us.html">تماس با ما</a></li>
                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle"href="#">فروشگاه <span class="badge bg-danger smaller me-1">جدید</span></a>
                                <ul class="dropdown-menu dropdown-menu-start"data-bs-popper="none">
                                    <li> <a class="dropdown-item"href="shop-grid.html">لیست محصول <span class="badge bg-danger smaller me-1">جدید</span></a> </li>
                                    <li> <a class="dropdown-item"href="shop-detail.html">جزئیات محصول</a> </li>
                                    <li> <a class="dropdown-item"href="checkout.html">تسویه حساب</a> </li>
                                    <li> <a class="dropdown-item"href="my-cart.html">سبد خرید</a> </li>
                                    <li> <a class="dropdown-item"href="empty-cart.html">سبد خرید خالی</a> </li>
                                </ul>
                            </li>
                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle"href="#">صفحات</a>
                                <ul class="dropdown-menu dropdown-menu-start"data-bs-popper="none">
                                    <li> <a class="dropdown-item"href="author.html">نویسنده</a> </li>
                                    <li> <a class="dropdown-item"href="categories.html">دسته بندی نسخه 1</a> </li>
                                    <li> <a class="dropdown-item"href="categories-2.html">دسته بندی نسخه 2</a> </li>
                                    <li> <a class="dropdown-item"href="tag.html"># برچسب</a> </li>
                                    <li> <a class="dropdown-item"href="search-result.html">نتیجه جستجو</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item"href="404.html">صفحه 404</a></li>
                            <li> <a class="dropdown-item"href="signin.html">ورود</a></li>
                            <li> <a class="dropdown-item"href="signup.html">ثبت نام</a></li>
                            <li> <a class="dropdown-item"href="offline.html">غیرفعال</a></li>
                            <!-- Dropdown submenu levels -->
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle"href="#">زیر منو</a>
                                <ul class="dropdown-menu dropdown-menu-start"data-bs-popper="none">
                                    <!-- dropdown submenu open right -->
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item dropdown-toggle"href="#">نسخه 1</a>
                                        <ul class="dropdown-menu"data-bs-popper="none">
                                            <li> <a class="dropdown-item"href="#">عنوان 1</a> </li>
                                            <li> <a class="dropdown-item"href="#">عنوان 2</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a class="dropdown-item"href="#"> نسخه 2</a> </li>
                                    <!-- dropdown submenu open left -->
                                    <li class="dropdown-submenu dropstart">
                                        <a class="dropdown-item dropdown-toggle"href="#">نسخه 3</a>
                                        <ul class="dropdown-menu dropdown-menu-end"data-bs-popper="none">
                                            <li> <a class="dropdown-item"href="#">عنوان 1</a> </li>
                                            <li> <a class="dropdown-item"href="#">عنوان 2</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a class="dropdown-item"href="#">نسخه 4</a> </li>
                                </ul>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item"href="#"target="_blank">
                                    <i class="text-warning fa-fw bi bi-life-preserver me-2"></i>پشتیبانی
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"href="../rtl/docs/index.html"target="_blank">
                                    <i class="text-danger fa-fw bi bi-card-text me-2"></i>داکیومنت
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item"href="../ltr/index.html"target="_blank">
                                    <i class="text-info fa-fw bi bi-toggle-off me-2"></i>نسخه LTR
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"href="#"target="_blank">
                                    <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>خرید قالب
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Nav item 3 Post -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"href="#"id="postMenu"data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false">لیست مقالات</a>
                        <ul class="dropdown-menu"aria-labelledby="postMenu">
                            <!-- dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle"href="#">شبکه ای</a>
                                <ul class="dropdown-menu dropdown-menu-start"data-bs-popper="none">
                                    <li> <a class="dropdown-item"href="post-grid.html">نسخه 1</a> </li>
                                    <li> <a class="dropdown-item"href="post-grid-4-col.html">نسخه 2</a> </li>
                                    <li> <a class="dropdown-item"href="post-grid-masonry.html">نسخه 3</a> </li>
                                    <li> <a class="dropdown-item"href="post-grid-masonry-filter.html">نسخه 4</a> </li>
                                    <li> <a class="dropdown-item"href="post-large-and-grid.html">نسخه 5</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item"href="post-list.html">لیست نسخه 1</a> </li>
                            <li> <a class="dropdown-item"href="post-list-2.html">لیست نسخه 2</a> </li>
                            <li> <a class="dropdown-item"href="post-cards.html">لیست نسخه 3</a> </li>
                            <li> <a class="dropdown-item"href="post-overlay.html">لیست نسخه 4</a> </li>
                            <li> <a class="dropdown-item"href="post-types.html">لیست نسخه 5</a> </li>
                            <li class="dropdown-divider"></li>
                            <li> <a class="dropdown-item"href="post-single.html">جزئیات نسخه 1</a> </li>
                            <li> <a class="dropdown-item"href="post-single-2.html">جزئیات نسخه 2</a> </li>
                            <li> <a class="dropdown-item"href="post-single-3.html">جزئیات نسخه 3</a> </li>
                            <li> <a class="dropdown-item"href="post-single-4.html">جزئیات نسخه 4</a> </li>
                            <li> <a class="dropdown-item"href="post-single-5.html">جزئیات نسخه 5</a> </li>
                            <li> <a class="dropdown-item"href="post-single-6.html">جزئیات نسخه 6</a> </li>
                            <li> <a class="dropdown-item"href="podcast-single.html">جزئیات نسخه 7</a> </li>
                            <li class="dropdown-divider"></li>
                            <li> <a class="dropdown-item"href="pagination-styles.html">سبک های صفحه بندی</a> </li>
                        </ul>
                    </li>

                    <!-- Nav item 4 Mega menu -->
                    <li class="nav-item dropdown dropdown-fullwidth">
                        <a class="nav-link dropdown-toggle"href="#"id="megaMenu"data-bs-toggle="dropdown"aria-haspopup="true"aria-expanded="false"> مگامنو</a>
                        <div class="dropdown-menu"aria-labelledby="megaMenu">
                            <div class="container">
                                <div class="row g-4 p-3 flex-fill">
                                    <!-- Card item START -->
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card bg-transparent">
                                            <!-- Card img -->
                                            <img class="card-img rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/16by9/small/01.jpg"alt="Card image">
                                            <div class="card-body px-0 pt-3">
                                                <h6 class="card-title mb-0"><a href="#"class="btn-link text-reset">7 دیدگاه اشتباهاتی که همه در سفر مرتکب می شوند؟</a></h6>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                    <li class="nav-item">
                                                        <a href="#"class="text-reset btn-link">الناز حسینی</a>
                                                    </li>
                                                    <li class="nav-item">15 بهمن، 1400</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card item END -->
                                    <!-- Card item START -->
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card bg-transparent">
                                            <!-- Card img -->
                                            <img class="card-img rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/16by9/small/02.jpg"alt="Card image">
                                            <div class="card-body px-0 pt-3">
                                                <h6 class="card-title mb-0"><a href="#"class="btn-link text-reset">12 بدترین نوع حساب های تجاری که در توییتر دنبال می کنید!</a></h6>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                    <li class="nav-item">
                                                        <a href="#"class="text-reset btn-link">محمد کریمی</a>
                                                    </li>
                                                    <li class="nav-item">2 آبان، 1400</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card item END -->
                                    <!-- Card item START -->
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card bg-transparent">
                                            <!-- Card img -->
                                            <img class="card-img rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/16by9/small/03.jpg"alt="Card image">
                                            <div class="card-body px-0 pt-3">
                                                <h6 class="card-title mb-0"><a href="#"class="btn-link text-reset">آیا این آگهی ها واقعی هستند؟ معاوضه لوازم شخصی با غذا!</a></h6>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider align-items-center text-uppercase small mt-2">
                                                    <li class="nav-item">
                                                        <a href="#"class="text-reset btn-link">مهدی شجاعی</a>
                                                    </li>
                                                    <li class="nav-item">14 مرداد، 1400</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card item END -->
                                    <!-- Card item START -->
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="bg-primary bg-opacity-10 p-4 text-center h-100 w-100 rounded">
                                            <span>پیشنهاد Blogzine</span>
                                            <h3>خرید پکیج اقتصادی</h3>
                                            <p>عضویت در خبرنامه</p>
                                            <a href="#"class="btn btn-warning">خرید و فعالسازی</a>
                                        </div>
                                    </div>
                                    <!-- Card item END -->
                                </div> <!-- Row END -->
                                <!-- Trending tags -->
                                <div class="row px-3">
                                    <div class="col-12">
                                        <ul class="list-inline mt-3">
                                            <li class="list-inline-item">برچسب ها:</li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-primary-soft">گردشگری</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-warning-soft">کسب و کار</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-success-soft">فناوری</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-danger-soft">گجت</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-info-soft">سبک زندگی</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-primary-soft">واکسن</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-success-soft">ورزشی</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-danger-soft">کووید</a></li>
                                            <li class="list-inline-item"><a href="#"class="btn btn-sm btn-info-soft">پوشاک</a></li>
                                        </ul>
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </li>

                    <!-- Nav item 5 link-->
                    <li class="nav-item"> <a class="nav-link"href="dashboard.html">داشبورد</a></li>
                </ul>
            </div>
            <!-- Main navbar END -->

            <!-- Nav right START -->
            <div class="nav flex-nowrap align-items-center">
                <!-- Nav Button -->
                <div class="nav-item d-none d-md-block">
                    <a href="#"class="btn btn-sm btn-danger mb-0 mx-2">خبرنامه</a>
                </div>
                <!-- Nav Search -->
                <div class="nav-item dropdown dropdown-toggle-icon-none nav-search">
                    <a class="nav-link dropdown-toggle"role="button"href="#"id="navSearch"data-bs-toggle="dropdown"aria-expanded="false">
                        <i class="bi bi-search fs-4"> </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow rounded p-2"aria-labelledby="navSearch">
                        <form class="input-group">
                            <input class="form-control border-success"type="search"placeholder="جستجو"aria-label="Search">
                            <button class="btn btn-success m-0"type="submit">جستجو</button>
                        </form>
                    </div>
                </div>
                <!-- Offcanvas menu toggler -->
                <div class="nav-item">
                    <a class="nav-link p-0"data-bs-toggle="offcanvas"href="#offcanvasMenu"role="button"aria-controls="offcanvasMenu">
                        <i class="bi bi-text-right rtl-flip fs-2"data-bs-target="#offcanvasMenu"> </i>
                    </a>
                </div>
            </div>
            <!-- Nav right END -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
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
                                <div> <a href="#"class="text-reset btn-link">افزایش آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></div>
                                <div> <a href="#"class="text-reset btn-link">حضورمسیحیان در حرم سامرابا آغاز سال جدید </a></div>
                                <div> <a href="#"class="text-reset btn-link">انتقاد ستاره رئال از شعارهای نژادپرستانه </a></div>
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
    <section class="pt-4 pb-0 card-grid">
        <div class="container">
            <div class="row g-4">
                <!-- Left big card -->
                <div class="col-lg-6">
                    <div class="card card-overlay-bottom card-grid-lg card-bg-scale"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/1by1/01.jpg); background-position: center left; background-size: cover;">
                        <!-- Card featured -->
                        <span class="card-featured"title=""><i class="fas fa-star"></i></span>
                        <!-- Card Image overlay -->
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <a href="#"class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>مگامنو</a>
                                <!-- Card title -->
                                <h2 class="text-white h1"><a href="post-single-4.html"class="btn-link stretched-link text-reset">ده نشانه که نشان می دهد برای راه اندازی یک استارتاپ جدید به آن نیاز دارید.</a></h2>
                                <p class="text-white">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد. </p>
                                <!-- Card info -->
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center text-white position-relative">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/11.jpg"alt="avatar">
                                                </div>
                                                <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">سهیلا صالحی</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">15 دی، 1400</li>
                                    <li class="nav-item">5 دقیقه زمان مطالعه</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right small cards -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <!-- Card item START -->
                        <div class="col-12">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/1by1/02.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image -->
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#"class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html"class="btn-link stretched-link text-reset">بهترین تابلوهای Pinterest برای یادگیری در مورد تجارت</a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">با <a href="#"class="stretched-link text-reset btn-link">مهدی راد</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">18 تیر، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-md-6">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/1by1/03.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#"class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html"class="btn-link stretched-link text-reset">دلیل کاهش نرخ دلار </a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">با <a href="#"class="stretched-link text-reset btn-link">مسعود خالدی</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">8 دی، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-md-6">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/1by1/04.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#"class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html"class="btn-link stretched-link text-reset">جدول لیگ در پایان هفته</a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">با <a href="#"class="stretched-link text-reset btn-link">شادی اسدی</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">28 آذر، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main hero END -->

    <!-- =======================
    Main content START -->
    <section class="position-relative">
        <div class="container"data-sticky-container>
            <div class="row">
                <!-- Main Post START -->
                <div class="col-lg-9">
                    <!-- Title -->
                    <div class="mb-4">
                        <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>سایر اخبار مهم</h2>
                        <p>آخرین اخبار، تصاویر، فیلم ها و گزارش های ویژه</p>
                    </div>
                    <div class="row gy-4">
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/01.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#"class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <!-- Sponsored Post -->
                                    <a href="#!"class="mb-0 text-body small"tabindex="0"role="button"data-bs-container="body"data-bs-toggle="popover"data-bs-trigger="focus"data-bs-placement="top"data-bs-content="شما این تبلیغ را می بینید زیرا فعالیت شما با مخاطبان مورد نظر سایت ما مطابقت دارد.">
                                        <i class="bi bi-info-circle ps-1"></i> ویژه
                                    </a>
                                    <h4 class="card-title mt-2"><a href="post-single.html"class="btn-link text-reset">فیلم‌های بالیوودی الگوی ضدانقلاب شده!</a></h4>
                                    <p class="card-text">ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد...</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/01.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">ادمین</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">22 آذر، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/06.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-white bg-opacity-25 bg-blur text-white rounded-circle"title="This post has video"><i class="fas fa-video"></i></div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#"class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title"><a href="post-single.html"class="btn-link text-reset">رازهای کوچک کثیف در مورد صنعت تجارت</a></h4>
                                    <p class="card-text">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی...</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/02.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">میلاد بابایی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">7 دی، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/03.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#"class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اجتماعی</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title"><a href="post-single.html"class="btn-link text-reset">عادات بدی که افراد در صنعت باید آنها را ترک کنند!!!</a></h4>
                                    <p class="card-text">دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا...</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/03.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">علی علیزاده</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">17 تیر، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/04.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#"class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title"><a href="post-single.html"class="btn-link text-reset">سال 2022 رویایی و فوق العاده برای طارمی</a></h4>
                                    <p class="card-text">برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت...</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <div class="avatar-img rounded-circle bg-success">
                                                            <span class="text-white position-absolute top-50 start-50 translate-middle fw-bold small">SL</span>
                                                        </div>
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">سهراب اسدی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">29 مرداد، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <!-- <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/05.jpg"alt="Card image"> -->
                                    <div class="card-image position-relative">
                                        <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/05.jpg"alt="Card image">
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Card overlay -->
                                            <div class="w-100 my-auto">
                                                <!-- Audio START -->
                                                <div class="player-wrapper bg-light rounded">
                                                    <audio class="player-audio"crossorigin>
                                                        <source src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/videos/audio.mp3"type="audio/mp3">
                                                    </audio>
                                                </div>
                                                <!-- Audio END -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title"><a href="post-single.html"class="btn-link text-reset">طرح مجلس برای گرفتن مالیات از سفته بازها</a></h4>
                                    <p class="card-text">ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده... </p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/05.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">نازنین لولایی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">11 دی، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/12.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#"class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title"><a href="post-single.html"class="btn-link text-reset">رونمایی از طرح بزرگترین تلسکوپ نوری آسیا</a></h4>
                                    <p class="card-text">متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان...</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/06.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">زهرا عظیمی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">1 خرداد، 1400</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Load more START -->
                        <div class="col-12 text-center mt-5">
                            <button type="button"class="btn btn-primary-soft">مشاهده بیشتر <i class="bi bi-arrow-down-circle ms-2 align-middle"></i></button>
                        </div>
                        <!-- Load more END -->
                    </div>
                </div>
                <!-- Main Post END -->
                <!-- Sidebar START -->
                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div data-sticky data-margin-top="80"data-sticky-for="767">

                        <!-- Social widget START -->
                        <div class="row g-2">
                            <div class="col-4">
                                <a href="#"class="bg-facebook rounded text-center text-white-force p-3 d-block">
                                    <i class="fab fa-facebook-square fs-5 mb-2"></i>
                                    <h6 class="m-0">1.5K</h6>
                                    <span class="small">طرفدار</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#"class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block">
                                    <i class="fab fa-instagram fs-5 mb-2"></i>
                                    <h6 class="m-0">1.8M</h6>
                                    <span class="small">حامیان</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#"class="bg-youtube rounded text-center text-white-force p-3 d-block">
                                    <i class="fab fa-youtube-square fs-5 mb-2"></i>
                                    <h6 class="m-0">22K</h6>
                                    <span class="small">بازدید</span>
                                </a>
                            </div>
                        </div>
                        <!-- Social widget END -->

                        <!-- Trending topics widget START -->
                        <div>
                            <h4 class="mt-4 mb-3">برگزیده ها</h4>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 "style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/01.jpg); background-position: center left; background-size: cover;">
                                <div class="p-3">
                                    <a href="#"class="stretched-link btn-link text-white h5">گردشگری</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/02.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#"class="stretched-link btn-link text-white h5">اقتصاد</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/03.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#"class="stretched-link btn-link text-white h5">فرهنگ</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/04.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#"class="stretched-link btn-link text-white h5">تکنولوژی</a>
                                </div>
                            </div>
                            <!-- Category item -->
                            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"style="background-image:url(route('/Others/Themes/Frontednd/Theme/<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/05.jpg); background-position: center left; background-size: cover;">
                                <div class="bg-dark-overlay-4 p-3">
                                    <a href="#"class="stretched-link btn-link text-white h5">ورزش</a>
                                </div>
                            </div>
                            <!-- View All Category button -->
                            <div class="text-center mt-3">
                                <a href="#"class="text-body text-primary-hover"><u>مشاهده همه</u></a>
                            </div>
                        </div>
                        <!-- Trending topics widget END -->

                        <div class="row">
                            <!-- Recent post widget START -->
                            <div class="col-12 col-sm-6 col-lg-12">
                                <h4 class="mt-4 mb-3">پربحث ها</h4>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/thumb/01.jpg"alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html"class="btn-link stretched-link text-reset">خرید و فروش ارز در کانال 37 هزار تومانی</a></h6>
                                            <div class="small mt-1">17 بهمن، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/thumb/02.jpg"alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html"class="btn-link stretched-link text-reset">کاهش 192 هزار میلیارد تومانی بدهی دولت</a></h6>
                                            <div class="small mt-1">4 مهر، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/thumb/03.jpg"alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html"class="btn-link stretched-link text-reset">ساخت مسکن موتور محرک کاهش تورم</a></h6>
                                            <div class="small mt-1">30 تیر، 1400</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post item -->
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/thumb/04.jpg"alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html"class="btn-link stretched-link text-reset">آشنایی با کلید موفقیت نهضت ملی مسکن‌</a></h6>
                                            <div class="small mt-1">29 دی 1400</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent post widget END -->

                            <!-- ADV widget START -->
                            <div class="col-12 col-sm-6 col-lg-12 my-4">
                                <a href="#"class="d-block card-img-flash">
                                    <img src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/adv.png"alt="">
                                </a>
                                <div class="smaller text-end mt-2">تبلیغ در سایت <a href="#"class="text-body"><u>انتخاب</u></a></div>
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
                        <a href="#"class="text-body small"><u>مشاهده همه</u></a>
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
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/07.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle"title="8.5 rating">8.5</div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#"class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-3.html"class="btn-link text-reset">افزایش آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/07.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">مریم ترابی</a></span>
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
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/08.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#"class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-3.html"class="btn-link text-reset">آمار فرزندان حاصل از روش‌های کمک‌ باروری در جهان</a></h5>
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
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">رضا مرادی</a></span>
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
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/09.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#"class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>سیاست</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-3.html"class="btn-link text-reset">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/09.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">سارا حقیقت نژاد</a></span>
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
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/10.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md bg-white-soft bg-blur text-white rounded-circle"title=""><i class="fas fa-image"></i></div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#"class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>فرهنگ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-3.html"class="btn-link text-reset">به همین دلیل امسال سال استارت آپ ها خواهد بود؟</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/10.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">نیلوفر راد</a></span>
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
                                    <img class="card-img"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/blog/4by3/11.jpg"alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#"class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-3.html"class="btn-link text-reset">بهترین تابلوهای پینترست برای یادگیری در مورد تجارت</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/avatar/12.jpg"alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"class="stretched-link text-reset btn-link">المیرا کرمی</a></span>
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
<footer class="bg-dark pt-5">
    <div class="container">
        <!-- About and Newsletter START -->
        <div class="row pt-3 pb-4">
            <div class="col-md-3">
                <img src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/logo-footer.svg"alt="footer logo">
            </div>
            <div class="col-md-5">
                <p class="text-muted">این قالب مبتنی بر بوت استرپ 5 برای همه انواع سایت های مجله خبری و وبلاگ مناسب است.</p>
            </div>
            <div class="col-md-4">
                <!-- Form -->
                <form class="row row-cols-lg-auto g-2 align-items-center justify-content-end">
                    <div class="col-12">
                        <input type="email"class="form-control"placeholder="ایمیل">
                    </div>
                    <div class="col-12">
                        <button type="submit"class="btn btn-primary m-0">عضویت</button>
                    </div>
                    <div class="form-text mt-2">با عضویت در خبرنامه
                        <a href="#"class="text-decoration-underline text-reset">شرایط و قوانین</a> را خواهید پذیرفت.
                    </div>
                </form>
            </div>
        </div>
        <!-- About and Newsletter END -->

        <!-- Divider -->
        <hr>

        <!-- Widgets START -->
        <div class="row pt-5">
            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-3 mb-4">
                <h5 class="mb-4 text-white">اخبار اخیر</h5>
                <!-- Item -->
                <div class="mb-4 position-relative">
                    <div><a href="#"class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a></div>
                    <a href="post-single-3.html"class="btn-link text-white fw-normal">تقویم آزمون‌های علوم پزشکی</a>
                    <ul class="nav nav-divider align-items-center small mt-2 text-muted">
                        <li class="nav-item position-relative">
                            <div class="nav-link">با <a href="#"class="stretched-link text-reset btn-link">نازنین لطفی</a>
                            </div>
                        </li>
                        <li class="nav-item">6 مهر، 1400</li>
                    </ul>
                </div>
                <!-- Item -->
                <div class="mb-4 position-relative">
                    <div><a href="#"class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>فرهنگ</a></div>
                    <a href="post-single-3.html"class="btn-link text-white fw-normal">احتمال آغاز موج هشتم کرونا در کشور</a>
                    <ul class="nav nav-divider align-items-center small mt-2 text-muted">
                        <li class="nav-item position-relative">
                            <div class="nav-link">با <a href="#"class="stretched-link text-reset btn-link">ادمین</a>
                            </div>
                        </li>
                        <li class="nav-item">29 اسفند، 1400</li>
                    </ul>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-3 mb-4">
                <h5 class="mb-4 text-white">لینک های مفید</h5>
                <div class="row">
                    <div class="col-6">
                        <ul class="nav flex-column text-primary-hover">
                            <li class="nav-item"><a class="nav-link pt-0"href="#">قیمت ارز</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">پیوندها</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">تماس با ما</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">لیگ ایران و جهان</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">پشتیبانی</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">شرایط و قوانین</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">خبرنامه</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav flex-column text-primary-hover">
                            <li class="nav-item"><a class="nav-link pt-0"href="#">اخبار</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">اقتصاد <span class="badge text-bg-danger ms-2">2</span></a></li>
                            <li class="nav-item"><a class="nav-link"href="#">فناوری و اطلاعات</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">اجتماعی</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">ورزش</a></li>
                            <li class="nav-item"><a class="nav-link"href="#">رسانه</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-3 mb-4">
                <h5 class="mb-4 text-white">دریافت بروزسانی ها</h5>
                <ul class="nav flex-column text-primary-hover">
                    <li class="nav-item"><a class="nav-link pt-0"href="#"><i class="fab fa-whatsapp fa-fw me-2"></i>واتساپ</a></li>
                    <li class="nav-item"><a class="nav-link"href="#"><i class="fab fa-youtube fa-fw me-2"></i>یوتیوب</a></li>
                    <li class="nav-item"><a class="nav-link"href="#"><i class="far fa-bell fa-fw me-2"></i>وب سایت</a></li>
                    <li class="nav-item"><a class="nav-link"href="#"><i class="far fa-envelope fa-fw me-2"></i>خبرنامه</a></li>
                    <li class="nav-item"><a class="nav-link"href="#"><i class="fas fa-headphones-alt fa-fw me-2"></i>پادکست</a></li>
                </ul>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-3 mb-4">
                <h5 class="mb-4 text-white">اپلیکیشن موبایل</h5>
                <p class="text-muted">برنامه را دانلود کنید و آخرین اخبار فوری و مقالات روزانه را دریافت کنید.</p>
                <div class="row g-2">
                    <div class="col">
                        <a href="#"><img class="w-100"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/app-store.svg"alt="app-store"></a>
                    </div>
                    <div class="col">
                        <a href="#"><img class="w-100"src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/images/google-play.svg"alt="google-play"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Widgets END -->

        <!-- Hot topics START -->
        <div class="row">
            <h5 class="mb-2 text-white">پربیننده ترین</h5>
            <ul class="list-inline text-primary-hover lh-lg">
                <li class="list-inline-item"><a href="#">کووید</a></li>
                <li class="list-inline-item"><a href="#">سیاست</a></li>
                <li class="list-inline-item"><a href="#">فرهنگ و هنر</a></li>
                <li class="list-inline-item"><a href="#">رسانه</a></li>
                <li class="list-inline-item"><a href="#">پزشکی</a></li>
                <li class="list-inline-item"><a href="#">استارت آپ</a></li>
                <li class="list-inline-item"><a href="#">بورس ایران</a></li>
                <li class="list-inline-item"><a href="#">قیمت طلا</a></li>
                <li class="list-inline-item"><a href="#">گردشگری</a></li>
                <li class="list-inline-item"><a href="#">مجلس و دولت</a></li>
                <li class="list-inline-item"><a href="#">طب سنتی</a></li>
                <li class="list-inline-item"><a href="#">خبرنامه</a></li>
                <li class="list-inline-item"><a href="#">قیمت خودرو</a></li>
                <li class="list-inline-item"><a href="#">اقتصاد</a></li>
                <li class="list-inline-item"><a href="#">بین الملل</a></li>
                <li class="list-inline-item"><a href="#">ورزش</a></li>
                <li class="list-inline-item"><a href="#">گرافیک</a></li>
                <li class="list-inline-item"><a href="#">ادبیات</a></li>
                <li class="list-inline-item"><a href="#">موسیقی تجسمی</a></li>
                <li class="list-inline-item"><a href="#">اجتماعی</a></li>
                <li class="list-inline-item"><a href="#">صنعت و تجارت</a></li>
            </ul>
        </div>
        <!-- Hot topics END -->
    </div>

    <!-- Footer copyright START -->
    <div class="bg-dark-overlay-3 mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-md-between py-4">
                <div class="col-md-6">
                    <!-- Copyright -->
                    <div class="text-center text-md-start text-primary-hover text-muted">©2022 ارائه شده در سایت <a href="https://www.rtl-theme.com/"class="text-reset btn-link"target="_blank">راست چین</a>
                    </div>
                </div>
                <div class="col-md-6 d-sm-flex align-items-center justify-content-center justify-content-md-end">
                    <!-- Language switcher -->
                    <div class="dropup me-0 me-sm-3 mt-3 mt-md-0 text-center text-sm-end">
                        <a class="dropdown-toggle text-primary-hover"href="#"role="button"id="languageSwitcher"data-bs-toggle="dropdown"aria-expanded="false">
                            زبان ها
                        </a>
                        <ul class="dropdown-menu min-w-auto"aria-labelledby="languageSwitcher">
                            <li><a class="dropdown-item"href="#">فارسی</a></li>
                            <li><a class="dropdown-item"href="#">انگلیسی </a></li>
                            <li><a class="dropdown-item"href="#">فرانسوی</a></li>
                        </ul>
                    </div>
                    <!-- Links -->
                    <ul class="nav text-primary-hover text-center text-sm-end justify-content-center justify-content-center mt-3 mt-md-0">
                        <li class="nav-item"><a class="nav-link"href="#">شرایط</a></li>
                        <li class="nav-item"><a class="nav-link"href="#">قوانین</a></li>
                        <li class="nav-item"><a class="nav-link pe-0"href="#">کوکی</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer copyright END -->
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/tiny-slider/tiny-slider-rtl.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/sticky-js/sticky.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/vendor/plyr/plyr.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontednd/Theme/assets')); ?> ')/js/functions.js"></script>
<!-- rtl-theme script-->
<script src="https://files-de.rtl-theme.com/jsdemos/79df7d11747f944da7628dfc1c76f709661cfe8f.js?pid=254067"></script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/index.blade.php ENDPATH**/ ?>
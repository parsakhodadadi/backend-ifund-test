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
<div class="preloader">
    <div class="loader">
        <div class="sh1"></div>
        <div class="sh2"></div>
    </div>
</div>
<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo e($view->make('frontend/main/layout/header')); ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- Divider -->
    <div class="border-bottom border-primary border-1 opacity-1"></div>

    <!-- =======================
    Inner intro START -->
    <section class="pb-3 pb-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><?php echo e($category->title); ?></a>
                    <h1><?php echo e($post->title); ?></h1>
                </div>
                <p class="lead"><?php echo e($post->description); ?></p>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Main START -->
    <section class="pt-0">
        <div class="container position-relative" data-sticky-container>
            <div class="row">
                <!-- Left sidebar START -->
                <div class="col-lg-2">
                    <div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
                        <!-- Author info -->
                        <div class="position-relative">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img rounded-circle" src="<?php echo e(route('/') . $user->photo); ?>" alt="avatar">
                            </div>
                            <a href="#" class="h5 stretched-link mt-2 mb-0 d-block"><?php echo e($user->first_name . ' ' . $user->last_name); ?></a>
                            <p>
                                <?php if($user->user_type == 'fulladmin'): ?>
                                    <?php echo e(__('posts.fulladmin')); ?>

                                <?php else: ?>
                                    <?php echo e(__('posts.admin')); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                        <hr class="d-none d-lg-block">
                        <!-- Card info -->
                        <ul class="list-inline list-unstyled">
                            <li class="list-inline-item d-lg-block my-lg-2"><?php echo e($post->date . ' ' . $post->time); ?></li>
                            <li class="list-inline-item d-lg-block my-lg-2">5 دقیقه زمان مطالعه</li>
                            <li class="list-inline-item d-lg-block my-lg-2"><a href="#" class="text-body"><i class="far fa-heart me-1"></i></a> 266</li>
                            <li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> 2344 بازدید</li>
                        </ul>
                        <!-- Tags -->
                        <ul class="list-inline text-primary-hover mt-0 mt-lg-3">
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#ورزش</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#فیلم</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#رسانه</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#برگزیده</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#استارت آپ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Left sidebar END -->
                <!-- Main Content START -->
                <div class="col-lg-7 mb-5">
                    <!-- Image -->
                    <figure class="figure mt-2">
                        <a href="<?php echo e(route('/') . $post->photo); ?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo e(route('/') . $post->photo); ?>" alt="Image">
                        </a>
                    </figure>
                    <p>
                    </p>

                    <!-- Divider -->
                    <div class="text-center h5 mb-4">. . .</div>






























































































































































































                    <!-- Related post END -->

                    <!-- Divider -->
                    <hr>
                    <!-- Author info START -->
                    <div class="d-flex py-4">
                        <!-- Avatar -->
                        <a href="#">
                            <div class="avatar avatar-xxl me-4">
                                <img class="avatar-img rounded-circle" src="<?php echo e(route('/') . $user->photo); ?>" alt="avatar">
                            </div>
                        </a>
                        <!-- Info -->
                        <div>
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="m-0"><a href="#" class="text-reset">

                                        </a>
                                    </h4>
                                    <small>
                                        <?php if($user->user_type == 'fulladmin'): ?>
                                            <?php echo e(__('posts.fulladmin-aaron')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('posts.admin-aaron')); ?>

                                        <?php endif; ?>
                                    </small>
                                </div>
                                <a href="#" class="btn btn-xs btn-primary-soft">مشاهده اخبار</a>
                            </div>
                            <p class="my-2">مهدی علیزاده سردبیر ارشد این وبلاگ است و همچنین اخبار فوری مستقر در لندن را گزارش می دهد. او از سال 2015 درباره دولت، عدالت کیفری و نقش پول در سیاست نوشته است.</p>
                            <!-- Social icons -->
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 pe-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Author info END -->

                    <!-- Divider -->
                    <hr>

                    <!-- Comments START -->
                    <div>
                        <h3>5 دیدگاه</h3>
                        <!-- Comment level 1-->
                        <div class="my-4 d-flex">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/01.jpg" alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">شادی اسدی</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند و خوشبخت و سرافراز باشند ولی به زودی می‌ فهمند که اشتباه کرده‌ اند و عظمت هر ملتی بر روی خرابه‌ های وطن خودش می‌باشد و بس!</p>
                            </div>
                        </div>
                        <!-- Comment children level 2 -->
                        <div class="my-4 d-flex ps-2 ps-md-3">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/02.jpg" alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">علی قنبرزاده</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد در پرتو آن نیرومند می‌شوند و در سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند و خوشبخت و سرافراز باشند.</p>
                            </div>
                        </div>
                        <!-- Comment children level 3 -->
                        <div class="my-4 d-flex ps-3 ps-md-5">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/01.jpg" alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">مونا شاه حسینی</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>در نهایت این مرگ است که باید پیروز شود، زیرا از هنگام تولد بخشی از سرنوشت ما شده و فقط مدت کوتاهی پیش از بلعیدن طعمه اش، با آن بازی می کند.</p>
                            </div>
                        </div>
                        <!-- Comment level 2 -->
                        <div class="my-4 d-flex ps-2 ps-md-3">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/03.jpg" alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">مهرداد نوری</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>همان‌ طور که تا آنجا که ممکن است طولانی‌ تر در یک حباب صابون می‌ دمیم تا بزرگتر شود!</p>
                            </div>
                        </div>
                        <!-- Comment level 1 -->
                        <div class="my-4 d-flex">
                            <img class="avatar avatar-md rounded-circle float-start me-3" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/04.jpg" alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">رضا کریمی</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>ما تا آنجا که ممکن است، با علاقه فراوان و دلواپسی زیاد به زندگی ادامه می دهیم، همان‌ طور که تا آنجا که ممکن است طولانی‌ تر در یک حباب صابون می‌ دمیم تا بزرگتر شود، گر چه با قطعیتی تمام می‌ دانیم که خواهد ترکید.</p>
                            </div>
                        </div>

                    </div>
                    <!-- Comments END -->
                    <!-- Reply START -->
                    <div>
                        <h3>ثبت دیدگاه</h3>
                        <small>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی علامت گذاری شده اند *</small>
                        <form class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">نام *</label>
                                <input type="text" class="form-control" aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ایمیل *</label>
                                <input type="email" class="form-control">
                            </div>
                            <!-- custom checkbox -->
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">برای دفعه بعد که نظر دادم نام و ایمیل من را در این مرورگر ذخیره شود.</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">متن دیدگاه *</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                    <!-- Reply END -->
                </div>
                <!-- Main Content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-3">
                    <div data-sticky data-margin-top="80" data-sticky-for="991">
                        <h4>اشتراک گذاری</h4>
                        <ul class="nav text-white-force">
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-facebook" href="#">
                                    <i class="fab fa-facebook-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-twitter" href="#">
                                    <i class="fab fa-twitter-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-linkedin" href="#">
                                    <i class="fab fa-linkedin align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-pinterest" href="#">
                                    <i class="fab fa-pinterest align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-primary" href="#">
                                    <i class="far fa-envelope align-middle"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Advertisement -->
                        <div class="mt-4">
                            <a href="#" class="d-block card-img-flash">
                                <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/adv.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Right sidebar END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Main END -->

    <!-- =======================
    Sticky post START -->
    <div class="sticky-post bg-light border p-4 mb-5 text-sm-end rounded d-none d-xxl-block">
        <div class="d-flex align-items-center">
            <!-- image -->
            <div class="col-4 d-none d-md-block">
                <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/05.jpg" alt="Image">
            </div>
            <!-- Title -->
            <div class="ms-3 text-start">
                <span>خبر بعدی<i class="bi bi-arrow-right ms-3 rtl-flip"></i></span>
                <h6 class="m-0"> <a href="javascript:void(0)" class="stretched-link btn-link text-reset">تداوم تنفس هوای ناسالم در تهران</a></h6>
            </div>
        </div>
    </div>
    <!-- =======================
    Sticky post END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="pb-0">
    <div class="container">
        <hr>
        <!-- Widgets START -->
        <div class="row pt-5">
            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-4 mb-4">
                <img class="light-mode-item" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/logo.svg" alt="logo">
                <img class="dark-mode-item" src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/logo-light.svg" alt="logo">
                <p class="mt-3">این قالب مبتنی بر بوت استرپ 5 برای همه انواع سایت های مجله خبری و وبلاگ مناسب است.</p>
                <div class="mt-4">©2022 ارائه شده در سایت <a href="https://www.rtl-theme.com/" class="text-reset btn-link" target="_blank">راست چین</a>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-3 mb-4">
                <h5 class="mb-4">لینک های مفید</h5>
                <div class="row">
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link pt-0" href="#">درباره ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">داشبورد</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">تماس با ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">خرید قالب</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">پشتیبانی</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link pt-0" href="#">اخبار</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">بین الملل <span class="badge text-bg-danger ms-2">2</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#">تکنولوژی</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">اقتصاد</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">سیاست</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-3 mb-4">
                <h5 class="mb-4">پربیننده ترین</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-primary-soft">گردشگری</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-warning-soft">اقتصاد</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-success-soft">بورس</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-danger-soft">قیمت طلا</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-info-soft">فناوری و اطلاعات</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-primary-soft">قیمت ارز امروز</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-warning-soft">مگامنو</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-success-soft">ورزش</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-danger-soft">کووید</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-info-soft">فرهنگ</a></li>
                </ul>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-2 mb-4">
                <h5 class="mb-4">شبکه های اجتماعی</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link pt-0" href="#"><i class="fab fa-facebook-square fa-fw me-2 text-facebook"></i>Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter-square fa-fw me-2 text-twitter"></i>Twitter</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-linkedin fa-fw me-2 text-linkedin"></i>Linkedin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube-square fa-fw me-2 text-youtube"></i>YouTube</a></li>
                </ul>
            </div>
        </div>
        <!-- Widgets END -->
    </div>
</footer>
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
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/sticky-js/sticky.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/js/glightbox.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/post.blade.php ENDPATH**/ ?>
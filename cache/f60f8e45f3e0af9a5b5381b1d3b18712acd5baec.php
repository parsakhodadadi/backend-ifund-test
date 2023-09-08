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
    <link rel="shortcut icon" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">

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
<?php echo e($view->make('')); ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
                        <h2>ورود به حساب کاربری</h2>
                        <!-- Form START -->
                        <form class="mt-4">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ایمیل">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1">رمز عبور</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*********">
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار</label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">ورود </button>
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span>آیا هنوز ثبت نام نکرده اید؟ <a href="signup.html"><u>ثبت نام</u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->
                        <hr>
                        <!-- Social-media btn -->
                        <div class="text-center">
                            <p>برای دسترسی سریع با شبکه اجتماعی خود وارد شوید</p>
                            <ul class="list-unstyled d-sm-flex mt-3 justify-content-center">
                                <li class="mx-2">
                                    <a href="#" class="btn bg-facebook d-inline-block"><i class="fab fa-facebook-f me-2"></i> ورود Facebook</a>
                                </li>
                                <li class="mx-2">
                                    <a href="#" class="btn bg-google d-inline-block"><i class="fab fa-google me-2"></i> ورود با google</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

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

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets')); ?>/js/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/sign-in/user-password-login.blade.php ENDPATH**/ ?>
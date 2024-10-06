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
<?php echo e($view->make('frontend/main/layout/header')); ?>

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
                        <h2><?php echo e($lang['sign-in-to-panel']); ?></h2>
                        <!-- Form START -->
                        <form class="mt-4" action="<?php echo e(route('/sign-in')); ?>" method="post">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1"><?php echo e($lang['email']); ?></label>
                                <input type="hidden" name="csrf_token" value="<?php echo e($security->csrfToken()); ?>">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo e($lang['mail']); ?>">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1"><?php echo e($lang['password']); ?></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="*********">
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success"><?php echo e($lang['sign-in']); ?></button>
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span><?php echo e($lang['not-register-yet']); ?><a href="<?php echo e(route('/sign-up')); ?>"><u><?php echo e($lang['sign-up']); ?></u></a></span>
                                </div>
                            </div>
                        </form>
                        <?php if(!empty($errorMessage)): ?>
                            <div class="form-control bg-danger"><?php echo e($errorMessage); ?></div>
                        <?php endif; ?>
                        <!-- Form END -->
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
<?php echo e($view->make('frontend/main/layout/footer')); ?>

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

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/Views/frontend/sign-in/user-password-sign-in.blade.php ENDPATH**/ ?>
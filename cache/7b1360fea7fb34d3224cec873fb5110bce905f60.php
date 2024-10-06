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
    <link rel="shortcut icon" href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>assets/images/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="<?php echo e(route('/Others/Themes/Frontend/Theme/')); ?>assets/css/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('frontend/main/layout/preloader')); ?>



<!-- =======================
Header START -->
<?php echo e($view->make('frontend/main/layout/header')); ?>

<!-- =======================
Header END -->


<main>

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                        <h2><?php echo e($lang['sign-up-website']); ?></h2>
                        <!-- Form START -->
                        <form class="mt-4" action="<?php echo e(route('/sign-up')); ?>" method="post">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1"><?php echo e($lang['email']); ?></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                       value="<?php if(!empty($data['email'])): ?> <?php echo e($data['email']); ?> <?php endif; ?>"
                                       placeholder="<?php echo e($lang['mail']); ?>">
                                <?php if(!empty($errors['email'])): ?>
                                    <?php if(!empty($errors['email']['required'])): ?>
                                        <div class="form-control bg-danger"><?php echo ($errors['email']['required']); ?></div>
                                    <?php else: ?>
                                        <?php if(!empty($errors['email']['email'])): ?>
                                            <div class="form-control bg-danger"><?php echo ($errors['email']['email']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <small id="emailHelp" class="form-text"><?php echo e($lang['never-share-mail']); ?></small>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1"><?php echo e($lang['password']); ?></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                       value="<?php if(!empty($data['password'])): ?> <?php echo e($data['password']); ?> <?php endif; ?>"
                                       placeholder="*********">
                                <?php if(!empty($errors['password'])): ?>
                                    <?php if(!empty($errors['password']['required'])): ?>
                                        <div class="form-control bg-danger"><?php echo ($errors['password']['required']); ?></div>
                                    <?php else: ?>
                                        <?php if(!empty($errors['password']['password'])): ?>
                                            <div class="form-control bg-danger"><?php echo ($errors['password']['password']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2"><?php echo e($lang['confirm-password']); ?></label>
                                <input type="password" name="confirm-password" class="form-control" id="exampleInputPassword2"
                                       value="<?php if(!empty($data['confirm-password'])): ?> <?php echo e($data['confirm-password']); ?> <?php endif; ?>"
                                       placeholder="*********">
                                <?php if(!empty($errors['confirm-password'])): ?>
                                    <?php if(!empty($errors['confirm-password']['required'])): ?>
                                        <div class="form-control bg-danger"><?php echo ($errors['confirm-password']['required']); ?></div>
                                    <?php else: ?>
                                        <?php if(!empty($errors['confirm-password']['password'])): ?>
                                            <div class="form-control bg-danger"><?php echo ($errors['confirm-password']['password']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="news_membership" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"><?php echo e($lang['register-for-news']); ?></label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary" value="<?php echo e($lang['sign-up']); ?>">
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span><?php echo e($lang['not-register-yet']); ?><a href="<?php echo e(route('/sign-in')); ?>"><u><?php echo e($lang['sign-in']); ?></u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->
                        <?php if(!empty($successMessage)): ?>
                            <div class="form-control bg-success"><?php echo e($successMessage); ?></div>
                        <?php endif; ?>
                        <?php if(!empty($errorMessage)): ?>
                            <div class="form-control bg-danger"><?php echo e($errorMessage); ?></div>
                        <?php endif; ?>
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
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/views/frontend/sign-up/sign-up-form.blade.php ENDPATH**/ ?>
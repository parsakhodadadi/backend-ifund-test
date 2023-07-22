<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/css/app.css" rel="stylesheet">
    <link href="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/css/icons.css" rel="stylesheet">
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-5 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-start">
                                        <img src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/images/logo-img.png" width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold"><?php echo e($lang['set-new-pass']); ?></h4>
                                    <form action="<?php echo e(route('/admin/changePassword')); ?>" method="post">
                                        <div class="mb-3 mt-5">
                                            <label class="form-label"><?php echo e($lang['curr-password']); ?></label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="<?php echo e($lang['enter-curr-pass']); ?>" />
                                            <?php if(!empty($errors['password'])): ?>
                                                <?php if(!empty($errors['password']['required'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['password']['required']); ?></div>
                                                <?php endif; ?>
                                                <?php if(!empty($errors['password']['password'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['password']['password']); ?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['new-password']); ?></label>
                                            <input type="password" name="new-pass" class="form-control"
                                                   placeholder="<?php echo e($lang['enter-new-pass']); ?>" />
                                            <?php if(!empty($errors['new-pass'])): ?>
                                                <?php if(!empty($errors['new-pass']['required'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['new-pass']['required']); ?></div>
                                                <?php endif; ?>
                                                <?php if(!empty($errors['new-pass']['password'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['new-pass']['password']); ?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['rep-new-pass']); ?></label>
                                            <input type="password" name="rep-new-pass" class="form-control"
                                                   placeholder="<?php echo e($lang['rep-new-pass']); ?>" />
                                            <?php if(!empty($errors['rep-new-pass'])): ?>
                                                <?php if(!empty($errors['rep-new-pass']['required'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['rep-new-pass']['required']); ?></div>
                                                <?php endif; ?>
                                                <?php if(!empty($errors['rep-new-pass']['password'])): ?>
                                                    <div class="alert-danger"><?php echo e($errors['rep-new-pass']['password']); ?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-primary" value="<?php echo e($lang['change-pass']); ?>" />
                                        </div>
                                        <?php if(!empty($successMessage)): ?>
                                            <div class="form-control alert-success"><?php echo e($successMessage); ?></div>
                                        <?php endif; ?>
                                        <?php if(!empty($errorMessage)): ?>
                                            <div class="form-control alert-danger"><?php echo e($errorMessage); ?></div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/images/login-images/forgot-password-frent-img.jpg"
                                 class="card-img login-img h-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/users/change-password.blade.php ENDPATH**/ ?>
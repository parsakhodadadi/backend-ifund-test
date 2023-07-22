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
    <title>ویرایش دسترسی</title>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row-cols-xxl-auto">
            <div class="col-xxl-auto col-xxl-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-12 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-start">
                                        <img src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/images/logo-img.png" width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold"><?php echo e($lang['edit-access']); ?></h4>
                                    <form action="<?php echo e(route('/admin/user/list/editAccess/') . $user->id); ?>" method="post">
                                        <div class="mb-6 mt-5">
                                            <label class="user-type"><?php echo e($lang['user_type']); ?></label>
                                            <select name="user_type" id="user-type" class="form-select">
                                                <?php if($user->user_type == "user"): ?>
                                                    <option value="user" selected="selected"><?php echo e($lang['user']); ?></option>
                                                    <option value="admin"><?php echo e($lang['admin']); ?></option>
                                                <?php else: ?>
                                                    <option value="admin" selected="selected"><?php echo e($lang['admin']); ?></option>
                                                    <option value="user"><?php echo e($lang['user']); ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="mb-6 mt-5">
                                            <label class="form-label"><?php echo e($lang['block-status']); ?></label>
                                            <select name="blocked" id="user-type" class="form-select">
                                                <?php if($user->blocked == "yes"): ?>
                                                    <option value="yes" selected="selected"><?php echo e($lang['blocked']); ?></option>
                                                    <option value="no">--</option>
                                                <?php else: ?>
                                                    <option value="no" selected="selected">--</option>
                                                    <option value="yes"><?php echo e($lang['blocked']); ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-primary" value='<?php echo e($lang['apply']); ?>' />
                                        </div>
                                        <?php if(!empty($successMessage)): ?>
                                            <div class="alert-success"><?php echo e($successMessage); ?></div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/users/edit-access.blade.php ENDPATH**/ ?>
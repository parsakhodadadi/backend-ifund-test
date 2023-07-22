<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col">
                <h6 class="mb-0 text-uppercase"><?php echo e($lang['edit-profile']); ?></h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form action="<?php echo e(route('/admin/editProfile')); ?>" method="post" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label"><?php echo e($lang['first_name']); ?></label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                           value="<?php echo e($user->first_name); ?>" name="first_name" placeholder="<?php echo e($lang['enter-first-name']); ?>" required>

                                    <?php if(!empty($errors['first_name'])): ?>
                                        <?php if(!empty($errors['first_name']['required'])): ?>
                                            <div class="form-control alert-danger"><?php echo e($errors['first_name']['required']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label"><?php echo e($lang['last_name']); ?></label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                           value="<?php echo e($user->last_name); ?>" name="last_name" placeholder="<?php echo e($lang['enter-last-name']); ?>" required>
                                    <?php if(!empty($errors['last_name'])): ?>
                                        <?php if(!empty($errors['last_name']['required'])): ?>
                                            <div class="form-control alert-danger"><?php echo e($errors['last_name']['required']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label"><?php echo e($lang['email']); ?></label>
                                    <input type="email" class="form-control" id="validationCustomUsername"
                                               aria-describedby="inputGroupPrepend" name="email" value="<?php echo e($user->email); ?>" placeholder="example@user.com" required>

                                    <?php if(!empty($errors['email'])): ?>
                                        <?php if(!empty($errors['email']['required'])): ?>
                                            <div class="form-control alert-danger"><?php echo e($errors['email']['required']); ?></div>
                                        <?php else: ?>
                                            <div class="form-control alert-danger"><?php echo e($errors['email']['email']); ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" value="<?php echo e($lang['edit-data']); ?>" />
                                </div>
                                <?php if(!empty($successMessage)): ?>
                                    <div class="form-control alert-success"><?php echo e($successMessage); ?></div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end row-->
</div>
<!--end page wrapper -->
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/users/edit-profile.blade.php ENDPATH**/ ?>
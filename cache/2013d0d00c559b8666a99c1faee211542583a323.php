<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?php echo e($lang['aaron-magazine']); ?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['change-password']); ?></li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">تنظیمات</button>
                    <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"><span class="visually-hidden">فهرست کشویی</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a
                                class="dropdown-item" href="javascript:;">عمل</a>
                        <a class="dropdown-item" href="javascript:;">عمل دیگر</a>
                        <a class="dropdown-item" href="javascript:;">هر چیز دیگر اینجا</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">لینک
                            جدا کننده</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <br>
                                <form action="<?php echo e(route('/panel/change-password')); ?>" method="post">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e($lang['current-password']); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input name="password" type="password" class="form-control" placeholder="<?php echo e($lang['enter-curr-pass']); ?>" />
                                            <?php if(!empty($errors['password'])): ?>
                                                <?php if(!empty($errors['password']['required'])): ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['password']['required']); ?>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['password']['password']); ?>

                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e($lang['new-password']); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input name="new-pass" type="password" class="form-control" placeholder="<?php echo e($lang['enter-new-pass']); ?>" />
                                            <?php if(!empty($errors['new-pass'])): ?>
                                                <?php if(!empty($errors['new-pass']['required'])): ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['new-pass']['required']); ?>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['new-pass']['password']); ?>

                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e($lang['repeat-new-password']); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input name="rep-new-pass" type="password" class="form-control" placeholder="<?php echo e($lang['enter-new-pass-repeat']); ?>" />
                                            <?php if(!empty($errors['rep-new-pass'])): ?>
                                                <?php if(!empty($errors['rep-new-pass']['required'])): ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['rep-new-pass']['required']); ?>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-control alert-danger">
                                                        <?php echo e($errors['rep-new-pass']['password']); ?>

                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4"
                                                   value="<?php echo e($lang['submit']); ?>"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php if(!empty($successMessage)): ?>
                                <div class="form-control alert-success">
                                    <?php echo e($successMessage); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(!empty($errorMessage)): ?>
                                <div class="form-control alert-danger">
                                    <?php echo e($errorMessage); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="<?php echo e(route('')); ?>/Others/Themes/Backend/main/vertical/assets/js/app.js"></script><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/users/change-password.blade.php ENDPATH**/ ?>
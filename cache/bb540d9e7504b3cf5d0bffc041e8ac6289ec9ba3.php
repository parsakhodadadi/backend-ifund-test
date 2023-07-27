<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<span>
						<h4>
                            <?php if($type == 'add_category'): ?>
                                <?php echo e($lang['create-category']); ?>

                            <?php elseif($type == 'edit_category'): ?>
                                <?php echo e($lang['edit-category']); ?>

                            <?php elseif($type == 'add_sub_category'): ?>
                                <?php echo e($lang['add-sub-category']); ?>

                            <?php elseif($type == 'edit_sub_category'): ?>
                                <?php echo e($lang['edit-sub-category']); ?>

                            <?php endif; ?>
						</h4>
					</span>
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
                    <form action="<?php echo route('') . $action; ?>" method="post">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e($lang['title']); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="<?php echo e($lang['title']); ?>" value="<?php if(!empty($data)): ?><?php echo e($data->title); ?><?php endif; ?>"/>
                                            <?php if(!empty($errors['title'])): ?>
                                                <div class="form-control alert-danger"><?php echo ($errors['title']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"><?php echo e($lang['description']); ?></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control" name="description"
                                                   placeholder="<?php echo e($lang['description']); ?>" value="<?php if(!empty($data)): ?><?php echo e($data->description); ?><?php endif; ?>"/>
                                            <?php if(!empty($errors['description'])): ?>
                                                <div class="form-control alert-danger"><?php echo ($errors['description']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4"
                                                   value="<?php echo e($lang['send']); ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <?php if(!empty($errorMessage)): ?>
                                        <div class="form-control alert-danger"><?php echo $errorMessage; ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($successMessage)): ?>
                                        <div class="form-control alert-success"><?php echo $successMessage; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->


<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/category/create.blade.php ENDPATH**/ ?>
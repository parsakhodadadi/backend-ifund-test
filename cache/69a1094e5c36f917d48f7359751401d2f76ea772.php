<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<span>
						<h4>
                            <?php if($method == 'create'): ?>
                                <?php echo e($lang['create-category']); ?>

                            <?php elseif($method == 'update'): ?>
                                <?php echo e($lang['edit-category']); ?>

                            <?php elseif($method == 'create_sub'): ?>
                                <?php echo e($lang['create-subject']); ?>

                            <?php elseif($method == 'edit_sub'): ?>
                                <?php echo e($lang['edit-subject']); ?>

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
                                                   placeholder="<?php echo e($lang['title']); ?>"
                                                   value="<?php if(!empty($category)): ?><?php echo e($category->title); ?><?php endif; ?>"/>
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
                                                   placeholder="<?php echo e($lang['description']); ?>"
                                                   value="<?php if(!empty($category)): ?><?php echo e($category->description); ?><?php endif; ?>"/>
                                            <?php if(!empty($errors['description'])): ?>
                                                <div class="form-control alert-danger"><?php echo ($errors['description']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if($method == 'update'): ?>
                                        <?php if($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/categories-management/edit/' . $category->id && $user->user_type == 'fulladmin'): ?>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0"><?php echo e($lang['status']); ?></h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select" name="status">
                                                        <?php if($category->status == 'approved'): ?>
                                                            <option value="approved"
                                                                    selected><?php echo e($lang['approved']); ?></option>
                                                            <option value="disapproved"><?php echo e($lang['disapproved']); ?></option>
                                                        <?php else: ?>
                                                            <option value="disapproved"
                                                                    selected><?php echo e($lang['disapproved']); ?></option>
                                                            <option value="approved"><?php echo e($lang['approved']); ?></option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <?php if(!empty($errors['status'])): ?>
                                                        <div class="form-control alert-danger"><?php echo ($errors['status']['required']); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4"
                                               value="<?php echo e($lang['send']); ?>"/>
                                    </div>
                                </div>
                                <?php if(!empty($errorMessage)): ?>
                                    <div class="form-control alert-danger"><?php echo $errorMessage; ?></div>
                                <?php endif; ?>
                                <?php if(!empty($successMessage)): ?>
                                    <div class="form-control alert-success"><?php echo $successMessage; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->


<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/post-categories/create.blade.php ENDPATH**/ ?>
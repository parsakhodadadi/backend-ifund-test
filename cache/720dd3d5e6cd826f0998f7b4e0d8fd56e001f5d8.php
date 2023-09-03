<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?php echo e($lang['aaron-website']); ?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if($status == 'disapproved'): ?>
                                <?php echo e($lang['new-author']); ?>

                            <?php else: ?>
                                <?php echo e($lang['authors-list']); ?>

                            <?php endif; ?>
                        </li>
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
        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($author->status == $status): ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="mb-0"><?php echo e($author->name); ?></h5>
                </div>
                <hr/>
                <?php if(!empty($author->photo)): ?>
                <div class="card-body">
                    <img src="<?php echo e(route('/') . $author->photo); ?>"  width="100%" alt="">
                </div>
                <?php endif; ?>
                <div class="card-body">
                    <?php echo e($author->about); ?>

                </div>
            </div>
            <div class="card-body">
                <?php if(!empty($user_id)): ?>
                    <?php if($author->user_id == $user_id): ?>
                        <a href="<?php echo e(route('/admin/authors/edit-author/') . $author->id); ?>" class="form-control"><?php echo e($lang['edit']); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if($author->status == 'disapproved'): ?>
            <table>
                <tr>
                    <td><a class="form-control" href="<?php echo e(route('/panel/authors-management/approve/') .  $author->id); ?>"><?php echo e($lang['approve']); ?></a></td>
                    <td><a class="form-control" href="<?php echo e(route('/panel/authors-management/delete/') .  $author->id); ?>"><?php echo e($lang['delete']); ?></a></td>
                </tr>
            </table>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!--end page wrapper -->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i
        class='bx bxs-up-arrow-alt'></i></a>
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/authors/management.blade.php ENDPATH**/ ?>
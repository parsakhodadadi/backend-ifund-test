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
                            <?php echo e($lang['books-management']); ?>

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
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="mb-0"><?php echo e($book->name); ?></h5>
                        </div>
                        <hr/>
                            <div class="card-body">
                                <img src="<?php echo e(route('/') . $book->photo); ?>"  width="100%" alt="">
                            </div>
                        <div class="card-body">
                            <?php echo e($book->description); ?>

                        </div>
                        <div class="card-footer">
                            <?php echo e($lang['by']); ?>

                            <?php echo e(current($users->get(['id' => $book->user_id]))->first_name); ?>

                            <?php echo e(current($users->get(['id' => $book->user_id]))->last_name); ?>

                            <br>
                            <?php if(current($users->get(['id' => $book->user_id]))->user_type == 'user'): ?>
                                <?php echo e($lang['user']); ?>

                            <?php elseif(current($users->get(['id' => $book->user_id]))->user_type == 'admin'): ?>
                                <?php echo e($lang['admin']); ?>

                            <?php else: ?>
                                <?php echo e($lang['fulladmin']); ?>

                            <?php endif; ?>
                            <br>
                            <?php echo e($lang['email'] . ' : ' . current($users->get(['id' => $book->user_id]))->email); ?>

                            <br>
                            <?php if($book->edited == 'no'): ?>
                                <?php echo e($lang['written-at']); ?>

                            <?php else: ?>
                                <?php echo e($lang['last-edited-at']); ?>

                            <?php endif; ?>
                            <?php echo e($book->date . ' ' . $book->time); ?>

                        </div>
                        <br>
                        <table>
                            <tr>
                                <?php if($book->status == 'disapproved'): ?>
                                    <td><a class="btn btn-success" href="<?php echo e(route('/panel/books-management/approve/') .  $book->id); ?>"><?php echo e($lang['approve']); ?></a></td>
                                <?php endif; ?>
                                <td><a class="btn btn-danger" href="<?php echo e(route('/panel/books-management/delete/') .  $book->id); ?>"><?php echo e($lang['delete']); ?></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!--end page wrapper -->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/books/management.blade.php ENDPATH**/ ?>
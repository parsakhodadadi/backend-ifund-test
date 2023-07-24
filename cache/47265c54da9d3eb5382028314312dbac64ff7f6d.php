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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['info']); ?></li>
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
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($post->status == $status): ?>
                <div class="card">
                    <div class="card-body">
                        <?php if(!empty($user_id)): ?>
                            <?php if($post->user_id == $user_id): ?>
                                <a href="<?php echo e(route('/admin/posts/edit/') . $post->id); ?>" class="form-control"><?php echo e($lang['edit']); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="card-title">
                            <h5 class="mb-0"><?php echo e($post->title); ?></h5>
                        </div>
                        <hr/>
                        <?php if(!empty($post->photo)): ?>
                            <div class="card-body">
                                <img src="<?php echo e(route('/') . $post->photo); ?>"  width="100%" alt="">
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php echo e($post->description); ?>

                        </div>
                        <div class="card-footer">
                            <?php echo e($lang['by']); ?>

                            <?php echo e(current($users->get(['id' => $post->user_id]))->first_name); ?>

                            <?php echo e(current($users->get(['id' => $post->user_id]))->last_name); ?>

                            <br>
                            <?php if($post->status == "disapproved"): ?>
                                <?php echo e($lang['email'] . ' : ' . current($users->get(['id' => $post->user_id]))->email); ?>

                            <?php endif; ?>
                            <br>
                            <?php if(current($users->get(['id' => $post->user_id]))->user_type == 'user'): ?>
                                <?php echo e($lang['user']); ?>

                            <?php elseif(current($users->get(['id' => $post->user_id]))->user_type == 'admin'): ?>
                                <?php echo e($lang['admin']); ?>

                            <?php else: ?>
                                <?php echo e($lang['fulladmin']); ?>

                            <?php endif; ?>
                            <br>
                            <?php if($post->edited == 'yes'): ?>
                                <?php echo e($lang['written-at']); ?>

                            <?php else: ?>
                                <?php echo e($lang['last-edited-at']); ?>

                            <?php endif; ?>
                            <?php echo e($post->date . ' ' . $post->time); ?>

                        </div>
                    </div>
                    <?php if($post->status == 'disapproved'): ?>
                        <table>
                            <tr>
                                <td><a class="form-control" href="<?php echo e(route('/admin/posts/editPostsStatus/approve/') .  $post->id); ?>"><?php echo e($lang['approve']); ?></a></td>
                                <td><a class="form-control" href="<?php echo e(route('/admin/posts/editPostsStatus/delete/') .  $post->id); ?>"><?php echo e($lang['delete']); ?></a></td>
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
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/posts/posts-list.blade.php ENDPATH**/ ?>
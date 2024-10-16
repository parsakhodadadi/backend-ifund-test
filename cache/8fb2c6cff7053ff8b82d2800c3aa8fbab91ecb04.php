<div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <h4 class="page-title"><?php echo e($lang['users']); ?></h4>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['users']); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="box"> -->
                                <!-- <div class="box-body"> -->
                                    <!-- <div>
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item b-1">
                                                <a class="nav-link active text-center" href="#">51 <br>فعال</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">41 <br>در انتظار </a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">0 <br>تائید شده</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">10 <br>عضو شده</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">0 <br>استخدام شده</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled text-center" href="#" tabindex="-1" aria-disabled="true">0 <br>تائید نشده</a>
                                            </li>
                                        </ul>
                                    </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <div class="box">
                                <div class="box-body px-0">
                                    <div class="table-responsive">
                                        <table id="example2" class="table mb-0 w-p100">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="ch_bx_1" class="filled-in">
                                                        <label for="ch_bx_1" class="mb-0"></label>
                                                    </th>
                                                    <th><?php echo e($lang['name']); ?></th>
                                                    <th><?php echo e($lang['status']); ?></th>
                                                    <th><?php echo e($lang['user-type']); ?></th>
                                                    <th><?php echo e($lang['email']); ?></th>
                                                    <th><?php echo e($lang['phone']); ?></th>
                                                    <th><?php echo e($lang['experience']); ?></th>
                                                    <th><?php echo e($lang['skills']); ?></th>
                                                    <th><i class="fa fa-lock me-5"></i><?php echo e($lang['operations']); ?></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="ch_bx_2" class="filled-in">
                                                            <label for="ch_bx_2" class="mb-0"></label>
                                                        </td>
                                                        <td><?php echo e($user->name); ?></td>
                                                        <td>
                                                            <?php if($user->status == 'active'): ?>
                                                                <span class="badge badge-success-light">
                                                                    <?php echo e($lang['active']); ?>

                                                                </span>
                                                            <?php else: ?> 
                                                                <span class="badge badge-danger-light">
                                                                    <?php echo e($lang['blocked']); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($user->user_type == 'admin'): ?>
                                                               ادمین
                                                            <?php elseif($user->user_type == 'instructor'): ?>
                                                               مدرس
                                                            <?php else: ?>
                                                               کابر عادی   
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($user->email); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($user->phone); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($user->experience); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($user->skills); ?>

                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <?php if($user->user_type != 'admin'): ?>
                                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="<?php echo e(route('/panel/users-management/promote-to-instructor/') . $user->id); ?>">
                                                                            <?php if($user->user_type == 'instructor'): ?>
                                                                            <?php echo e($lang['chnage-to-normal-user']); ?>

                                                                            <?php else: ?>
                                                                            <?php echo e($lang['promote-to-instructor']); ?>

                                                                            <?php endif; ?>
                                                                        </a>
                                                                        <a class="dropdown-item" href="<?php echo e(route('/panel/users-management/block/') . $user->id); ?>">
                                                                            <?php if($user->status == 'active'): ?>
                                                                                <?php echo e($lang['block']); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e($lang['unblock']); ?>

                                                                            <?php endif; ?>
                                                                        </a>
                                                                        <a class="dropdown-item" href="<?php echo e(route('/panel/users-management/delete/') . $user->id); ?>"><?php echo e($lang['delete']); ?></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->

            </div>
        </div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/Views/backend/main/layout/users-management.blade.php ENDPATH**/ ?>
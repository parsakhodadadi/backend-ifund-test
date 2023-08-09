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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['categories-list']); ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">تنظیمات</button>
                        <button type="button"
                                class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"> <span class="visually-hidden">فهرست کشویی</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a
                                    class="dropdown-item" href="javascript:;">عمل</a>
                            <a class="dropdown-item" href="javascript:;">عمل دیگر</a>
                            <a class="dropdown-item" href="javascript:;">هر چیز دیگر اینجا</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">لینک
                                جدا کننده</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><?php echo e($lang['row']); ?></th>
                                <th><?php echo e($lang['title']); ?></th>
                                <th><?php echo e($lang['description']); ?></th>
                                <th><?php echo e($lang['status']); ?></th>
                                <th><?php echo e($lang['settings']); ?></th>
                                <th><?php echo e($lang['add-sub-category']); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php ($row = 0); ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php ($row++); ?>
                                    <td><?php echo e($row); ?></td>
                                    <td><?php echo e($category->title); ?></td>
                                    <td><?php echo e($category->description); ?></td>
                                    <?php if($category->status == 'approved'): ?>
                                        <td>
                                            <h6 style="color: green"><?php echo e($lang['approved']); ?></h6>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <h6 style="color: red"><?php echo e($lang['disapproved']); ?></h6>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('/panel/management/categories/edit/') . $category->id); ?>"><?php echo e($lang['edit']); ?></a>
                                        <a href="<?php echo e(route('/panel/management/categories/delete/') . $category->id); ?>"><?php echo e($lang['delete']); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('/panel/admin/categories/create/') . $category->id); ?>"><?php echo e($lang['add']); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th><?php echo e($lang['row']); ?></th>
                                <th><?php echo e($lang['title']); ?></th>
                                <th><?php echo e($lang['description']); ?></th>
                                <th><?php echo e($lang['status']); ?></th>
                                <th><?php echo e($lang['settings']); ?></th>
                                <th><?php echo e($lang['add-sub-category']); ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <!--end row-->
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
<!--end wrapper-->
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="assets/js/app.js"></script>
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/categories/list.blade.php ENDPATH**/ ?>
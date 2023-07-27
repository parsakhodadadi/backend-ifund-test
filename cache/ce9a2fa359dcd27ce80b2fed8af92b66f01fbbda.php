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
                <div class="col">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item active" aria-current="true">
                                    <table>
                                        <tr>
                                            <td width="33%" align="center">عنوان</td>
                                            <td>|</td>
                                            <td width="33%" align="center">توضیحات</td>
                                            <td>|</td>
                                            <td width="33%" align="center">تنظیمات</td>
                                        </tr>
                                    </table>
                                </li>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <div>
                                            <table>
                                                <tr>
                                                    <td width="33%" align="center"><?php echo e($category->title); ?></td>
                                                    <td>|</td>
                                                    <td width="33%" align="center"><?php echo e($category->description); ?></td>
                                                    <td>|</td>
                                                    <td width="33%" align="center">
                                                        <a target="_self" href="<?php echo e(route("/admin/category/list/edit/") . $category->id); ?>">ویرایش</a>
                                                        <a target="_self" href="<?php echo e(route("/admin/category/list/delete/") . $category->id); ?>">حذف</a>
                                                        <a target="_self" href="<?php echo e(route("/admin/category/list/add-sub/") . $category->id); ?>">ایجادزیردسته بندی</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
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
<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/category/list.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <title>ساین ادمین - قالب مدیریتی بوت استرپ 5</title>
</head>

<body class="rtl">
<!--wrapper-->

    <!--start header wrapper-->
    <div class="header-wrapper">
























































































































































































































































































































































































































































        <!--end header -->
        <!--navigation-->

























































































































































































































        <!--end navigation-->
    </div>
    <!--end header wrapper-->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->




























            <!--end breadcrumb-->























































































            </div>
            <!--end row-->
















                <div class="col">
                    <h6 class="mb-0 text-uppercase">دسته بندی ها</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item active" aria-current="true">
                                    <table>
                                        <tr>
                                            <td width="25%" align="center">عنوان</td>
                                            <td>|</td>
                                            <td width="25%" align="center">توضیحات</td>
                                            <td>|</td>
                                            <td width="25%" align="center">برچسب ها</td>
                                            <td>|</td>
                                            <td width="25%" align="center">تنظیمات</td>
                                        </tr>
                                    </table>
                                </li>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <div>
                                            <table>
                                                <tr>
                                                    <td width="25%" align="center"><?php echo e($category->title); ?></td>
                                                    <td>|</td>
                                                    <td width="25%" align="center"><?php echo e($category->description); ?></td>
                                                    <td>|</td>
                                                    <td width="25%" align="center"><?php echo e($category->tags); ?></td>
                                                    <td>|</td>
                                                    <td width="25%" align="center">
                                                        <a target="_self" href="<?php echo e(route("/admin/category/list/edit/") . $category->id); ?>">ویرایش</a>
                                                        <a target="_self" href="<?php echo e(route("/admin/category/list/delete/") . $category->id); ?>">حذف</a>
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
    <footer class="page-footer">
        <p class="mb-0">کپی رایت © 2021. تمامی حقوق محفوظ است.</p>
    </footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">سفارشی ساز قالب</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr />
        <h6 class="mb-0">استایل های قالب</h6>
        <hr />
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">روشن</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">تاریک</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">نیمه تاریک</label>
            </div>
        </div>
        <hr />
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">تِم مینیمال</label>
        </div>
        <hr />
        <h6 class="mb-0">رنگ هدر</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/category/list.blade.php ENDPATH**/ ?>
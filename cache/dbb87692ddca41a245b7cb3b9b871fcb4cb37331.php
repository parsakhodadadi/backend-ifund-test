<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Blogzine">
    <meta name="description" content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/quill/css/quill.snow.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('backend/main/layout/preloader')); ?>

<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo $header; ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Reviews START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3"><?php echo e($lang['comments-list']); ?> <span
                                    class="badge bg-primary bg-opacity-10 text-primary"><?php echo e(count($comments)); ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <!-- Blog list table START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Card body START -->
                        <div class="card-body py-3">
                            <!-- Blog list table START -->
                            <div class="table-responsive border-0">
                                <table class="table p-4 mb-0 table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start"><?php echo e($lang['post-title']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['commentor']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['rank']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['status']); ?></th>
                                        <th scope="col" class="border-0 rounded-end"><?php echo e($lang['action']); ?></th>
                                    </tr>
                                    </thead>
                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mb-0"><a
                                                            href="#"><?php echo e(current($posts->get(['id' => $comment->post_id]))->title); ?></a>
                                                </h6>
                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <?php echo e(current($users->get(['id' => $comment->user_id]))->first_name . ' ' . current($users->get(['id' => $comment->user_id]))->last_name); ?>

                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <ul class="list-inline mb-2">
                                                    <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                </ul>
                                                <p class="small course-title"><?php echo e($comment->text); ?><a href="#"
                                                                                                     data-bs-toggle="modal"
                                                                                                     data-bs-target="#viewReview"><?php echo e($lang['watch-more']); ?></a>
                                                </p>
                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <?php if($comment->status == 'approved'): ?>
                                                    <span class="badge bg-success bg-opacity-10 text-success mb-2"><?php echo e($lang['approved']); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger bg-opacity-10 text-danger mb-2"><?php echo e($lang['disapproved']); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <div class="dropdown">
                                                    <?php if($currentUser->user_type == 'fulladmin'): ?>
                                                        <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                           id="dropdownReview" data-bs-toggle="dropdown"
                                                           aria-expanded="false">
                                                            <i class="bi bi-three-dots fa-fw"></i>
                                                        </a>
                                                        <!-- dropdown button -->
                                                        <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                            aria-labelledby="dropdownReview">
                                                            <?php if($comment->status == 'disapproved'): ?>
                                                                <li><a class="dropdown-item" href="<?php echo e(route('/panel/posts-comments-management/approve/') . $comment->id); ?>"><i
                                                                                class="bi bi-pencil-square fa-fw me-2"></i>
                                                                        <?php echo e($lang['approve']); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <li><a class="dropdown-item" href="<?php echo e(route('/panel/posts-comments-management/delete/') . $comment->id); ?>"><i
                                                                            class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?></a></li>
                                                        </ul>
                                                    <?php else: ?>
                                                        <?php if(current($users->get(['id' => $comment->user_id]))->user_type != 'admin' && current($users->get(['id' => $comment->user_id]))->user_type != 'admin'): ?>
                                                            <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                               id="dropdownReview" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                                <i class="bi bi-three-dots fa-fw"></i>
                                                            </a>
                                                            <!-- dropdown button -->
                                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                                aria-labelledby="dropdownReview">
                                                                <?php if($comment->status == 'disapproved'): ?>
                                                                    <li><a class="dropdown-item" href="<?php echo e(route('/panel/post-comments-management/approve/') . $comment->id); ?>"><i
                                                                                    class="bi bi-pencil-square fa-fw me-2"></i>
                                                                            <?php echo e($lang['approve']); ?>

                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <li><a class="dropdown-item" href="<?php echo e(route('/panel/post-comments-management/delete/') . $comment->id); ?>"><i
                                                                                class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?></a></li>
                                                            </ul>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Blog list table END -->

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                                <!-- Content -->
                                <p class="mb-sm-0 text-center text-sm-start">نمایش 1 تا 8 از 20</p>
                                <!-- Pagination -->
                                <nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-bordered mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#">..</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">بعد</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Blog list table END -->
                </div>
                <div class="col-lg-6">
                    <!-- Top rated post START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Card header START -->
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="mb-2 mb-sm-0">اخبار محبوب</h4>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body py-3">

                            <!-- Blog list table START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">عنوان خبر</th>
                                        <th scope="col" class="border-0">امتیاز</th>
                                        <th scope="col" class="border-0 rounded-end">فعالیت</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mb-0"><a href="#">رازهای کوچک کثیف در مورد صنعت
                                                    تجارت </a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview6" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview6">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mb-0"><a href="#">دلایل انتخاب استارت آپ</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview7" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview7">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mb-0"><a href="#">حضور ایرانسل در رویداد فناورانه
                                                    خودروهای آینده</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview8" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview8">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mb-0"><a href="#">هشدار درباره یک بیماری حاد تنفسی
                                                    در سرما</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                            </ul>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview9" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview9">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mb-0"><a href="#">آمار فرزندان حاصل از روش‌های کمک‌
                                                    باروری</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                            </ul>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview10" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview10">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Top rated post END -->

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                                <!-- Content -->
                                <p class="mb-sm-0 text-center text-sm-start">نمایش 1 تا 8 از 20</p>
                                <!-- Pagination -->
                                <nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-bordered mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#">..</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">بعد</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Blog list table END -->
                </div>
                <div class="col-lg-6">
                    <!-- Blog list table START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Card header START -->
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="mb-2 mb-sm-0">نویسندگان محبوب </h4>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table p-4 mb-0 align-middle table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">نام نویسنده</th>
                                        <th scope="col" class="border-0">امتیاز</th>
                                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/01.jpg"
                                                         alt="avatar">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><a href="#"
                                                                        class="stretched-link text-reset btn-link">مریم
                                                            قنبرزاده</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview11" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview11">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/02.jpg"
                                                         alt="avatar">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><a href="#"
                                                                        class="stretched-link text-reset btn-link">پرهام
                                                            محمدی</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview12" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview12">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/03.jpg"
                                                         alt="avatar">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><a href="#"
                                                                        class="stretched-link text-reset btn-link">مهدی
                                                            علیزاده</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview13" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview13">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/04.jpg"
                                                         alt="avatar">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><a href="#"
                                                                        class="stretched-link text-reset btn-link">سهراب
                                                            نوری</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                            </ul>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview14" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview14">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/05.jpg"
                                                         alt="avatar">
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><a href="#"
                                                                        class="stretched-link text-reset btn-link">نازنین
                                                            موحد</a></h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <ul class="list-inline d-flex mb-0">
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item me-1 small"><i
                                                            class="fas fa-star text-muted"></i></li>
                                            </ul>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                   id="dropdownReview115" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                </a>
                                                <!-- dropdown button -->
                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                    aria-labelledby="dropdownReview115">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                                <!-- Content -->
                                <p class="mb-sm-0 text-center text-sm-start">نمایش 1 تا 8 از 20</p>
                                <!-- Pagination -->
                                <nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-bordered mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#">..</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">بعد</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Blog list table END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<?php echo e($view->make('backend/main/layout/footer')); ?>

<!-- =======================
Footer END -->

<!-- Popup modal for reviwe START -->
<div class="modal fade" id="viewReview" tabindex="-1" aria-labelledby="viewReviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="viewReviewLabel">نظرات</h5>
                <button type="button" class="btn btn-sm btn-light text-dark mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x fs-5"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="d-md-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-md me-4 flex-shrink-0">
                        <img class="avatar-img rounded-circle"
                             src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?> /avatar/04.jpg"
                             alt="avatar">
                    </div>
                    <!-- Text -->
                    <div>
                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                            <h5 class="me-3 mb-0">با سهراب نوری</h5>
                            <!-- Review star -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i></li>
                            </ul>
                        </div>
                        <!-- Info -->
                        <p class="small mb-2">2 روز پیش</p>
                        <p class="mb-2">این راست نیست که هرچه عاشق‌ تر باشی بهتر درک می‌کنی. همه‌ی آنچه عشق و عاشقی از
                            من می‌ خواهد فقط درکِ این حکمت است: دیگری نشناختنی است؛ ماتیِ او پرده‌ی ابهامی به روی یک راز
                            نیست. </p>
                        <p class="mb-2">بل گواهی است که در آن بازیِ بود و نمود هیچ‌ جایی ندارد. پس من در مسرتِ عشق
                            ورزیدن به یک ناشناس غرق می‌شوم، کسی که تا ابد ناشناس خواهد ماند. سِیری عارفانه: من آن‌چه را
                            نمی‌شناسم می‌شناسم...! </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal for reviwe END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/apexcharts/js/apexcharts.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/quill/js/quill.min.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/post-comments/management.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>مجله ارون - نظرات</title>

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
                                    class="badge bg-primary bg-opacity-10 text-primary"><?php echo e(count($comments) + count($replyComments->get())); ?></span>
                        </h1>
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
                                        <th scope="col" class="border-0 rounded-start">عنوان اپیزود</th>
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
                                        <?php $__currentLoopData = array_reverse($replyComments->get(['post_comment_id' => $comment->id])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <!-- Table data -->
                                                <td>
                                                    <h6 class="course-title mb-0"><a
                                                                href="#"><?php echo e(current($posts->get(['id' => $comment->post_id]))->title); ?></a>
                                                    </h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <?php echo e(current($users->get(['id' => $replyComment->user_id]))->first_name . ' ' . current($users->get(['id' => $replyComment->user_id]))->last_name); ?>

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
                                                    <p class="small course-title"><?php echo e($replyComment->text); ?> <a href="#"
                                                                                                               data-bs-toggle="modal"
                                                                                                               data-bs-target="#viewReview"><?php echo e($lang['watch-more']); ?></a>
                                                    </p>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <?php if($replyComment->status == 'approved'): ?>
                                                        <span class="badge bg-success bg-opacity-10 text-success mb-2"><?php echo e($lang['approved']); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger bg-opacity-10 text-danger mb-2"><?php echo e($lang['disapproved']); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <div class="dropdown">
                                                        <?php if($currentUser->user_type == 'fulladmin'): ?>
                                                            <?php if(current($users->get(['id' => $replyComment->user_id]))->user_type != 'fulladmin'): ?>
                                                                <a href="#" class="btn btn-light btn-round mb-0"
                                                                   role="button"
                                                                   id="dropdownReview" data-bs-toggle="dropdown"
                                                                   aria-expanded="false">
                                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                                </a>
                                                                <!-- dropdown button -->
                                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                                    aria-labelledby="dropdownReview">
                                                                    <?php if($replyComment->status == 'disapproved'): ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve-reply/') . $replyComment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                <?php echo e($lang['approve']); ?>

                                                                            </a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve-reply/') . $replyComment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                عدم تایید
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <li><a class="dropdown-item"
                                                                           href="<?php echo e(route('/panel/posts-comments-management/delete-reply/') . $replyComment->id); ?>"><i
                                                                                    class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?>

                                                                        </a></li>
                                                                </ul>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(current($users->get(['id' => $replyComment->user_id]))->user_type != 'admin' && current($users->get(['id' => $replyComment->user_id]))->user_type != 'admin'): ?>
                                                                <a href="#" class="btn btn-light btn-round mb-0"
                                                                   role="button"
                                                                   id="dropdownReview" data-bs-toggle="dropdown"
                                                                   aria-expanded="false">
                                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                                </a>
                                                                <!-- dropdown button -->
                                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                                    aria-labelledby="dropdownReview">
                                                                    <?php if($replyComment->status == 'disapproved'): ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve-reply/') . $replyComment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                <?php echo e($lang['approve']); ?>

                                                                            </a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve-reply/') . $replyComment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                عدم تایید
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <li><a class="dropdown-item"
                                                                           href="<?php echo e(route('/panel/posts-comments-management/delete/') . $replyComment->id); ?>"><i
                                                                                    class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?>

                                                                        </a></li>
                                                                </ul>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php if($currentUser->user_type == 'fulladmin'): ?>
                                                    <div class="dropdown">
                                                        <?php if(current($users->get(['id '=> $comment->user_id]))->user_type != 'fulladmin'): ?>
                                                        <a href="#" class="btn btn-light btn-round mb-0" role="button"
                                                           id="dropdownReview" data-bs-toggle="dropdown"
                                                           aria-expanded="false">
                                                            <i class="bi bi-three-dots fa-fw"></i>
                                                        </a>
                                                        <!-- dropdown button -->
                                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                                aria-labelledby="dropdownReview">
                                                                <?php if($comment->status == 'disapproved'): ?>
                                                                    <li><a class="dropdown-item"
                                                                           href="<?php echo e(route('/panel/posts-comments-management/approve/') . $comment->id); ?>"><i
                                                                                    class="bi bi-pencil-square fa-fw me-2"></i>
                                                                            <?php echo e($lang['approve']); ?>

                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li><a class="dropdown-item"
                                                                           href="<?php echo e(route('/panel/posts-comments-management/approve/') . $comment->id); ?>"><i
                                                                                    class="bi bi-pencil-square fa-fw me-2"></i>
                                                                            عدم تایید
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <li><a class="dropdown-item"
                                                                       href="<?php echo e(route('/panel/posts-comments-management/delete/') . $comment->id); ?>"><i
                                                                                class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?>

                                                                    </a></li>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(current($users->get(['id' => $comment->user_id]))->user_type != 'admin' && $currentUser->user_type == 'admin'): ?>
                                                                <a href="#" class="btn btn-light btn-round mb-0"
                                                                   role="button"
                                                                   id="dropdownReview" data-bs-toggle="dropdown"
                                                                   aria-expanded="false">
                                                                    <i class="bi bi-three-dots fa-fw"></i>
                                                                </a>
                                                                <!-- dropdown button -->
                                                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                                                    aria-labelledby="dropdownReview">
                                                                    <?php if($comment->status == 'approved'): ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve/') . $comment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                <?php echo e($lang['approve']); ?>

                                                                            </a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li><a class="dropdown-item"
                                                                               href="<?php echo e(route('/panel/posts-comments-management/approve/') . $comment->id); ?>"><i
                                                                                        class="bi bi-pencil-square fa-fw me-2"></i>
                                                                                عدم تایید
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                    <li><a class="dropdown-item"
                                                                           href="<?php echo e(route('/panel/posts-comments-management/delete/') . $comment->id); ?>"><i
                                                                                    class="bi bi-trash fa-fw me-2"></i><?php echo e($lang['delete']); ?>

                                                                        </a></li>
                                                                </ul>
                                                            <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Blog list table END -->

                            <!-- Pagination START -->



















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
                            <h5 class="me-3 mb-0"><?php echo e(current($users->get(['id' => $comment->user_id]))->first_name . ' ' . current($users->get(['id' => $comment->user_id]))->last_name); ?></h5>
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
                        <p class="mb-2"><?php echo e($comment->text); ?></p>
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
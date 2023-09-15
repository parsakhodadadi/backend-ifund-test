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
    Post list START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3"><?php echo e($lang['my-posts']); ?> <span
                                    class="badge bg-primary bg-opacity-10 text-primary"><?php echo e($postsCount); ?></span></h1>
                        <a href="<?php echo e(route('/panel/add-post')); ?>" class="btn btn-sm btn-primary mb-0"><i
                                    class="fas fa-plus me-2"></i><?php echo e($lang['add-new-post']); ?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row g-4 mb-4">
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0">305</h3>
                                    <h6 class="mb-0"><?php echo e($lang['text-file']); ?></h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-camera-reels"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0">120</h3>
                                    <h6 class="mb-0"><?php echo e($lang['multi-media']); ?></h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-image"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0"><?php echo e($postsCount); ?></h3>
                                    <h6 class="mb-0"><?php echo e($lang['image-file']); ?></h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                <h4>فضای ذخیره سازی </h4>
                                <div>
                                    <div class="d-flex">
                                        <h6 class="mt-0">ذخیره سازی 80%</h6>
                                        <span class="ms-auto">6.80 گیگابایت از 10 گیگابایت</span>
                                    </div>
                                    <div class="progress progress-percent-bg progress-md">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                             role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                    <!-- Card END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post list table START -->
                    <div class="card border bg-transparent rounded-3">

                        <!-- Card body START -->
                        <div class="card-body p-3">

                            <!-- Search and select START -->
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <!-- Search -->
                                <div class="col-md-8">
                                    <form class="rounded position-relative">
                                        <input class="form-control pe-5 bg-transparent" type="search"
                                               placeholder="جستجو" aria-label="Search">
                                        <button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                                type="submit"><i class="fas fa-search fs-6 "></i></button>
                                    </form>
                                </div>

                                <!-- Select option -->
                                <div class="col-md-3">
                                    <!-- Short by filter -->
                                    <form>
                                        <select class="form-select z-index-9 bg-transparent"
                                                aria-label=".form-select-sm">
                                            <option value="">مرتب سازی</option>
                                            <option>رایگان</option>
                                            <option>جدیدترین</option>
                                            <option>قدیمی ترین</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- Search and select END -->

                            <!-- Post list table START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start"><?php echo e($lang['title']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['publish-date']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['category']); ?></th>
                                        <th scope="col" class="border-0"><?php echo e($lang['status']); ?></th>
                                        <th scope="col" class="border-0 rounded-end"><?php echo e($lang['action']); ?></th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mt-2 mt-md-0 mb-0"><a
                                                            href="<?php echo e(route('/panel/posts-management/') . $post->id); ?>">
                                                        <?php echo e($post->title); ?>

                                                    </a></h6>
                                            </td>
                                            <!-- Table data -->
                                            <td><?php echo e($post->date); ?></td>
                                            <!-- Table data -->
                                            <td>
                                                <a href="" class="badge text-bg-warning mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i><?php echo e(current($categories->get(['id' => $post->post_category_id]))->title); ?>

                                                </a>
                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <?php if($post->status == 'approved'): ?>
                                                    <span class="badge bg-success bg-opacity-10 text-success mb-2"><?php echo e($lang['approved']); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger bg-opacity-10 text-danger mb-2"><?php echo e($lang['disapproved']); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?php echo e(route('/panel/my-posts/delete/') . $post->id); ?>"
                                                       class="btn btn-light btn-round mb-0"
                                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                                       title="<?php echo e($lang['delete']); ?>"><i
                                                                class="bi bi-trash"></i></a>
                                                    <a href="<?php echo e(route('/panel/my-posts/edit/') . $post->id); ?>"
                                                       class="btn btn-light btn-round mb-0"
                                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                                       title="<?php echo e($lang['edit']); ?>"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Post list table END -->

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
                    <!-- Post list table END -->
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

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/posts/admin-posts.blade.php ENDPATH**/ ?>
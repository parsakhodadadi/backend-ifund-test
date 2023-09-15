<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Blogzine">
    <meta name="short_description" content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

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

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->

<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo $header; ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- Divider -->
    <div class="border-bottom border-primary border-1 opacity-1"></div>
    <!-- =======================
    Inner intro START -->
    <section class="pb-3 pb-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="badge text-bg-danger mb-2"><i
                                class="fas fa-circle me-2 small fw-bold"></i><?php echo e($category->title); ?></a>
                    <h1><?php echo e($post->title); ?></h1>
                </div>
                <p class="lead"><?php echo e($post->short_description); ?></p>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Main START -->
    <section class="pt-0">
        <div class="container position-relative" data-sticky-container>
            <div class="row">
                <!-- Left sidebar START -->
                <div class="col-lg-2">
                    <div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
                        <!-- Author info -->
                        <div class="position-relative">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img rounded-circle" src="<?php echo e(route('/') . $ownerUser->photo); ?>"
                                     alt="avatar">
                            </div>
                            <a href="#"
                               class="h5 stretched-link mt-2 mb-0 d-block"><?php echo e($ownerUser->first_name . ' ' . $ownerUser->last_name); ?></a>
                            <p>
                                <?php if($ownerUser->user_type == 'fulladmin'): ?>
                                    <?php echo e(__('posts.fulladmin')); ?>

                                <?php else: ?>
                                    <?php echo e(__('posts.admin')); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                        <hr class="d-none d-lg-block">
                        <!-- Card info -->
                        <ul class="list-inline list-unstyled">
                            <li class="list-inline-item d-lg-block my-lg-2"><?php echo e($post->date . ' ' . $post->time); ?></li>
                            <li class="list-inline-item d-lg-block my-lg-2">5 دقیقه زمان مطالعه</li>
                            <li class="list-inline-item d-lg-block my-lg-2"><a
                                        href="<?php echo e(route('/posts/') . $post->id . '/like'); ?>" class="text-body">
                                    <?php if($liked): ?>
                                        <i class="bi-heart-fill"></i>
                                    <?php else: ?>
                                        <i class="far fa-heart me-1"></i>
                                    <?php endif; ?>
                                </a> <?php echo e($post->likes); ?>

                            </li>
                            <li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> 2344 بازدید
                            </li>
                        </ul>
                        <!-- Tags -->
                        <ul class="list-inline text-primary-hover mt-0 mt-lg-3">
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#ورزش</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#فیلم</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#رسانه</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#برگزیده</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#استارت آپ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Left sidebar END -->
                <!-- Main Content START -->
                <div class="col-lg-7 mb-5">
                    <!-- Image -->
                    <figure class="figure mt-2">
                        <a href="<?php echo e(route('/') . $post->photo); ?>" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="<?php echo e(route('/') . $post->photo); ?>" alt="Image">
                        </a>
                        <p><?php echo e($post->text); ?></p>
                    </figure>
                    <p>
                    </p>

                    <!-- Divider -->
                    <div class="text-center h5 mb-4">. . .</div>

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    

                    

                    
                    

                    
                    
                    
                    

                    
                    
                    
                    

                    
                    
                    

                    
                    

                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- Related post END -->

                    <!-- Divider -->
                    <hr>
                    <!-- Author info START -->
                    <div class="d-flex py-4">
                        <!-- Avatar -->
                        <a href="#">
                            <div class="avatar avatar-xxl me-4">
                                <img class="avatar-img rounded-circle" src="<?php echo e(route('/') . $ownerUser->photo); ?>"
                                     alt="avatar">
                            </div>
                        </a>
                        <!-- Info -->
                        <div>
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="m-0"><a href="#" class="text-reset">

                                        </a>
                                    </h4>
                                    <small>
                                        <?php if($ownerUser->user_type == 'fulladmin'): ?>
                                            <?php echo e(__('posts.fulladmin-aaron')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('posts.admin-aaron')); ?>

                                        <?php endif; ?>
                                    </small>
                                </div>
                                <a href="#" class="btn btn-xs btn-primary-soft">مشاهده اخبار</a>
                            </div>
                            <p class="my-2">مهدی علیزاده سردبیر ارشد این وبلاگ است و همچنین اخبار فوری مستقر در لندن را
                                گزارش می دهد. او از سال 2015 درباره دولت، عدالت کیفری و نقش پول در سیاست نوشته است.</p>
                            <!-- Social icons -->
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 pe-2 fs-5" href="#"><i
                                                class="fab fa-facebook-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Author info END -->

                    <!-- Divider -->
                    <hr>

                    <!-- Comments START -->
                    <div>
                        <h3>
                            <?php ($num = 0); ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($num++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($num . ' ' . __('comments.comment')); ?>

                        </h3>
                        <!-- Comment level 1-->
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="my-4 d-flex">
                                <img class="avatar avatar-md rounded-circle float-start me-3"
                                     src="<?php echo e(route('/') . current($users->get(['id' => $comment->user_id]))->photo); ?>"
                                     alt="avatar">
                                <div>
                                    <div class="mb-2">
                                        <h5 class="m-0"><?php echo e(current($users->get(['id' => $comment->user_id]))->first_name . ' ' . current($users->get(['id' => $comment->user_id]))->last_name); ?></h5>
                                        <span class="me-3 small"><?php echo e($comment->date . ' ' . $comment->time); ?></span>
                                        <a href="<?php echo e(route('/') . 'posts/' . $post->id . '/reply/' . $comment->id); ?>"
                                           class="text-body fw-normal"><?php echo e(__('comments.reply')); ?></a>
                                    </div>
                                    <p> <?php echo e($comment->text); ?></p>
                                </div>
                            </div>
                            <?php $__currentLoopData = $replyComments->get(['status' => 'approved', 'post_comment_id' => $comment->id]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="my-4 d-flex ps-2 ps-md-3">
                                    <img class="avatar avatar-md rounded-circle float-start me-3"
                                         src="<?php echo e(route('/') . current($users->get(['id' => $replyComment->user_id]))->photo); ?>"
                                         alt="avatar">
                                    <div>
                                        <div class="mb-2">
                                            <h5 class="m-0"><?php echo e(current($users->get(['id' => $replyComment->user_id]))->first_name . ' ' . current($users->get(['id' => $replyComment->user_id]))->last_name); ?></h5>
                                            <span class="me-3 small">21<?php echo e($replyComment->date . ' ' . $replyComment->time); ?></span>
                                        </div>
                                        <p>
                                            <?php echo e($replyComment->text); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Comment children level 3 -->
                        <div class="my-4 d-flex ps-3 ps-md-5">
                            <img class="avatar avatar-md rounded-circle float-start me-3"
                                 src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/avatar/01.jpg"
                                 alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">مونا شاه حسینی</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>در نهایت این مرگ است که باید پیروز شود، زیرا از هنگام تولد بخشی از سرنوشت ما شده و
                                    فقط مدت کوتاهی پیش از بلعیدن طعمه اش، با آن بازی می کند.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Comments END -->
                    <!-- Reply START -->
                    <div>
                        <h3>ثبت دیدگاه</h3>
                        <small>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی علامت گذاری شده اند *</small>
                        <form action="<?php echo e(route('/') . $action); ?>" method="post"
                              class="row g-3 mt-2">
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- custom checkbox -->
                            
                            
                            
                            
                            
                            
                            <div class="col-12">
                                <label class="form-label">متن دیدگاه *</label>
                                <textarea name="text" class="form-control" rows="3"></textarea>
                                <?php if(!empty($errors['text']['required'])): ?>
                                    <div class="form-control bg-danger">
                                        <?php echo e($errors['text']['required']); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('comments.submit')); ?></button>
                            </div>
                            <?php if(!empty($successMessage)): ?>
                                <div class="form-control bg-success">
                                    <?php echo e($successMessage); ?>

                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                    <!-- Reply END -->
                </div>
                <!-- Main Content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-3">
                    <div data-sticky data-margin-top="80" data-sticky-for="991">
                        <h4>اشتراک گذاری</h4>
                        <ul class="nav text-white-force">
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-facebook" href="#">
                                    <i class="fab fa-facebook-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-twitter" href="#">
                                    <i class="fab fa-twitter-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-linkedin" href="#">
                                    <i class="fab fa-linkedin align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-pinterest" href="#">
                                    <i class="fab fa-pinterest align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-primary" href="#">
                                    <i class="far fa-envelope align-middle"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Advertisement -->
                        <div class="mt-4">
                            <a href="#" class="d-block card-img-flash">
                                <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/adv.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Right sidebar END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Main END -->

    <!-- =======================
    Sticky post START -->
    <div class="sticky-post bg-light border p-4 mb-5 text-sm-end rounded d-none d-xxl-block">
        <div class="d-flex align-items-center">
            <!-- image -->
            <div class="col-4 d-none d-md-block">
                <img src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/4by3/05.jpg" alt="Image">
            </div>
            <!-- Title -->
            <div class="ms-3 text-start">
                <span>خبر بعدی<i class="bi bi-arrow-right ms-3 rtl-flip"></i></span>
                <h6 class="m-0"><a href="javascript:void(0)" class="stretched-link btn-link text-reset">تداوم تنفس هوای
                        ناسالم در تهران</a></h6>
            </div>
        </div>
    </div>
    <!-- =======================
    Sticky post END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<?php echo e($view->make('frontend/main/layout/footer')); ?>

<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/tiny-slider/tiny-slider-rtl.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/sticky-js/sticky.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/glightbox/js/glightbox.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/frontend/main/post.blade.php ENDPATH**/ ?>
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
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/plyr/plyr.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/css')); ?>/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<?php echo e($view->make('frontend/main/layout/preloader')); ?>

<!-- Preloader END -->

<!-- =======================
Header START -->
<?php echo $header; ?>

<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Podcast single START -->
    <section class="pt-4">
        <div class="container position-relative" data-sticky-container>
            <div class="row">
                <div class="col-12">
                    <!-- Podcast image -->
                    <div class="mb-3">
                        <img class="rounded"
                             src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/big/06.jpg"
                             alt="">
                    </div>
                    <!-- Podcast title -->
                    <a href="#" class="badge text-bg-danger mb-2">جدید</a>
                    <h1><?php echo e($episode->title); ?></h1>
                    <!-- Podcast avatar -->
                    <div class="row align-items-center mb-2">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center position-relative me-3">
                                    <div class="avatar avatar-xs me-2">
                                        <img class="avatar-img  rounded-circle"
                                             src="<?php echo e(route('/') . $publisher->photo); ?>" alt="avatar">
                                    </div>
                                    <h6 class="mb-0"><a href="#"
                                                        class="stretched-link text-reset btn-link"><?php echo e($publisher->first_name . ' ' . $publisher->last_name); ?></a>
                                    </h6>
                                </div>
                                <span> <i class="bi bi-clock-fill me-2"></i>4ساعت و 12دقیقه</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Podcast listen -->
                            <ul class="list-unstyled d-flex justify-content-md-end gap-1 gap-sm-2 align-items-center mt-3 mb-sm-4">
                                <li class="h5 mb-0">گوش کنید به:</li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/apple-podcasts.svg"
                                                alt=""> </a></li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/divider-icon.svg"
                                                alt=""> </a></li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/spotify.svg"
                                                alt=""> </a></li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/google-podcasts.svg"
                                                alt=""> </a></li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/pocket.svg"
                                                alt=""> </a></li>
                                <li class="ms-2"><a href="#"> <img
                                                src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/icon/sound-cloud.svg"
                                                alt=""> </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Podcast short description -->
                    <p class="lead"><?php echo e($episode->short_description); ?></p>
                    <!-- Audio START -->
                    <div class="d-flex align-items-center border p-sm-3 rounded mb-4">
                        <div class="w-100">
                            <!-- Audio START -->
                            <div class="player-wrapper bg-light rounded">
                                <audio class="player-audio" crossorigin>
                                    <source src="<?php echo e(route('/') . $episode->podcast); ?>" type="audio/mp3">
                                </audio>
                            </div>
                            <!-- Audio END -->
                        </div>
                    </div>
                    <!-- Audio END -->
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Episode Description -->
                    <?php if($episode->text != null): ?>
                        <h3 class="mb-3">توضیحات</h3>
                        <p><span class="dropcap bg-success bg-opacity-10 text-success px-2 rounded">S</span>
                        <p><?php echo e($episode->text); ?></p>
                        <br>
                    <?php endif; ?>
                    <div>
                        <!-- Comment children level 3 -->
                        <!-- Reply START -->
                        <hr>
                        <h3>
                            <?php echo e(count($comments) . ' ' . __('comments.comment')); ?>

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
                                        <a href="<?php echo e(route('/') . 'podcasts/' . $episode->id . '/reply/' . $comment->id); ?>"
                                           class="text-body fw-normal"><?php echo e(__('comments.reply')); ?></a>
                                    </div>
                                    <p> <?php echo e($comment->text); ?></p>
                                </div>
                            </div>
                            <?php $__currentLoopData = $replyComments->get(['status' => 'approved', 'podcast_comment_id' => $comment->id]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <?php if($comment->id == $reply): ?>
                                <form action="<?php echo e(route('') . $action); ?>" method="post" class="row g-3 mt-2">
                                    <div class="col-12">
                                        <label class="form-label">متن پاسخ *</label>
                                        <textarea name="text" class="form-control" rows="3"></textarea>
                                        <?php if(!empty($errors['text'])): ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['text']['required']); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary"><?php echo e(__('comments.submit')); ?></button>
                                    </div>
                                    <?php if(!empty($successMessageReply)): ?>
                                        <div class="form-control bg-success">
                                            <?php echo e($successMessageReply); ?>

                                        </div>
                                    <?php endif; ?>
                                </form>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <h3>ثبت دیدگاه</h3>
                            <small>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی علامت گذاری شده اند *</small>
                            <form action="<?php echo e(route('/') . $action); ?>" method="post" class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label">متن دیدگاه *</label>
                                    <textarea name="text" class="form-control" rows="3"></textarea>
                                    <?php if(!empty($errors['text'])): ?>
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

                        <!-- Share social START -->
                        <div class="border mt-4 py-2 px-3 rounded">
                            <div class="list-group-inline list-unstyled">
                                <h6 class="mt-2 me-4 d-inline-block"><i class="fas fa-share-alt me-2"></i>اشتراک گذاری:
                                </h6>
                                <ul class="list-inline list-unstyled d-inline-block mb-0">
                                    <li class="list-inline-item"><a href="#" class="me-3 text-body">Facebook</a></li>
                                    <li class="list-inline-item"><a href="#" class="me-3 text-body">Twitter</a></li>
                                    <li class="list-inline-item"><a href="#" class="me-3 text-body">Dribble</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Share social END -->














                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Episode single END -->

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
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/plyr/plyr.js"></script>
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/vendor')); ?>/sticky-js/sticky.min.js"></script>

<!-- Template Functions -->
<script src="<?php echo e(route('/Others/Themes/Frontend/Theme/assets/js')); ?>/functions.js"></script>

</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/podcast-single.blade.php ENDPATH**/ ?>
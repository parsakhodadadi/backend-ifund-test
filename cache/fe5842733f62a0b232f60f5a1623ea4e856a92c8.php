<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

    <!-- Meta tags -->
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
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3"><?php echo e($lang['create-new-post']); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form action="<?php echo e(route('') . $action); ?>" method="post" enctype="multipart/form-data">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['title']); ?></label>
                                            <input id="con-name" name="title" type="text" class="form-control"
                                                   placeholder="<?php echo e($lang['post-title']); ?>"
                                                   value="<?php if(!empty($post)): ?> <?php echo e($post->title); ?> <?php endif; ?>">
                                            <?php if(!empty($errors['title'])): ?>
                                                <div class="form-control bg-danger"><?php echo e($errors['title']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- Short description -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['short_description']); ?></label>
                                            <textarea class="form-control" name="short_description" rows="3"
                                                      placeholder="<?php echo e($lang['short_description-placeholder']); ?>"><?php if(!empty($post)): ?>
                                                    <?php echo e($post->short_description); ?>

                                                <?php endif; ?></textarea>
                                            <?php if(!empty($errors['short_description'])): ?>
                                                <div class="form-control bg-danger"><?php echo e($errors['short_description']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- Main toolbar -->
                                    <div class="col-md-12">
                                        <!-- Subject -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['text']); ?></label>
                                            <!-- Editor toolbar -->
                                            <!-- Main toolbar -->
                                            <textarea class="form-control" name="text" rows="10"
                                                      id="myCKEditortextarea"><?php if(!empty($post)): ?>
                                                    <?php echo e($post->text); ?>

                                                <?php endif; ?></textarea>
                                            <?php if(!empty($errors['text'])): ?>
                                                <div class="form-control bg-danger"><?php echo e($errors['text']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <!-- Image -->
                                            <?php if(!empty($post)): ?>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4 col-md-2">
                                                        <div class="position-relative">
                                                            <img class="rounded" src="<?php echo e(route('/') . $post->photo); ?>"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-10 position-relative">
                                                        <h6 class="my-2"><?php echo e($lang['edit-photo']); ?></h6>
                                                        <label class="w-100" style="cursor:pointer;">
                                                            <div class="input-group flex-row-reverse">
                                                                <input type="text" class="form-control upload-name"/>
                                                                <span class="btn btn-custom cursor-pointer upload-button"><?php echo e($lang['upload-file']); ?></span>
                                                            </div>
                                                            <input class="form-control stretched-link d-none hidden-upload"
                                                                   type="file" name="photo"
                                                                   accept="image/gif, image/jpeg, image/png"/>
                                                            <?php if(!empty($errors['files'])): ?>
                                                                <?php if(!empty($errors['files']['photo_required'])): ?>
                                                                    <div class="form-control bg-danger"><?php echo e($errors['files']['photo_required']); ?></div>
                                                                <?php else: ?>
                                                                    <div class="form-control bg-danger"><?php echo e($errors['files']['photo']); ?></div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </label>
                                                    </div>
                                                    <p class="small mb-0 mt-2">
                                                        <b><?php echo e($lang['hint']); ?></b><?php echo e($lang['hint-upload-file']); ?> </p>
                                                </div>
                                            <?php else: ?>
                                                <div class="position-relative">
                                                    <h6 class="my-2"><?php echo e($lang['add-photo']); ?></h6>
                                                    <label class="w-100" style="cursor:pointer;">
                                                        <input class="form-control"
                                                               type="file" name="photo"
                                                               accept="image/gif, image/jpeg, image/png"/>
                                                        <?php if(!empty($errors['files'])): ?>
                                                            <?php if(!empty($errors['files']['photo_required'])): ?>
                                                                <div class="form-control bg-danger"><?php echo e($errors['files']['photo_required']); ?></div>
                                                            <?php else: ?>
                                                                <div class="form-control bg-danger"><?php echo e($errors['files']['photo']); ?></div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </label>
                                                </div>
                                                <p class="small mb-0 mt-2">
                                                    <b><?php echo e($lang['hint']); ?></b><?php echo e($lang['hint-upload-file']); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <!-- tagss -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['tags']); ?></label>
                                            <textarea class="form-control" name="tags" rows="1"
                                                      placeholder="<?php echo e($lang['tags-placeholder']); ?>"><?php if(!empty($post->tags)): ?>
                                                    <?php echo e($post->tags); ?>

                                                <?php endif; ?></textarea>
                                            <small><?php echo e($lang['hint-tags']); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <!-- Message -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['category']); ?></label>
                                            <select class="form-select" name="post_category_id"
                                                    aria-label="Default select example">
                                                <?php if(!empty($post)): ?>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($category->id == $post->post_category_id): ?>
                                                            <option value="<?php echo e($category->id); ?>"
                                                                    selected><?php echo e($category->title); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <option selected><?php echo e($lang['select-category']); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php if(!empty($errors['post_category_id'])): ?>
                                                <?php if(!empty($errors['post_category_id']['required'])): ?>
                                                    <div class="form-control bg-danger"><?php echo e($errors['post_category_id']['required']); ?></div>
                                                <?php else: ?>
                                                    <div class="form-control bg-danger"><?php echo e($errors['post_category_id']['post_cat_valid']); ?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <button class="btn btn-primary w-100"
                                                type="submit"><?php echo e($lang['submit-changes']); ?></button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                    <!-- Chart END -->
                    <?php if(!empty($successMessage)): ?>
                        <div class="form-control bg-success"><?php echo e($successMessage); ?></div>
                    <?php endif; ?>
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
<!-- Btn Upload -->
<script>
    document.querySelector(".upload-button").addEventListener("click", () => {
        //clicks on the file input
        document.querySelector(".hidden-upload").click();
    });
    //adds event listener on the hidden file input to listen for any changes
    document.querySelector(".hidden-upload").addEventListener("change", (event) => {
        //gets the file name
        document.querySelector(".upload-name").value = event.target.files[0].name;
    });
</script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 400,
        theme: 'silver',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
        templates: [{
            title: 'متن نمونه 1',
            content: 'متن 1'
        },
            {
                title: 'متن نمونه 2',
                content: 'متن 2'
            }
        ],
        content_css: []
    });

    CKEDITOR.replace('myCKEditortextarea')
</script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/posts/create.blade.php ENDPATH**/ ?>
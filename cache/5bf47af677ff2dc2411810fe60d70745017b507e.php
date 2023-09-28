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
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3"><?php echo e($lang['create-new']); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form action="<?php echo e(route('') . $action); ?>" enctype="multipart/form-data" method="post">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['title']); ?></label>
                                            <input id="con-name" name="title" type="text" class="form-control"
                                                   placeholder="<?php echo e($lang['podcast-title']); ?>">
                                            <?php if(!empty($errors['title'])): ?>
                                                <div class="form-control bg-danger"><?php echo e($errors['title']['required']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Short description -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['short-description']); ?></label>
                                            <textarea class="form-control" name="short_description" rows="3"
                                                      placeholder="<?php echo e($lang['write-short-desc-pod']); ?>"></textarea>
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
                                            <textarea class="form-control" name="text" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <!-- Image -->
                                            <?php if(!empty($episode)): ?>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4 col-md-2">
                                                        <div class="position-relative">
                                                            <img class="rounded" src="<?php echo e(route('/') . $episode->photo); ?>"
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
                                                    <h6 class="my-2">عکس</h6>
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
                                                    <b>نکته: </b>فرمت های مجاز: JPG، JPEG و PNG و ابعاد پیشنهادی ما 600px * 450px است. تصاویر بزرگتر به اندازه 4:3 برش داده می شود تا با تصاویر کوچک/پیش نمایش ما مطابقت داشته باشد</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <!-- file -->
                                            <div class="position-relative">
                                                <h6 class="my-2"><?php echo e($lang['upload-podcast-file']); ?></h6>
                                                <label class="w-100" style="cursor:pointer;">
                                                    <input class="form-control"
                                                           type="file" name="podcast" accept="audio/mp4"/>
                                                </label>
                                                <?php if(!empty($errors['files'])): ?>
                                                    <?php if(!empty($errors['files']['podcast_required'])): ?>
                                                        <div class="form-control bg-danger"><?php echo e($errors['files']['podcast_required']); ?></div>
                                                    <?php else: ?>
                                                        <div class="form-control bg-danger"><?php echo e($errors['files']['podcast']); ?></div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <p class="small mb-0 mt-2">
                                                <b><?php echo e($lang['hint']); ?> </b><?php echo e($lang['rule-uploading-file']); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <!-- Tags -->
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['tag']); ?></label>
                                            <textarea class="form-control" name="tag" rows="1"
                                                      placeholder="<?php echo e($lang['tag-placeholder']); ?>"></textarea>
                                            <small><?php echo e($lang['hint-tag']); ?></small>
                                            <?php if(!empty($errors['tag'])): ?>
                                                <div class="form-control bg-danger"><?php echo e($errors['tag']['tag_size']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e($lang['status']); ?></label>
                                            <?php if($currentUser->user_type == 'fulladmin'): ?>
                                                <select class="form-select" name="status">
                                                    <option value="pre-written"><?php echo e($lang['pre-written']); ?></option>
                                                    <option value="approved"><?php echo e($lang['active']); ?></option>
                                                </select>
                                            <?php else: ?>
                                                <select class="form-select" name="status">
                                                    <option value="pre-written"><?php echo e($lang['pre-written']); ?></option>
                                                    <option value="disapproved"><?php echo e($lang['active']); ?></option>
                                                </select>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <button class="btn btn-primary w-100"
                                                type="submit"><?php echo e($lang['create-podcast']); ?></button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                    <?php if(!empty($successMessage)): ?>
                        <div class="form-control bg-success"><?php echo e($successMessage); ?></div>
                    <?php endif; ?>
                    <!-- Chart END -->
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
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/main/layout/podcasts/create.blade.php ENDPATH**/ ?>
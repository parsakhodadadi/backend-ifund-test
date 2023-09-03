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
                        <?php if($method == 'create'): ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['add-new-author']); ?></li>
                        <?php else: ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($lang['edit-author']); ?></li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">تنظیمات</button>
                    <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"><span class="visually-hidden">فهرست کشویی</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a
                                class="dropdown-item" href="javascript:;">عمل</a>
                        <a class="dropdown-item" href="javascript:;">عمل دیگر</a>
                        <a class="dropdown-item" href="javascript:;">هر چیز دیگر اینجا</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">لینک
                            جدا کننده</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title"><?php echo e($lang['author-identities-form']); ?></h5>
                <hr/>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <form action="<?php echo e(route('') . $action); ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label"><?php echo e($lang['name']); ?></label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle"
                                               placeholder="<?php echo e($lang['enter-name']); ?>"
                                               value="<?php if(!empty($author)): ?> <?php echo e($author->name); ?> <?php endif; ?>">
                                        <?php if(!empty($errors['name'])): ?>
                                            <?php if(!empty($errors['name']['required'])): ?>
                                                <div class="form-control alert-danger"><?php echo e($errors['name']['required']); ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription"
                                               class="form-label"><?php echo e($lang['about']); ?></label>
                                        <textarea name="about" class="form-control" id="myCKEditortextarea"
                                                  rows="3">
                                            <?php if(!empty($author)): ?>
                                                <?php echo e($author->about); ?>

                                            <?php endif; ?>
                                        </textarea>
                                        <?php if(!empty($errors['about'])): ?>
                                            <?php if(!empty($errors['about']['required'])): ?>
                                                <div class="form-control alert-danger"><?php echo e($errors['about']['required']); ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription"
                                               class="form-label">
                                            <?php if($method == 'create'): ?>
                                                <?php echo e($lang['add-photo']); ?>

                                            <?php else: ?>
                                                <?php echo e($lang['add-new-photo']); ?>

                                            <?php endif; ?>
                                        </label>
                                        <input class="form-control" value="<?php if(!empty($author)): ?> <?php if(!empty($author->photo)): ?> <?php echo e($author->photo); ?> <?php endif; ?> <?php endif; ?>"
                                               id="image-uploadify" name="photo" type="file"
                                               accept="image/*"
                                               multiple>
                                        <?php if($method == 'update'): ?>
                                            <?php if(!empty($author->photo)): ?>
                                                <div class="card-body">
                                                <span>
                                                    <img src="<?php echo e(route('/') . $author->photo); ?>" width="200" height="auto" alt="">
                                                </span>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(!empty($errors['files'])): ?>
                                            <?php if(!empty($errors['files']['photo'])): ?>
                                                <div class="form-control alert-danger"><?php echo e($errors['files']['photo']); ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="submit" class="btn btn-primary px-4" value="<?php echo e($lang['register-data']); ?>">
                                </form>
                            </div>
                            <?php if(!empty($successMessage)): ?>
                                <div class="form-control alert-success"><?php echo e($successMessage); ?></div>
                            <?php endif; ?>
                            <?php if(!empty($errorMessage)): ?>
                                <div class="form-control alert-danger"><?php echo e($errorMessage); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src='<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/plugins/tinymce-rtl/tinymce.min.js'></script>
<script src='<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/plugins/ckeditor/ckeditor.js'></script>
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
<script src="<?php echo e(route('/Others/Themes/Backend/main/vertical/')); ?>assets/js/app.js"></script>
<!--end page wrapper -->


<?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/authors/create.blade.php ENDPATH**/ ?>
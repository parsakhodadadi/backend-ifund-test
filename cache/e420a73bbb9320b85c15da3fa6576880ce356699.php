<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">پروفایل</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">امکانات</li>
                                <li class="breadcrumb-item active" aria-current="page">پروفایل</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                            <div class="tab-pane" id="usertimeline">
                                <div class="box no-shadow">
                                    <form class="form-horizontal form-element col-12" method="post" action="<?php echo e(route('/panel/edit-profile')); ?>">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 form-label"><?php echo e($lang['name']); ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" 
                                                name="name" class="form-control" id="inputName"
                                                value="<?php echo e($user->name); ?>" placeholder="">
                                                <?php if(!empty($errors['name'])): ?>
                                                   <div class="form-element alert-danger"><?php echo e($errors['name']['required']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 form-label"><?php echo e($lang['email']); ?></label>
                                            <div class="col-sm-10">
                                                <input type="email" 
                                                name="email"
                                                class="form-control" id="inputEmail"
                                                value="<?php echo e($user->email); ?>"
                                                placeholder="">
                                                <?php if(!empty($errors['email']['required'])): ?>
                                                    <div class="form-element alert-danger"><?php echo e($errors['email']['required']); ?></div>
                                                <?php elseif(!empty($errors['email']['email'])): ?>
                                                    <div class="form-element alert-danger"><?php echo e($errors['email']['email']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPhone" class="col-sm-2 form-label"><?php echo e($lang['phone']); ?></label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" 
                                                name="phone"
                                                id="inputPhone"
                                                value="<?php echo e($user->phone); ?>" placeholder="">
                                                <?php if(!empty($errors['phone']['phone_number'])): ?>
                                                    <div class="form-element alert-danger"><?php echo e($errors['phone']['phone_number']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 form-label"><?php echo e($lang['experience']); ?></label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                name="experience"
                                                value="<?php echo e($user->experience); ?>"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 form-label"> <?php echo e($lang['skills']); ?></label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                name="skills" id="inputSkills" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="ms-auto col-sm-10">
                                                <button type="submit" class="btn btn-success">ارسال</button>
                                            </div>
                                        </div>
                                        <?php if(!empty($successMessage)): ?>
                                            <div class="form-group alert-success"><?php echo e($successMessage); ?></div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/views/backend/main/layout/edit-profile.blade.php ENDPATH**/ ?>
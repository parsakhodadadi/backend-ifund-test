<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>images\favicon.ico">

    <title>CRMi - ثبت نام </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\css\vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\css\style.css">
    <link rel="stylesheet" href="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\css\skin_color.css">
    <link rel="stylesheet" href="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\css\style-rtl.min.css">
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(http://localhost/backend-ifund/Others/Themes/Backend/crmi/hrmm/images/auth-bg/bg-1.jpg)">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary mm">با ما شروع کن</h2>
                                <p class="mb-0 mm">عضوی از ما شو</p>
                            </div>
                            <div class="p-40">
                                <form action="<?php echo e(route('/sign-up')); ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            <input type="text" name="name" 
                                            <?php if(!empty($data)): ?> value="<?php echo e($data['name']); ?>" <?php endif; ?> 
                                            class="form-control ps-15 bg-transparent"
                                                placeholder="نام وفامیلی" style="direction:rtl;">  
                                        </div>
                                        <?php if(!empty($errors['name'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['name']['required']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="ti-email"></i></span>
                                            <input type="text" name="email"
                                            <?php if(!empty($data)): ?> value="<?php echo e($data['email']); ?>" <?php endif; ?> 
                                            class="form-control ps-15 bg-transparent"
                                                placeholder="ایمیل" style="direction:rtl;">
                                        </div>
                                        <?php if(!empty($errors['email']['required'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['email']['required']); ?></div>
                                        <?php elseif(!empty($errors['email']['email'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['email']['email']); ?></div>
                                        <?php endif; ?>
                                        <?php if(!empty($registeredEmailErr)): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($registeredEmailErr); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                            <input type="password" 
                                            <?php if(!empty($data['password']) && empty($successMessage)): ?>
                                                value="<?php echo e($data['password']); ?>"
                                            <?php elseif(!empty($successMessage)): ?> 
                                                value="<?php echo e($password); ?>"
                                            <?php endif; ?>  
                                            name="password" class="form-control ps-15 bg-transparent"
                                                placeholder="پسوورد" style="direction:rtl;">
                                        </div>
                                        <?php if(!empty($errors['password']['required'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['password']['required']); ?></div>
                                        <?php elseif(!empty($errors['password']['password'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['password']['password']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                            <input type="password" name="confirm-password"
                                            <?php if(!empty($data['confirm-password'])): ?>
                                                value="<?php echo e($data['confirm-password']); ?>"
                                            <?php elseif(!empty($successMessage)): ?> 
                                                value="<?php echo e($password); ?>"
                                            <?php endif; ?> 
                                            class="form-control ps-15 bg-transparent"
                                                placeholder="تائید پسوورد" style="direction:rtl;">
                                        </div>
                                        <?php if(!empty($errors['confirm-password']['required'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['confirm-password']['required']); ?></div>
                                        <?php elseif(!empty($errors['confirm-password']['password'])): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errors['confirm-password']['password']); ?></div>
                                        <?php endif; ?>
                                        <?php if(!empty($errorPassNotEq)): ?>
                                            <div class="form-control rtl alert-danger"><?php echo e($errorPassNotEq); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1">
                                                <label for="basic_checkbox_1">شرایط را <a href="#"
                                                        class="text-warning"><b>قبول دارم</b></a></label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-info margin-top-10">ثبت نام</button>
                                        </div>
                                        <?php if(!empty($successMessage)): ?>
                                            <div class="form-control alert-success rtl mt-3"><?php echo e($successMessage); ?></div>
                                        <?php endif; ?>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-15 mb-0">حساب کاربری دارید؟<a href="<?php echo e(route('/sign-in')); ?>"
                                            class="text-danger ms-5">ورود</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="mt-20 text-white">- ثبت نام با -</p>
                            <p class="gap-items-2 mb-20">
                                <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i
                                        class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i
                                        class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i
                                        class="fa fa-instagram"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\js\vendors.min.js"></script>
    <script src="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>src\js\pages\chat-popup.js"></script>
    <script src="<?php echo e(route('/Others/Themes/Backend/crmi/hrmm/')); ?>assets\icons\feather-icons\feather.min.js"></script>


</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/views/backend/main/layout/sign-up.blade.php ENDPATH**/ ?>
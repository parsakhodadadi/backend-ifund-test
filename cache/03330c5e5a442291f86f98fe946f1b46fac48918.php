<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images\favicon.ico">

    <title>CRMi - ورود </title>

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
                                <h2 class="text-primary">بیا شروع کنیم</h2>
                                <p class="mb-0" style="direction:rtl;">برای ادامه به CRMi وارد شوید.</p>
                            </div>
                            <div class="p-40">
                                <form action="<?php echo e(route('/sign-in')); ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            <input type="text" 
                                            name="email" class="form-control ps-15 bg-transparent"
                                                placeholder="ایمیل" style="direction:rtl;">
                                        </div>
                                    </div>
                                    <?php if(!empty($errors['email']['required'])): ?>
                                        <div class="form-control rtl alert-danger"><?php echo e($errors['email']['required']); ?></div>
                                     <?php elseif(!empty($errors['email']['email'])): ?> 
                                        <div class="form-control rtl alert-danger"><?php echo e($errors['email']['email']); ?></div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text  bg-transparent"><i
                                                    class="ti-lock"></i></span>
                                            <input type="password"
                                            name="password" class="form-control ps-15 bg-transparent"
                                                placeholder="پسوورد" style="direction:rtl;">
                                            <input type="hidden" name="csrf_token" value="<?php echo e($security->csrfToken()); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1">
                                                <label for="basic_checkbox_1">مرا بخاطر بسپار</label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <div class="fog-pwd text-end">
                                                <a href="javascript:void(0)" class="hover-warning"><i
                                                        class="ion ion-locked"></i>پسووردت رو فراموش کردی؟</a><br>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-danger mt-10">ورود</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-15 mb-0">حساب کاربری نداری؟<a href="auth_register.html"
                                            class="text-warning ms-5">ثبت نام</a></p>
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
    <script src="src\js\vendors.min.js"></script>
    <script src="src\js\pages\chat-popup.js"></script>
    <script src="assets\icons\feather-icons\feather.min.js"></script>

</body>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend-ifund/views/backend/main/layout/user-password-sign-in.blade.php ENDPATH**/ ?>
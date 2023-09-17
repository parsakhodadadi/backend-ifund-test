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

            <div class="row g-4">
                <!-- Profile cover and info START -->
                <div class="col-12">
                    <div class="card mb-4 position-relative z-index-9">
                        <!-- Cover image -->
                        <div class="py-5 h-200 rounded"
                             style="background-image:url(<?php echo e(route('/Others/Themes/Frontend/Theme/assets/images')); ?>/blog/16by9/big/07.jpg); background-position: center bottom; background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <div class="card-body pt-3 pb-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-sm-12 col-md-auto text-center text-md-start">
                                    <div class="avatar avatar-xxl mt-n5">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                             src="<?php echo e(route('/') . $user->photo); ?>" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col-sm-12 col-md text-center text-md-start d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="my-1"><?php echo e($user->first_name . ' ' . $user->last_name); ?> <i
                                                    class="bi bi-patch-check-fill text-info small"></i></h4>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person-fill me-1"></i>
                                                <?php if($user->user_type == 'user'): ?>
                                                    <?php echo e($lang['user'] . ' ' . $lang['aaron-magazine']); ?>

                                                <?php elseif($user->user_type == 'admin'): ?>
                                                    <?php echo e($lang['admin'] . ' ' . $lang['aaron-magazine']); ?>

                                                <?php else: ?>
                                                    <?php echo e($lang['fulladmin'] . ' ' . $lang['aaron-magazine']); ?>

                                                <?php endif; ?>
                                            </li>
                                            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> تهران</li>
                                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i>
                                                <?php echo e($lang['subscription_date'] . ' ' . $user->subscription_date); ?>

                                            </li>
                                        </ul>
                                        <p class="m-0"></p>
                                    </div>
                                    <!-- Links -->
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                        <a href="#" class="btn btn-primary-soft me-3"><?php echo e($lang['follow']); ?></a>
                                        <!-- Card action START -->
                                        <div class="dropdown ms-3">
                                            <a class="text-secondary" href="#" id="profileDropdown" role="button"
                                               data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                               aria-expanded="false">
                                                <!-- Dropdown Icon -->
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <circle fill="currentColor" cx="3" cy="12" r="2.5"></circle>
                                                    <circle fill="currentColor" opacity="0.5" cx="12" cy="12"
                                                            r="2.5"></circle>
                                                    <circle fill="currentColor" opacity="0.3" cx="21" cy="12"
                                                            r="2.5"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="profileDropdown">
                                                <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-share me-2 fw-icon"></i>اشتراک گذاری
                                                        پروفایل</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-volume-mute me-2 fw-icon"></i>بیصدا کردن
                                                        نوتیفیکیشن</a></li>
                                                <li><a class="dropdown-item text-danger" href="#"><i
                                                                class="bi bi-slash-circle me-2 fw-icon"></i>حدف حساب
                                                        کاربری</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-flag me-2 fw-icon"></i>گزارش خطا</a></li>
                                            </ul>
                                        </div>
                                        <!-- Card action END -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile info END -->
            </div>

            <div class="row g-4">
                <!-- Left sidebar START -->
                <div class="col-lg-7 col-xxl-8">
                    <!-- Profile START -->
                    <form action="<?php echo e(route('/panel/edit-profile')); ?>" method="post" enctype="multipart/form-data">
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0"><?php echo e($lang['user-account']); ?></h4>
                            </div>
                            <div class="card-body">
                                <!-- Full name -->
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['full-name']); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="first_name" class="form-control"
                                               value="<?php echo e($user->first_name); ?>"
                                               placeholder="<?php echo e($lang['first-name']); ?>">
                                        <?php if(!empty($errors['first_name']['required'])): ?>
                                            <div class="form-control bg-danger"><?php echo e($errors['first_name']['required']); ?></div>
                                        <?php endif; ?>
                                        <input type="text" name="last_name" class="form-control"
                                               value="<?php echo e($user->last_name); ?>"
                                               placeholder="<?php echo e($lang['last-name']); ?>">
                                        <?php if(!empty($errors['last_name']['required'])): ?>
                                            <div class="form-control bg-danger"><?php echo e($errors['last_name']['required']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Username -->
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['username']); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="username" class="form-control"
                                               value="<?php echo e($user->username); ?>">
                                    </div>
                                </div>
                                <!-- Profile picture -->
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['profile-photo']); ?></label>
                                    <!-- Avatar upload START -->
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative me-3">
                                            <!-- Avatar edit -->
                                            <div class="position-absolute top-0 end-0  z-index-9">
                                                <a class="btn btn-sm btn-light btn-round mb-0 mt-n1 me-n1" href="#"> <i
                                                            class="bi bi-pencil"></i> </a>
                                            </div>
                                            <!-- Avatar preview -->
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                                     src="<?php echo e(route('/') . $user->photo); ?>" alt="">
                                            </div>
                                        </div>
                                        <!-- Avatar remove button -->
                                        <div class="avatar-remove">
                                            <button type="button" class="btn btn-light"><?php echo e($lang['delete']); ?></button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-center">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <!-- Avatar upload END -->
                                </div>
                                <!-- Job title -->
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <!-- Bio -->
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <!-- Save button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <a href="#" class="btn text-secondary border-0 me-2"><?php echo e($lang['cancel']); ?></a>
                                    <button class="btn btn-primary"><?php echo e($lang['save']); ?></button>
                                </div>
                            </div>
                            <?php if(!empty($successMessageProfile)): ?>
                                <div class="form-control bg-success"><?php echo e($successMessageProfile); ?></div>
                            <?php endif; ?>
                        </div>
                    </form>
                    <!-- Profile END -->

                    <!-- Personal information START -->
                    <form action="<?php echo e(route('/panel/edit-personal-info')); ?>" method="post">
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0"><?php echo e($lang['personal-info']); ?></h4>
                            </div>
                            <div class="card-body">
                                <!-- Skype -->
                                <div class="mb-3">
                                    <label class="form-label">Skype</label>
                                    <input class="form-control" name="skype" type="text" value="<?php echo e($user->skype); ?>">
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['email']); ?></label>
                                    <input class="form-control" name="email" type="email" value="<?php echo e($user->email); ?>">
                                </div>
                                <!-- Address -->
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['address']); ?></label>
                                    <input class="form-control" name="address" type="text"
                                           value="<?php echo e($user->address); ?>">
                                </div>
                                <!-- Save button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary"><?php echo e($lang['save']); ?></button>
                                </div>
                            </div>
                            <?php if(!empty($successMessagePersonalInfo)): ?>
                                <div class="form-control bg-success"><?php echo e($successMessagePersonalInfo); ?></div>
                            <?php endif; ?>
                        </div>
                    </form>
                    <!-- Personal information END -->

                    <!-- Social links START -->
                    <form action="<?php echo e(route('/panel/edit-social-media')); ?>" method="post">
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0"><?php echo e($lang['social-media']); ?></h4>
                            </div>
                            <div class="card-body">
                                <!-- Skype -->
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input class="form-control" name="facebook" type="text"
                                           value="<?php echo e($user->facebook); ?>">
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">linkedin</label>
                                    <input class="form-control" name="linkedin" type="text"
                                           value="<?php echo e($user->linkedin); ?>">
                                </div>
                                <!-- Address -->
                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input class="form-control" name="twitter" type="text" value="<?php echo e($user->twitter); ?>">
                                </div>
                                <!-- Save button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary"><?php echo e($lang['save']); ?></button>
                                </div>
                            </div>
                            <?php if(!empty($successMessageSocialMedia)): ?>
                                <div class="form-control bg-success"><?php echo e($successMessageSocialMedia); ?></div>
                            <?php endif; ?>
                        </div>
                    </form>
                    <!-- Social links END -->

                    <!-- Update password START -->
                    <form action="<?php echo e(route('/panel/change-password')); ?>" method="post">
                        <div class="card border">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0"><?php echo e($lang['change-password']); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e($lang['current-password']); ?></label>
                                    <input class="form-control" name="current-password" type="password"
                                           placeholder="*********">
                                    <?php if(!empty($errors['current-password'])): ?>
                                        <?php if(!empty($errors['current-password']['required'])): ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['current-password']['required']); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['current-password']['password']); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- New password -->
                                <div class="mb-3">
                                    <label class="form-label"
                                           id="psw-strength-message"><?php echo e($lang['new-password']); ?></label>
                                    <div class="input-group">
                                        <input class="form-control fakepassword" name="new-password" type="password"
                                               id="psw-input"
                                               placeholder="*********">
                                        <span class="input-group-text p-0">
                  <i class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                </span>
                                    </div>
                                    <?php if(!empty($errors['new-password'])): ?>
                                        <?php if(!empty($errors['new-password']['required'])): ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['new-password']['required']); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['new-password']['password']); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="rounded mt-1" id="psw-strength"></div>
                                </div>
                                <!-- New password -->
                                <div>
                                    <label class="form-label"><?php echo e($lang['confirm-password']); ?></label>
                                    <input class="form-control" name="confirm-password" type="password"
                                           placeholder="*********">
                                    <?php if(!empty($errors['confirm-password'])): ?>
                                        <?php if(!empty($errors['confirm-password']['required'])): ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['confirm-password']['required']); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="form-control bg-danger">
                                                <?php echo e($errors['confirm-password']['password']); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary"><?php echo e($lang['save']); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if(!empty($successMessageChangePassword)): ?>
                        <div class="form-control bg-success"><?php echo e($successMessageChangePassword); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($errorMessageChangePassword)): ?>
                        <div class="form-control alert-danger">
                            <?php echo e($errorMessageChangePassword); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <!-- Left sidebar END -->

                <!-- Right sidebar START -->
                <div class="col-lg-5 col-xxl-4">
                    <!-- Profile Setting START -->
                    <form action="<?php echo e(route('/panel/edit-profile-settings')); ?>" method="post">
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0"><?php echo e($lang['account-settings']); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch form-check-md mb-3">
                                    <input class="form-check-input" name="show_profile_everyone" type="checkbox" id="availabilityCheck" checked="">
                                    <label class="form-check-label" for="availabilityCheck"><?php echo e($lang['show-profile-every-one']); ?></label>
                                </div>
                                <div class="form-check form-switch form-check-md mb-3">
                                    <input class="form-check-input" type="checkbox" id="proCheck" disabled="">
                                    <label class="form-check-label" for="proCheck">غیرفعالسازی تبلیغات <span
                                                class="badge bg-primary align-middle">حرفه ای</span></label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Profile Setting END -->

                    <!-- Notifications START -->
                    <div class="card border mb-4">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">مدیریت اعلان ها</h4>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <p>نوتیف هایی که مایل به دریافت آن هستید را فعال کرده و مابقی را غیرفعال نمایید.</p>
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="withdrawalCheck" checked="">
                                <label class="form-check-label" for="withdrawalCheck">برداشت وجه</label>
                            </div>
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="weeklyCheck">
                                <label class="form-check-label" for="weeklyCheck">گزارش هفتگی</label>
                            </div>
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="passwordCheck" checked="">
                                <label class="form-check-label" for="passwordCheck">تغییر رمز عبور</label>
                            </div>
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="dataCheck">
                                <label class="form-check-label" for="dataCheck">هشدار مصرف داده</label>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Notifications START -->

                    <!-- Deactivate account START -->
                    <div class="card border mb-4">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">حذف حساب کاربری</h4>
                        </div>
                        <div class="card-body">
                            <h6>قبل از حذف به نکات زیر دقت نمایید...</h6>
                            <ul>
                                <li>بک آپ گیری اطلاعات از <a href="#">اینجا</a></li>
                                <li>با حذف حساب کاربری خود هیچ راهی برای بازیابی آن وجود نخواهد داشت.</li>
                            </ul>
                            <div class="form-check form-check-md my-3">
                                <input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
                                <label class="form-check-label" for="deleteaccountCheck">بله، می خواهم حساب خود را حذف
                                    کنم.</label>
                            </div>
                            <a href="#" class="btn btn-success-soft my-1">منصرف شدم</a>
                            <a href="#" class="btn btn-danger my-1">حذف</a>
                        </div>
                    </div>
                    <!-- Deactivate account START -->
                    <p><i class="bi bi-info-circle me-2"></i>این حساب در 14 خرداد 1400 ایجاد شده است.</p>

                    <div class="card bg-transparent border rounded-3 mt-4">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom p-3">
                            <h4 class="card-header-title mb-0">حساب های فعال</h4>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Google -->
                            <div class="position-relative mb-3 mt-3 d-sm-flex bg-success bg-opacity-10 border border-success p-3 rounded">
                                <!-- Title and content -->
                                <h2 class="fs-1 mb-0 me-3"><i class="fab fa-google text-google-icon"></i></h2>
                                <div>
                                    <div class="position-absolute top-0 start-100 translate-middle bg-white rounded-circle lh-1 h-20px">
                                        <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    </div>
                                    <h6 class="mb-1">Google</h6>
                                    <p class="mb-1 small">شما با موفقیت به حساب Google خود وصل شده اید.</p>
                                    <!-- Button -->
                                    <button type="button" class="btn btn-sm btn-danger mb-0 me-2">خروج</button>
                                    <a href="#" class="btn btn-sm btn-link text-body mb-0">کسب اطلاعات</a>
                                </div>
                            </div>

                            <!-- Blogger -->
                            <div class="mb-3 d-sm-flex border p-3 rounded">
                                <!-- Title and content -->
                                <h2 class="fs-1 mb-0 me-3"><i class="fab fa-blogger text-warning"></i></h2>
                                <div>
                                    <h6 class="mb-1">Blogger</h6>
                                    <p class="mb-1 small">شما با موفقیت به حساب Blogger خود وصل شده اید.</p>
                                    <!-- Button -->
                                    <button type="button" class="btn btn-sm btn-primary mb-0 me-2">ورود</button>
                                    <a href="#" class="btn btn-sm btn-link text-body mb-0">کسب اطلاعات</a>
                                </div>
                            </div>

                            <!-- Facebook -->
                            <div class="d-sm-flex border p-3 rounded mb-2">
                                <!-- Title and content -->
                                <h2 class="fs-1 mb-0 me-3"><i class="fab fa-facebook text-facebook"></i></h2>
                                <div>
                                    <h6 class="mb-1">Facebook</h6>
                                    <p class="mb-1 small">شما با موفقیت به حساب Facebook خود وصل شده اید.</p>
                                    <!-- Button -->
                                    <button type="button" class="btn btn-sm btn-primary mb-0 me-2">ورود</button>
                                    <a href="#" class="btn btn-sm btn-link text-body mb-0">کسب اطلاعات </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
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

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/users/edit-profile.blade.php ENDPATH**/ ?>
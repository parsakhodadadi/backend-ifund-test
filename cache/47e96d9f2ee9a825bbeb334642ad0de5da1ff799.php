<header>
    <div class="topbar d-flex align-items-center bg-dark shadow-none border-light-2 border-bottom">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu text-white me-3"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu-left d-none d-lg-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>app-emailbox.html"><i
                                    class='bx bx-envelope'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>app-chat-box.html"><i
                                    class='bx bx-message'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>app-fullcalender.html"><i
                                    class='bx bx-calendar'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>app-to-do.html"><i
                                    class='bx bx-check-square'></i></a>
                    </li>
                </ul>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <form>
                        <input type="text" class="form-control search-control" autofocus
                               placeholder="جستجو ..."> <span
                                class="position-absolute top-50 search-show translate-middle-y"><i
                                    class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i
                                    class='bx bx-x'></i></span>
                    </form>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link text-white" href="javascript:;"> <i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret text-white" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i
                                    class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-cosmic text-white"><i
                                                class='bx bx-group'></i>
                                    </div>
                                    <div class="app-title">تیم ها</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-burning text-white"><i
                                                class='bx bx-atom'></i>
                                    </div>
                                    <div class="app-title">پروژه ها</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-lush text-white"><i
                                                class='bx bx-shield'></i>
                                    </div>
                                    <div class="app-title">وظایف</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i
                                                class='bx bx-notification'></i>
                                    </div>
                                    <div class="app-title">نظرات</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-blues text-dark"><i
                                                class='bx bx-file'></i>
                                    </div>
                                    <div class="app-title">فایل ها</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-moonlit text-white"><i
                                                class='bx bx-filter-alt'></i>
                                    </div>
                                    <div class="app-title">هشدار ها</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative text-white"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                    class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">اعلان ها</p>
                                    <p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i
                                                    class="bx bx-group"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">کاربران جدید<span class="msg-time float-end">14
															ثانیه پیش</span></h6>
                                            <p class="msg-info">5 کاربر جدید ثبت نام کردند</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i
                                                    class="bx bx-cart-alt"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">سفارشات جدید <span class="msg-time float-end">2
															دقیقه پیش</span></h6>
                                            <p class="msg-info">شما یک سفارش جدید دریافت کردید</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i
                                                    class="bx bx-file"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">24 فایل PDF<span class="msg-time float-end">19
															دقیقه پیش</span></h6>
                                            <p class="msg-info">فایل های pdf جدید تولید شدند</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i
                                                    class="bx bx-send"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">زمان پاسخگویی <span
                                                        class="msg-time float-end">28 دقیقه پیش</span></h6>
                                            <p class="msg-info">میانگین زمان پاسخوگیی 5.1 دقیقه است</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-info text-info"><i
                                                    class="bx bx-home-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">تایید محصول جدید <span
                                                        class="msg-time float-end">2 ساعت پیش</span></h6>
                                            <p class="msg-info">محصول جدید شما تایید شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i
                                                    class="bx bx-message-detail"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">دیدگاه جدید <span class="msg-time float-end">4
															ساعت پیش</span></h6>
                                            <p class="msg-info">دیدگاه های جدید کاربران دریافت شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i
                                                    class='bx bx-check-square'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">ارسال محصول شما <span
                                                        class="msg-time float-end">5 ساعت پیش</span></h6>
                                            <p class="msg-info">محصول شما با موفقیت ارسال شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i
                                                    class='bx bx-user-pin'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">24 نویسنده جدید<span
                                                        class="msg-time float-end">1 روز پیش</span></h6>
                                            <p class="msg-info">در هفته گذشته 24 نویسنده جدید به شرکت پیوست</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i
                                                    class='bx bx-door-open'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">هشدار های دفاعی <span
                                                        class="msg-time float-end">2 هفته پیش</span></h6>
                                            <p class="msg-info">45% هشدار کمتر در 4 هفته گذشته</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">مشاهده همه اعلان ها</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative text-white"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                    class="alert-count">8</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">پیغام ها</p>
                                    <p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-1.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">رضا افشار <span class="msg-time float-end">5
															ثانیه پیش</span></h6>
                                            <p class="msg-info">این یک پیام استاندارد است</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-2.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">پریسا توکلی <span class="msg-time float-end">14
															ثانیه پیش</span></h6>
                                            <p class="msg-info">پکیج های جدید منتشر شدند</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-3.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">پدرام شریفی <span class="msg-time float-end">8
															دقیقه پیش</span></h6>
                                            <p class="msg-info">نسخه جدید قالب به روز رسانی شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-4.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">یلدا رسولی <span class="msg-time float-end">15
															دقیقه پیش</span></h6>
                                            <p class="msg-info">اولین نسخه اپلیکیشن به درستی ایجاد شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-5.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">امیر صبوری <span class="msg-time float-end">22
															دقیقه پیش</span></h6>
                                            <p class="msg-info">لورم ایپسوم متن ساختگی نامفهوم</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-6.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">ساناز پگاه <span class="msg-time float-end">2
															ساعت پیش</span></h6>
                                            <p class="msg-info">ویژگی های جدید محصول تعریف شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-7.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">سعید صادقی <span class="msg-time float-end">4
															ساعت پیش</span></h6>
                                            <p class="msg-info">لورم اپیسوم متن ساختگی</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-8.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">فریبا سبحانی <span class="msg-time float-end">6
															ساعت پیش</span></h6>
                                            <p class="msg-info">این مورد در 1960 ثانیه محبوب شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-9.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">علیرضا قربانی <span
                                                        class="msg-time float-end">8 ساعت پیش</span></h6>
                                            <p class="msg-info">نسخه جدید قالب به روز رسانی شد</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-10.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">محمد خالقی <span class="msg-time float-end">2
															روز پیش</span></h6>
                                            <p class="msg-info">شما می توانید این پیام را ذخیره کنید</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-11.png" class="msg-avatar"
                                                 alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">جواد علیپور <span class="msg-time float-end">5
															روز پیش</span></h6>
                                            <p class="msg-info">لورم ایپسوم متن ساختگی نامفهوم</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">مشاهده همه پیغام ها</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown border-light-2">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0 text-white">پریسا توکلی</p>
                        <p class="designattion mb-0">طراح وب</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-user"></i><span>پروفایل</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                    class="bx bx-cog"></i><span>تنظیمات</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-home-circle'></i><span>داشبورد</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-dollar-circle'></i><span>درآمد</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>دانلود
										ها</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-log-out-circle'></i><span>خروج</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/Backend/main/layout/header.blade.php ENDPATH**/ ?>
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
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/quill/css/quill.snow.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/css') }}/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
{{ $view->make('backend/main/layout/preloader') }}
<!-- Preloader END -->

<!-- =======================
Header START -->
{!! $header !!}
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
                             style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/16by9/big/07.jpg); background-position: center bottom; background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <div class="card-body pt-3 pb-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-sm-12 col-md-auto text-center text-md-start">
                                    <div class="avatar avatar-xxl mt-n5">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow"
                                             src="{{ route('/') . $user->photo }}" alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col-sm-12 col-md text-center text-md-start d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="my-1">{{ $user->first_name . ' ' . $user->last_name }} <i
                                                    class="bi bi-patch-check-fill text-info small"></i></h4>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person-fill me-1"></i> روزنامه
                                                نگار Blogzine
                                            </li>
                                            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> تهران</li>
                                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> تاریخ
                                                عضویت 5 بهمن 1400
                                            </li>
                                        </ul>
                                        <p class="m-0"></p>
                                    </div>
                                    <!-- Links -->
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                        <a href="#" class="btn btn-primary-soft me-3">{{ $lang['follow'] }}</a>
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
                    <form action="{{ route('/panel/edit-profile') }}" method="post" enctype="multipart/form-data">
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0">{{ $lang['user-account'] }}</h4>
                            </div>
                            <div class="card-body">
                                <!-- Full name -->
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang['full-name'] }}</label>
                                    <div class="input-group">
                                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                                               placeholder="{{ $lang['first-name'] }}">
                                        @if(!empty($errors['first_name']['required']))
                                            <div class="form-control bg-danger">{{ $errors['first_name']['required'] }}</div>
                                        @endif
                                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                                               placeholder="{{ $lang['last-name'] }}">
                                        @if(!empty($errors['last_name']['required']))
                                            <div class="form-control bg-danger">{{ $errors['last_name']['required'] }}</div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Username -->
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang['email'] }}</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    @if(!empty($errors['email']))
                                        @if(!empty($errors['email']['required']))
                                            <div class="form-control bg-danger">{{ $errors['email']['required'] }}</div>
                                        @else
                                            <div class="form-control bg-danger">{{ $errors['email']['email'] }}</div>
                                        @endif
                                    @endif
                                </div>
                                <!-- Profile picture -->
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang['profile-photo'] }}</label>
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
                                                     src="{{ route('/') . $user->photo }}" alt="">
                                            </div>
                                        </div>
                                        <!-- Avatar remove button -->
                                        <div class="avatar-remove">
                                            <button type="button" class="btn btn-light">{{ $lang['delete'] }}</button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-center">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <!-- Avatar upload END -->
                                </div>
                                <!-- Job title -->
                                {{--                            <div class="mb-3">--}}
                                {{--                                <label class="form-label">عنوان شغلی</label>--}}
                                {{--                                <input class="form-control" type="text" value="روزنامه نگار Blogzine">--}}
                                {{--                            </div>--}}
                                {{--                            <!-- Location -->--}}
                                {{--                            <div class="mb-3">--}}
                                {{--                                <label class="form-label">موقعیت مکانی</label>--}}
                                {{--                                <input class="form-control" type="text" value="خیابان شریعتی">--}}
                                {{--                            </div>--}}
                                <!-- Bio -->
                                {{--                            <div class="mb-3">--}}
                                {{--                                <label class="form-label"></label>--}}
                                {{--                                <textarea class="form-control" rows="3">من راهی برای دریافت پول برای سرگرمی مورد علاقه‌ام پیدا کرده‌ام و این کار را در حالی انجام می‌دهم که رویای سفر به دور دنیا را دنبال می‌کنم.</textarea>--}}
                                {{--                                <div class="form-text">توضیحات مختصری برای پروفایل شما</div>--}}
                                {{--                            </div>--}}
                                {{--                            <!-- Birthday -->--}}
                                {{--                            <div>--}}
                                {{--                                <label class="form-label">تاریخ تولد</label>--}}
                                {{--                                <input type="text" class="form-control flatpickr-input" placeholder="DD/MM/YYYY" value="12/10/1400">--}}
                                {{--                            </div>--}}
                                <!-- Save button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <a href="#" class="btn text-secondary border-0 me-2">{{ $lang['cancel'] }}</a>
                                    <button class="btn btn-primary">{{ $lang['save'] }}</button>
                                </div>
                            </div>
                            @if(!empty($successMessage))
                                <div class="form-control bg-success">{{ $successMessage }}</div>
                            @endif
                        </div>
                    </form>
                    <!-- Profile END -->

                    <!-- Personal information START -->
                    <div class="card border mb-4">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">اطلاعات شخصی</h4>
                        </div>
                        <div class="card-body">
                            <!-- Skype -->
                            <div class="mb-3">
                                <label class="form-label">Skype</label>
                                <input class="form-control" type="text" value="iamlouisferguson">
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">پست الکترونیکی</label>
                                <input class="form-control" type="email" value="example@gmail.com">
                            </div>
                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label">آدرس</label>
                                <input class="form-control" type="text"
                                       value="خیابان شریعتی، جنب مترو ظفر، مجتمع شکوفه پلاک 87">
                            </div>
                            <!-- Save button -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="btn btn-primary">ذخیره</a>
                            </div>
                        </div>
                    </div>
                    <!-- Personal information END -->

                    <!-- Social links START -->
                    <div class="card border mb-4">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0"> شبکه های اجتماعی</h4>
                        </div>
                        <div class="card-body">
                            <!-- Skype -->
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input class="form-control" type="text" value="https://facebook.com">
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">linkedin</label>
                                <input class="form-control" type="email" value="https://www.linkedin.com">
                            </div>
                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label">Twitter</label>
                                <input class="form-control" type="text" value="https://twitter.com">
                            </div>
                            <!-- Save button -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="btn btn-primary">ذخیره</a>
                            </div>
                        </div>
                    </div>
                    <!-- Social links END -->

                    <!-- Update password START -->
                    <div class="card border">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">تغییر رمز عبور</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">رمز عبور فعلی</label>
                                <input class="form-control" type="password" placeholder="*********">
                            </div>
                            <!-- New password -->
                            <div class="mb-3">
                                <label class="form-label" id="psw-strength-message"></label>
                                <div class="input-group">
                                    <input class="form-control fakepassword" type="password" id="psw-input"
                                           placeholder="*********">
                                    <span class="input-group-text p-0">
                  <i class="fakepasswordicon far fa-eye cursor-pointer p-2 w-40px"></i>
                </span>
                                </div>
                                <div class="rounded mt-1" id="psw-strength"></div>
                            </div>
                            <!-- New password -->
                            <div>
                                <label class="form-label">رمز عبور جدید</label>
                                <input class="form-control" type="password" placeholder="*********">
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="btn btn-primary">ذخیره</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left sidebar END -->

                <!-- Right sidebar START -->
                <div class="col-lg-5 col-xxl-4">
                    <!-- Profile Setting START -->
                    <div class="card border mb-4">
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">تنظیمات حساب کاربری</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="availabilityCheck" checked="">
                                <label class="form-check-label" for="availabilityCheck">نمایش پروفایل برای همه</label>
                            </div>
                            <div class="form-check form-switch form-check-md mb-3">
                                <input class="form-check-input" type="checkbox" id="proCheck" disabled="">
                                <label class="form-check-label" for="proCheck">غیرفعالسازی تبلیغات <span
                                            class="badge bg-primary align-middle">حرفه ای</span></label>
                            </div>
                        </div>
                    </div>
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
<footer class="mb-3">
    <div class="container">
        <div class="card card-body bg-light">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <!-- Copyright -->
                    <div class="text-center text-lg-start">©2022 ارائه شده در سایت <a href="https://www.rtl-theme.com/"
                                                                                      class="text-reset btn-link"
                                                                                      target="_blank">راست چین</a>
                    </div>
                </div>
                <div class="col-lg-6 d-sm-flex align-items-center justify-content-center justify-content-lg-end">
                    <!-- Language switcher -->
                    <div class="dropup me-0 me-sm-3 mt-3 mt-md-0 text-center text-sm-end">
                        <a class="dropdown-toggle text-body" href="#" role="button" id="languageSwitcher"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            زبان
                        </a>
                        <ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
                            <li><a class="dropdown-item" href="#">فارسی</a></li>
                            <li><a class="dropdown-item" href="#">انگلیسی </a></li>
                            <li><a class="dropdown-item" href="#">فرانسوی</a></li>
                        </ul>
                    </div>
                    <!-- Links -->
                    <ul class="nav text-center text-sm-end justify-content-center justify-content-center mt-3 mt-md-0">
                        <li class="nav-item"><a class="nav-link" href="#">شرایط</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">قوانین</a></li>
                        <li class="nav-item"><a class="nav-link pe-0" href="#">کوکی</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/apexcharts/js/apexcharts.min.js"></script>
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/quill/js/quill.min.js"></script>

<!-- Template Functions -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/js') }}/functions.js"></script>

</body>

</html>
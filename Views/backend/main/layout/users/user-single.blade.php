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
            if(el != 'undefined' && el != null) {
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
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/overlay-scrollbar/css/OverlayScrollbars.min.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/css') }}/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
{{ $view->make('backend/main/layout/preloader') }}
<!-- Preloader END -->
<!-- =======================
Header START -->

<!-- =======================
Header END -->
{!! $header !!}
<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- =======================
    Author single START -->
    <section class="pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <!-- Grid START -->
                    <div class="row g-4">

                        <!-- Earning item -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                                <h6 class="h4">درآمد
                                    <a tabindex="0" class="h6 mb-0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="با احتساب کسر سود 30% سایت" data-bs-original-title="" title="">
                                        <i class="bi bi-info-circle-fill small"></i>
                                    </a>
                                </h6>
                                <h2 class="fs-2 text-success">752000 تومان</h2>
                                <p class="mb-2"><span class="text-primary me-1">0.20%<i class="bi bi-arrow-up"></i></span>نسبت به ماه گذشته</p>
                                <div class="mt-auto"><a href="#" class="btn btn-link text-reset p-0 mb-0">مشاهده</a></div>
                            </div>
                        </div>

                        <!-- Grid item -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card card-body bg-info bg-opacity-10 p-4 h-100">
                                <h6 class="h4">بازدید ماهیانه</h6>
                                <h2 class="fs-2 text-info">356</h2>
                                <p class="mb-2"><span class="text-danger me-1">07<i class="bi bi-arrow-down"></i></span>از ماه گذشته</p>
                                <div class="mt-auto"><a href="#" class="btn btn-link text-reset p-0 mb-0">مشاهده گزارش</a></div>
                            </div>
                        </div>

                        <!-- Grid item -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
                                <h6 class="h4">تعداد اخبار</h6>
                                <h2 class="fs-5 text-warning">56</h2>
                                <div class="mt-auto"><a href="#" class="btn btn-link text-reset p-0 mb-0">مشاهده اخبار</a></div>
                            </div>
                        </div>

                        <!-- Grid item -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
                                <h6 class="h4">دنبال کننده ها</h6>
                                <h2 class="fs-2 text-primary">1,586</h2>
                                <p class="mb-2"><span class="text-success me-1">15<i class="bi bi-arrow-up"></i></span>از ماه گذشته</p>
                                <div class="mt-auto"><a href="#" class="btn btn-link text-reset p-0 mb-0">مدیریت</a></div>
                            </div>
                        </div>

                    </div>
                    <!-- Grid END -->
                </div>

                <div class="col-lg-8">
                    <!-- Chart START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
                            <h4 class="card-header-title mb-0">{{ $lang['about-user'] }}</h4>
                        </div>

                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-sm-between align-items-center mb-4">
                                <!-- Avatar detail -->
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-lg">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ route('/') . $user->photo }}" alt="">
                                    </div>
                                    <!-- Info -->
                                    <div class="ms-3">
                                        <h5 class="mb-0">{{ $user->first_name . ' ' . $user->last_name }}</h5>
                                        <p class="mb-0 small">
                                            @if($user->user_type == 'user')
                                                {{ $lang['user'] . ' ' . $lang['site'] }}
                                            @elseif($user->user_type == 'admin')
                                                {{ $lang['admin'] . ' ' . $lang['site'] }}
                                            @else
                                                {{ $lang['fulladmin'] . ' ' . $lang['site'] }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <!-- Tags -->
                                <div class="d-flex mt-2 mt-sm-0">
                                    <h6 class="bg-danger py-2 px-3 text-white rounded">{{ $user->followers . ' ' . $lang['followerr'] }}</h6>
                                    <h6 class="bg-info py-2 px-3 text-white rounded ms-2">{{ count($posts->get()) . ' ' . $lang['post'] }}</h6>
                                </div>
                            </div>

                            <!-- Information START -->
                            <div class="row">
                                <!-- Information item -->
                                <div class="col-md-6">
                                    <ul class="list-group list-group-borderless">
                                        <!-- Title -->
                                        <li class="list-group-item">
                                            <span>عنوان:</span>
                                            <span class="h6 mb-0">آقای</span>
                                        </li>
                                        <!-- Full Name -->
                                        <li class="list-group-item">
                                            <span>{{ $lang['full-name:'] }}</span>
                                            <span class="h6 mb-0">{{ $user->first_name . ' ' . $user->last_name }}</span>
                                        </li>
                                        <!-- User Name -->
                                        <li class="list-group-item">
                                            <span>{{ $lang['username:'] }}</span>
                                            <span class="h6 mb-0">{{ $user->username }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Information item -->
                                <div class="col-md-6">
                                    <ul class="list-group list-group-borderless">
                                        <!-- Email ID -->
                                        <li class="list-group-item">
                                            <span>{{ $lang['email:'] }}</span>
                                            <span class="h6 mb-0">{{ $user->email }}</span>
                                        </li>
                                        <!-- Mobile Number -->
                                        <li class="list-group-item">
                                            <span>شماره همراه:</span>
                                            <span class="h6 mb-0">09380418756</span>
                                        </li>
                                        <!-- Joining Date -->
                                        <li class="list-group-item">
                                            <span>{{ $lang['subscription-date:'] }}</span>
                                            <span class="h6 mb-0">{{ $user->subscription_date }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Information item -->
                                <div class="col-12">
                                    <ul class="list-group list-group-borderless">
                                        <!-- Description -->
                                        <li class="list-group-item">
                                            <span>توضیحات:</span>
                                            <p class="h6 mb-0">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Information END -->
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>

                <div class="col-md-6 col-lg-4">
                    <!-- Popular blog START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">اخبار محبوب این ماه</h4>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-3">

                            <div class="row">
                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/1by1/01.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">رازهای کوچک کثیف در مورد صنعت تجارت</a>
                                            <p class="small mb-0"><i class="far fa-eye me-1"></i> 2344 بازدید</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/1by1/02.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">فیلم‌های بالیوودی الگوی ضدانقلاب شده</a>
                                            <p class="small mb-0"><i class="far fa-eye me-1"></i> 4586 بازدید</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/1by1/03.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">رونمایی از طرح بزرگترین تلسکوپ نوری</a>
                                            <p class="small mb-0"><i class="far fa-eye me-1"></i> 3456 بازدید</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Blog item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <img class="w-60 rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/1by1/04.jpg" alt="product">
                                        <div class="ms-3">
                                            <a href="#" class="h6 stretched-link">هشدار درباره یک بیماری حاد تنفسی</a>
                                            <p class="small mb-0"><i class="far fa-eye me-1"></i> 6586 بازدید</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Card body END -->

                        <!-- Card footer -->
                        <div class="card-footer border-top text-center p-3">
                            <a href="#">مشاهده همه</a>
                        </div>

                    </div>
                    <!-- Popular blog END -->
                </div>

                <div class="col-md-6 col-lg-4">
                    <!-- Recent comment START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header border-bottom p-3">
                            <h4 class="card-header-title mb-0">آخرین نظرات</h4>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body p-3">

                            <div class="row">
                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/06.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با الهام کریمی</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/08.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با سارا موحد</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/04.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با سهراب رضایی</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-3">

                                <!-- Comment item -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-lg flex-shrink-0">
                                            <img class="avatar-img rounded-2" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/05.jpg" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-3">
                                            <p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
                                            <div class="d-flex justify-content-between">
                                                <p class="small mb-0">با نگین جوان</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Recent comment END -->
                </div>

                <div class="col-lg-8">
                    <!-- Chart START -->
                    <div class="card border h-100">
                        <!-- Card header -->
                        <div class="card-header p-3 border-bottom">
                            <h4 class="card-header-title mb-0">گزارش درآمد ماهیانه</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Apex chart -->
                            <div id="apexChartTrafficStats" class="mt-2"></div>
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>

                <div class="col-12">
                    <!-- Blog post table START -->
                    <div class="card border bg-transparent rounded-3">
                        <!-- Card header START -->
                        <div class="card-header bg-transparent border-bottom p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-2 mb-sm-0">لیست اخبار <span class="badge bg-primary bg-opacity-10 text-primary">105</span></h4>
                                <a href="#" class="btn btn-sm btn-primary mb-0">ثبت خبر جدید</a>
                            </div>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">

                            <!-- Search and select START -->
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <!-- Search -->
                                <div class="col-md-8">
                                    <form class="rounded position-relative">
                                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو" aria-label="Search">
                                        <button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                                    </form>
                                </div>

                                <!-- Select option -->
                                <div class="col-md-3">
                                    <!-- Short by filter -->
                                    <form>
                                        <select class="form-select z-index-9 bg-transparent" aria-label=".form-select-sm">
                                            <option value="">مرتب سازی</option>
                                            <option>رایگان</option>
                                            <option>جدیدترین</option>
                                            <option>قدیمی ترین</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- Search and select END -->

                            <!-- Blog post table START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">عنوان خبر</th>
                                        <th scope="col" class="border-0">تاریخ</th>
                                        <th scope="col" class="border-0">تاریخ انتشار</th>
                                        <th scope="col" class="border-0">دسته بندی</th>
                                        <th scope="col" class="border-0">وضعیت</th>
                                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">حضور ایرانسل در رویداد فناورانه خودروهای آینده</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>22 آذر، 1400</td>
                                        <!-- Table data -->
                                        <td>2568</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-success bg-opacity-10 text-success mb-2">تایید شده</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">رازهای کوچک کثیف در مورد صنعت تجارت</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>19 مرداد، 1400</td>
                                        <!-- Table data -->
                                        <td>8965</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-warning bg-opacity-15 text-warning mb-2">در انتظار</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">طرح مجلس برای گرفتن مالیات از سفته بازها</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>11 دی، 1400</td>
                                        <!-- Table data -->
                                        <td>2456</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>رسانه</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-success bg-opacity-10 text-success mb-2">تایید شده</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">رونمایی از طرح بزرگترین تلسکوپ نوری آسیا</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>22 آذر، 1400</td>
                                        <!-- Table data -->
                                        <td>4569</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-success bg-opacity-10 text-success mb-2">تایید شده</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>22 آذر، 1400</td>
                                        <!-- Table data -->
                                        <td>6589</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>فیلم</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-danger bg-opacity-10 text-danger mb-2">کنسل</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="table-title mt-2 mt-md-0 mb-0"><a href="#">سال 2022 رویایی و فوق العاده برای طارمی</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>22 آذر، 1400</td>
                                        <!-- Table data -->
                                        <td>2895</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <span class="badge bg-success bg-opacity-10 text-success mb-2">تایید شده</span>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Blog post table END -->

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                                <!-- Content -->
                                <p class="mb-sm-0 text-center text-sm-start">نمایش 1 تا 8 از 20</p>
                                <!-- Pagination -->
                                <nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
                                    <ul class="pagination pagination-sm pagination-bordered mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#">..</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">بعد</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- Blog post table END -->
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
{{ $view->make('backend/main/layout/footer') }}
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
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/overlay-scrollbar/js/OverlayScrollbars.min.js"></script>

<!-- Template Functions -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/js') }}/functions.js"></script>

</body>

</html>
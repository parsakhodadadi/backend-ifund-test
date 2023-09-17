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
{!! $header !!}
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Author list START -->
    <section class="py-4">
        <div class="container">
            <!-- Author list title START -->
            <div class="row g-4 pb-4">
                <div class="col-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h1 class="mb-sm-0 h3">{{ $lang['users-list'] }}</h1>
                        <a href="#" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>ثبت نویسنده جدید</a>
                    </div>
                </div>
            </div>
            <!-- Author list title START -->
            <div class="row g-4">
                <div class="col-12">
                    <!-- Card START -->
                    <div class="card border">
                        <!-- Card header START -->
                        <div class="card-header border-bottom p-3">
                            <!-- Search and select START -->
                            <div class="row g-3 align-items-center justify-content-between">
                                <!-- Search bar -->
                                <div class="col-md-8">
                                    <form class="rounded position-relative">
                                        <input class="form-control bg-transparent" type="search" placeholder="جستجو" aria-label="Search">
                                        <button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                                    </form>
                                </div>
                                <!-- Tab buttons -->
                                <div class="col-md-3">
                                    <!-- Tabs START -->
                                    <ul class="list-inline mb-0 nav nav-pills nav-pill-dark-soft border-0 justify-content-end" id="pills-tab" role="tablist">
                                        <!-- Grid tab -->
                                        <li class="nav-item">
                                            <a href="#nav-list-tab" class="nav-link mb-0 me-2 active" data-bs-toggle="tab">
                                                <i class="fas fa-fw fa-list-ul"></i>
                                            </a>
                                        </li>
                                        <!-- List tab -->
                                        <li class="nav-item">
                                            <a href="#nav-grid-tab" class="nav-link mb-0" data-bs-toggle="tab">
                                                <i class="fas fa-fw fa-th-large"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tabs end -->
                                </div>
                            </div>
                            <!-- Search and select END -->
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body p-3 pb-0">
                            <!-- Tabs content START -->
                            <div class="tab-content py-0 my-0">

                                <!-- Tabs content item START -->
                                <div class="tab-pane fade show active" id="nav-list-tab">
                                    <!-- Table START -->
                                    <div class="table-responsive border-0">
                                        <table class="table align-middle p-4 mb-0 table-hover">
                                            <!-- Table head -->
                                            <thead class="table-dark">
                                            <tr>
                                                <th scope="col" class="border-0 rounded-start">{{ $lang['user-full-name'] }}</th>
                                                <th scope="col" class="border-0">{{ $lang['user-type'] }}</th>
                                                <th scope="col" class="border-0">{{ $lang['subscription-date'] }}</th>
                                                <th scope="col" class="border-0">{{ $lang['posts-count'] }}</th>
                                                <th scope="col" class="border-0">{{ $lang['followers'] }}</th>
                                                <th scope="col" class="border-0">{{ $lang['status'] }}</th>
                                                <th scope="col" class="border-0 rounded-end">{{ $lang['action'] }}</th>
                                            </tr>
                                            </thead>

                                            <!-- Table body START -->
                                            <tbody class="border-top-0">
                                            <!-- Table row -->
                                            @foreach($users as $user)
                                                <tr>
                                                    <!-- Table data -->
                                                    <td>
                                                        <div class="d-flex align-items-center position-relative">
                                                            <!-- Image -->
                                                            <div class="avatar avatar-md">
                                                                <img src="{{ route('/') . $user->photo }}" class="rounded-circle" alt="">
                                                            </div>
                                                            <div class="mb-0 ms-2">
                                                                <!-- Title -->
                                                                <h6 class="mb-0"><a href="{{ route('/panel/users-management/') . $user->id }}" class="stretched-link">{{ $user->first_name . ' ' . $user->last_name }}</a></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($user->user_type == 'fulladmin')
                                                            {{ $lang['fulladmin'] }}
                                                        @elseif($user->user_type == 'admin')
                                                            {{ $lang['admin'] }}
                                                        @else
                                                            {{ $lang['user'] }}
                                                        @endif
                                                    </td>
                                                    <!-- Table data -->
                                                    <td>{{ $user->subscription_date }}</td>
                                                    <!-- Table data -->
                                                    <td>{{ count($posts->get(['user_id' => $user->id])) }}</td>
                                                    <!-- Table data -->
                                                    <td>{{ $user->followers }}</td>
                                                    <!-- Table data -->
                                                    <td>
                                                        @if($user->blocked == 'yes')
                                                            <span class="badge bg-danger bg-opacity-10 text-danger mb-2">{{ $lang['blocked'] }}</span>
                                                        @else
                                                            <span class="badge bg-success bg-opacity-10 text-success mb-2">{{ $lang['active'] }}</span>
                                                        @endif
                                                    </td>
                                                    <!-- Table data -->
                                                    <td>
                                                        @if($user->user_type != 'fulladmin')
                                                            @if(!($user->user_type == 'admin' && $currentUser->user_type == 'admin'))
                                                                <div class="d-flex gap-2">
                                                                    <a href="{{ route('') }}" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Message" aria-label="Message">
                                                                        <i class="bi bi-envelope"></i>
                                                                    </a>
                                                                    @if($user->blocked == 'no')
                                                                        <a href="{{ route('/panel/users-management/block/') . $user->id }}" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Block" aria-label="Block">
                                                                            <i class="fas fa-ban"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('/panel/users-management/block/') . $user->id }}" class="btn btn-danger-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Block" aria-label="Block">
                                                                            <i class="fas fa-ban"></i>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <!-- Table body END -->
                                        </table>
                                    </div>
                                    <!-- Table END -->
                                </div>
                                <!-- Tabs content item END -->

                                <!-- Tabs content item START -->
                                <div class="tab-pane fade" id="nav-grid-tab">
                                    <div class="row g-4">
                                        @foreach($users as $user)
                                            <!-- Card item START -->
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card border p-2">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <!-- avatar -->
                                                            <div class="avatar avatar-lg me-3 flex-shrink-0">
                                                                <img class="avatar-img rounded-circle" src="{{ route('/') . $user->photo }}" alt="">
                                                            </div>
                                                            <!-- Connections holder -->
                                                            <div class="flex-grow-1 d-block">
                                                                <h5 class="mb-1"><a href="#">{{ $user->first_name . ' ' . $user->last_name }}</a></h5>
                                                                <div class="small">
                                                                    @if($user->user_type == 'user')
                                                                        {{ $lang['user']  }}
                                                                    @elseif($user->user_type == 'admin')
                                                                        {{ $lang['admin']  }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Followers and Post -->
                                                        <div class="d-sm-flex justify-content-sm-between mt-3">
                                                            <!-- Followers -->
                                                            <div class="d-flex text-start align-items-center mt-3">
                                                                <div class="icon-md bg-light text-body rounded-circle flex-shrink-0">
                                                                    <i class="bi bi-people-fill fa-fw"></i>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mb-0">{{ $user->followers }}</h5>
                                                                    <h6 class="mb-0 fw-light">{{ $lang['follower'] }}</h6>
                                                                </div>
                                                            </div>

                                                            <!-- Total post -->
                                                            <div class="d-flex text-start align-items-center mt-3">
                                                                <div class="icon-md bg-light text-body rounded-circle flex-shrink-0">
                                                                    <i class="bi bi-file-earmark-text-fill fa-fw"></i>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mb-0">{{ count($posts->get(['user_id' => $user->id])) }}</h5>
                                                                    <h6 class="mb-0 fw-light">{{ $lang['posts-count'] }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Buttons -->
                                                        <div class="d-sm-flex gap-2 mt-4">
                                                            <a href="#" class="btn btn-primary-soft w-100">
                                                                <i class="fab fa-facebook-messenger pe-2"></i>{{ $lang['send-message'] }}
                                                            </a>
                                                            <a href="{{ route('/panel/users-management/block/') . $user->id }}" class="btn btn-danger-soft w-100">
                                                                <i class="fas fa-ban pe-2"></i>
                                                                @if($user->blocked == 'no')
                                                                    {{ $lang['block'] }}
                                                                @else
                                                                    {{ $lang['unblock'] }}
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card item END -->
                                        @endforeach
                                    </div> <!-- Row END -->
                                </div>
                                <!-- Tabs content item END -->

                            </div>
                            <!-- Tabs content END -->
                        </div>
                        <!-- Card body END -->

                        <!-- Card Footer START -->
                        <div class="card-footer p-3">
                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
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
                        <!-- Card Footer END -->
                    </div>
                    <!-- Card END -->
                </div>

                <div class="col-12">
                    <!-- Card START -->
                    <div class="card border">

                        <!-- Card header START -->
                        <div class="card-header border-bottom p-3">
                            <h5 class="mb-2 mb-sm-0">درخواست های جدید</h5>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body p-3">
                            <!-- Table START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-hover">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">نام نویسنده</th>
                                        <th scope="col" class="border-0">تاریخ</th>
                                        <th scope="col" class="border-0">نام شرکت</th>
                                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table row -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <!-- Image -->
                                                <div class="avatar avatar-md">
                                                    <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/04.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">سهراب نوری</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td>22 خرداد 1400</td>
                                        <!-- Table data -->
                                        <td>تابناک</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success-soft me-1 mb-1 mb-lg-0">پذیرفتن</a>
                                            <a href="#" class="btn btn-sm btn-secondary-soft me-1 mb-1 mb-lg-0">رد</a>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-0">مشاهده</a>
                                        </td>
                                    </tr>

                                    <!-- Table row -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <!-- Image -->
                                                <div class="avatar avatar-md">
                                                    <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/05.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">نیلوفر حقیقت نژاد</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td>29 آذر 1400</td>
                                        <!-- Table data -->
                                        <td>مشرق نیوز</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success-soft me-1 mb-1 mb-lg-0">پذیرفتن</a>
                                            <a href="#" class="btn btn-sm btn-secondary-soft me-1 mb-1 mb-lg-0">رد</a>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-0">مشاهده</a>
                                        </td>
                                    </tr>

                                    <!-- Table row -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <!-- Image -->
                                                <div class="avatar avatar-md">
                                                    <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/06.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">فاطمه قنبرزاده</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td class="text-center text-sm-start">25 مهر 1400</td>
                                        <!-- Table data -->
                                        <td>تسنیم</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0 disabled">پذیرفته شده</a>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">مشاهده</a>
                                        </td>
                                    </tr>

                                    <!-- Table row -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex align-items-center position-relative">
                                                <!-- Image -->
                                                <div class="avatar avatar-md">
                                                    <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/07.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="mb-0 ms-2">
                                                    <!-- Title -->
                                                    <h6 class="mb-0"><a href="#" class="stretched-link">نیلوفر خالدی</a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Table data -->
                                        <td>14 دی 1400</td>
                                        <!-- Table data -->
                                        <td>خبر آنلاین</td>
                                        <!-- Table data -->
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary me-1 mb-1 mb-md-0 disabled">رد شده</a>
                                            <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">مشاهده</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Table END -->
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Author list END -->

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
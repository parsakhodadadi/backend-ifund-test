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

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/css') }}/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<div class="preloader">
    <div class="loader">
        <div class="sh1"></div>
        <div class="sh2"></div>
    </div>
</div>
<!-- Preloader END -->

<!-- =======================
Header START -->
{{ $view->make('frontend/main/layout/header') }}
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- Divider -->
    <div class="border-bottom border-primary border-1 opacity-1"></div>

    <!-- =======================
    Inner intro START -->
    <section class="pb-3 pb-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="badge text-bg-danger mb-2"><i
                                class="fas fa-circle me-2 small fw-bold"></i>{{ $category->title }}</a>
                    <h1>{{ $post->title }}</h1>
                </div>
                <p class="lead">{{ $post->description }}</p>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Main START -->
    <section class="pt-0">
        <div class="container position-relative" data-sticky-container>
            <div class="row">
                <!-- Left sidebar START -->
                <div class="col-lg-2">
                    <div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
                        <!-- Author info -->
                        <div class="position-relative">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img rounded-circle" src="{{ route('/') . $ownerUser->photo }}"
                                     alt="avatar">
                            </div>
                            <a href="#"
                               class="h5 stretched-link mt-2 mb-0 d-block">{{ $ownerUser->first_name . ' ' . $ownerUser->last_name }}</a>
                            <p>
                                @if($ownerUser->user_type == 'fulladmin')
                                    {{ __('posts.fulladmin') }}
                                @else
                                    {{ __('posts.admin') }}
                                @endif
                            </p>
                        </div>
                        <hr class="d-none d-lg-block">
                        <!-- Card info -->
                        <ul class="list-inline list-unstyled">
                            <li class="list-inline-item d-lg-block my-lg-2">{{ $post->date . ' ' . $post->time }}</li>
                            <li class="list-inline-item d-lg-block my-lg-2">5 دقیقه زمان مطالعه</li>
                            <li class="list-inline-item d-lg-block my-lg-2"><a href="#" class="text-body"><i
                                            class="far fa-heart me-1"></i></a> 266
                            </li>
                            <li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> 2344 بازدید
                            </li>
                        </ul>
                        <!-- Tags -->
                        <ul class="list-inline text-primary-hover mt-0 mt-lg-3">
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#ورزش</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#فیلم</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#رسانه</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#برگزیده</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body" href="#">#استارت آپ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Left sidebar END -->
                <!-- Main Content START -->
                <div class="col-lg-7 mb-5">
                    <!-- Image -->
                    <figure class="figure mt-2">
                        <a href="{{ route('/') . $post->photo }}" data-glightbox data-gallery="image-popup">
                            <img class="rounded" src="{{ route('/') . $post->photo }}" alt="Image">
                        </a>
                    </figure>
                    <p>
                    </p>

                    <!-- Divider -->
                    <div class="text-center h5 mb-4">. . .</div>

                    {{--                    <!-- Images -->--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-6 mb-4">--}}
                    {{--                            <a href="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/03.jpg" data-glightbox data-gallery="image-popup">--}}
                    {{--                                <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/03.jpg" alt="Image">--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-md-6 mb-4">--}}
                    {{--                            <a href="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/04.jpg" data-glightbox data-gallery="image-popup">--}}
                    {{--                                <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/04.jpg" alt="Image">--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <p>برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>--}}

                    {{--                    <h3 class="mt-4">شعار مولد در مورد تجارت</h3>--}}
                    {{--                    <div class="row mb-4">--}}
                    {{--                        <div class="col-md-6">--}}
                    {{--                            <p>چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت.--}}
                    {{--                            </p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-md-6">--}}
                    {{--                            <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <p>وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد در پرتو آن نیرومند می‌شوند و در سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند و خوشبخت و سرافراز باشند ولی به زودی می‌ فهمند که اشتباه کرده‌ اند و عظمت هر ملتی بر روی خرابه‌ های وطن خودش می‌باشد و بس!</p>--}}

                    {{--                    <!-- blockquote -->--}}
                    {{--                    <figure class="my-5">--}}
                    {{--                        <blockquote class="blockquote">--}}
                    {{--                            <p>در سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند و خوشبخت و سرافراز باشند.</p>--}}
                    {{--                        </blockquote>--}}
                    {{--                        <figcaption class="blockquote-footer">--}}
                    {{--                            حسین صادقی--}}
                    {{--                        </figcaption>--}}
                    {{--                    </figure>--}}

                    {{--                    <p> تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>--}}

                    {{--                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/thumb/03.jpg" class="rounded float-start me-3 mt-3" alt="..."> استفاده از این متن تستی می تواند سرعت پیشرفت پروژه را افزایش دهد، و طراحان به جای تایپ و نگارش متن می توانند تنها با یک کپی و پست این متن را در کادرهای مختلف جایگزین نمائید. این نوشته توسط سایت لورم ایپسوم فارسی نگاشته شده است. این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، استفاده از این متن تستی می تواند سرعت پیشرفت پروژه را افزایش دهد، و طراحان به جای تایپ و نگارش متن می توانند تنها با یک کپی و پست این متن را در کادرهای مختلف جایگزین نمائید.--}}
                    {{--                        <mark> ممکن است طولانی‌ تر در یک حباب صابون می‌ دمیم تا بزرگتر شود، گر چه با قطعیتی تمام می‌ دانیم که خواهد ترکید.</mark> در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. </p>--}}

                    {{--                    <!-- Light bg content -->--}}
                    {{--                    <div class="bg-light p-3 p-md-4">--}}
                    {{--                        <q class="lead"> گواهی است که در آن بازیِ بود و نمود هیچ‌ جایی ندارد. پس من در مسرتِ عشق ورزیدن به یک ناشناس غرق می‌شوم، کسی که تا ابد ناشناس خواهد ماند. سِیری عارفانه: من آن‌چه را نمی‌شناسم می‌شناسم...!</q>--}}
                    {{--                    </div>--}}

                    {{--                    <!-- twitter embed code -->--}}
                    {{--                    <div class="mx-auto w-100 d-flex justify-content-center my-5">--}}
                    {{--                        <blockquote class="twitter-tweet"><p>این راست نیست که هرچه عاشق‌ تر باشی بهتر درک می‌کنی. همه‌ی آنچه عشق و عاشقی از من می‌ خواهد فقط درکِ این حکمت است: دیگری نشناختنی است؛ ماتیِ او پرده‌ی ابهامی به روی یک راز نیست، بل گواهی است که در آن بازیِ بود و نمود هیچ‌ جایی ندارد.<a href="#"> https://www.rtl-theme.com</a></p>&mdash; راست چین (فروش قالب) <a href="#">23 بهمن، 1400</a></blockquote> <script async src="../../platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
                    {{--                    </div>--}}

                    {{--                    <h3>چرا بوت استرپ اینقدر معروف است؟</h3>--}}
                    {{--                    <p>با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>--}}
                    {{--                    <a href="#" class="btn btn-primary-soft">دانلود!</a>--}}

                    {{--                    <!-- Divider -->--}}
                    {{--                    <div class="text-center h5 mb-4">. . .</div>--}}

                    {{--                    <h3>معرفی فرم ورک های برتر جهان</h3>--}}
                    {{--                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>--}}

                    {{--                    <div class="row g-0">--}}
                    {{--                        <div class="col-sm-6 bg-primary bg-opacity-10 p-4 position-relative border-end border-1 rounded-start">--}}
                    {{--                            <span><i class="bi bi-arrow-left me-3 rtl-flip"></i>خبر قبل</span>--}}
                    {{--                            <h5 class="m-0"><a href="#" class="stretched-link btn-link text-reset">دلیل کاهش نرخ دلار</a></h5>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-sm-6 bg-primary bg-opacity-10 p-4 position-relative text-sm-end rounded-end">--}}
                    {{--                            <span>خبر بعد<i class="bi bi-arrow-right ms-3 rtl-flip"></i></span>--}}
                    {{--                            <h5 class="m-0"><a href="#" class="stretched-link btn-link text-reset">جدول لیگ در پایان هفته</a></h5>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <!-- Related post START -->--}}
                    {{--                    <div class="mt-5">--}}
                    {{--                        <h3 class="my-3"><i class="bi bi-symmetry-vertical me-2"></i>اخبار مشابه</h3>--}}
                    {{--                        <div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round">--}}
                    {{--                            <div class="tiny-slider-inner"--}}
                    {{--                                 data-autoplay="true"--}}
                    {{--                                 data-hoverpause="true"--}}
                    {{--                                 data-gutter="24"--}}
                    {{--                                 data-arrow="true"--}}
                    {{--                                 data-dots="false"--}}
                    {{--                                 data-items-xl="2"--}}
                    {{--                                 data-items-xs="1">--}}

                    {{--                                <!-- Card item START -->--}}
                    {{--                                <div class="card">--}}
                    {{--                                    <!-- Card img -->--}}
                    {{--                                    <div class="position-relative">--}}
                    {{--                                        <img class="card-img" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/07.jpg" alt="Card image">--}}
                    {{--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">--}}
                    {{--                                            <!-- Card overlay Top -->--}}
                    {{--                                            <div class="w-100 mb-auto d-flex justify-content-end">--}}
                    {{--                                                <div class="text-end ms-auto">--}}
                    {{--                                                    <!-- Card format icon -->--}}
                    {{--                                                    <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle" title="8.5 rating">8.5</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <!-- Card overlay bottom -->--}}
                    {{--                                            <div class="w-100 mt-auto">--}}
                    {{--                                                <a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>سیاست</a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="card-body px-0 pt-3">--}}
                    {{--                                        <h5 class="card-title"><a href="post-single-2.html" class="btn-link text-reset stretched-link">طرح مجلس برای گرفتن مالیات از سفته بازها</a></h5>--}}
                    {{--                                        <!-- Card info -->--}}
                    {{--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">--}}
                    {{--                                            <li class="nav-item">--}}
                    {{--                                                <div class="nav-link">--}}
                    {{--                                                    <div class="d-flex align-items-center position-relative">--}}
                    {{--                                                        <div class="avatar avatar-xs">--}}
                    {{--                                                            <img class="avatar-img rounded-circle" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/07.jpg" alt="avatar">--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">مریم ترابی</a></span>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li class="nav-item">7 دی، 1400</li>--}}
                    {{--                                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <!-- Card item END -->--}}
                    {{--                                <!-- Card item START -->--}}
                    {{--                                <div class="card">--}}
                    {{--                                    <!-- Card img -->--}}
                    {{--                                    <div class="position-relative">--}}
                    {{--                                        <img class="card-img" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/08.jpg" alt="Card image">--}}
                    {{--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">--}}
                    {{--                                            <!-- Card overlay bottom -->--}}
                    {{--                                            <div class="w-100 mt-auto">--}}
                    {{--                                                <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="card-body px-0 pt-3">--}}
                    {{--                                        <h5 class="card-title"><a href="post-single-2.html" class="btn-link text-reset stretched-link">آمار فرزندان حاصل از روش‌های کمک‌ باروری</a></h5>--}}
                    {{--                                        <!-- Card info -->--}}
                    {{--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">--}}
                    {{--                                            <li class="nav-item">--}}
                    {{--                                                <div class="nav-link">--}}
                    {{--                                                    <div class="d-flex align-items-center position-relative">--}}
                    {{--                                                        <div class="avatar avatar-xs">--}}
                    {{--                                                            <img class="avatar-img rounded-circle" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/08.jpg" alt="avatar">--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">سارا موحد</a></span>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li class="nav-item">15 مهر، 1400</li>--}}
                    {{--                                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <!-- Card item END -->--}}
                    {{--                                <!-- Card item START -->--}}
                    {{--                                <div class="card">--}}
                    {{--                                    <!-- Card img -->--}}
                    {{--                                    <div class="position-relative">--}}
                    {{--                                        <img class="card-img" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/09.jpg" alt="Card image">--}}
                    {{--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">--}}
                    {{--                                            <!-- Card overlay bottom -->--}}
                    {{--                                            <div class="w-100 mt-auto">--}}
                    {{--                                                <a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="card-body px-0 pt-3">--}}
                    {{--                                        <h5 class="card-title"><a href="post-single-2.html" class="btn-link text-reset stretched-link">سال 2022 رویایی و فوق العاده برای طارمی</a></h5>--}}
                    {{--                                        <!-- Card info -->--}}
                    {{--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">--}}
                    {{--                                            <li class="nav-item">--}}
                    {{--                                                <div class="nav-link">--}}
                    {{--                                                    <div class="d-flex align-items-center position-relative">--}}
                    {{--                                                        <div class="avatar avatar-xs">--}}
                    {{--                                                            <img class="avatar-img rounded-circle" src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/09.jpg" alt="avatar">--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <span class="ms-3">با <a href="#" class="stretched-link text-reset btn-link">لیلا رزاق</a></span>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </li>--}}
                    {{--                                            <li class="nav-item">1 تیر، 1400</li>--}}
                    {{--                                        </ul>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <!-- Card item END -->--}}
                    {{--                            </div>--}}
                    {{--                        </div> <!-- Slider END -->--}}
                    {{--                    </div>--}}
                    <!-- Related post END -->

                    <!-- Divider -->
                    <hr>
                    <!-- Author info START -->
                    <div class="d-flex py-4">
                        <!-- Avatar -->
                        <a href="#">
                            <div class="avatar avatar-xxl me-4">
                                <img class="avatar-img rounded-circle" src="{{ route('/') . $ownerUser->photo }}"
                                     alt="avatar">
                            </div>
                        </a>
                        <!-- Info -->
                        <div>
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="m-0"><a href="#" class="text-reset">

                                        </a>
                                    </h4>
                                    <small>
                                        @if($ownerUser->user_type == 'fulladmin')
                                            {{ __('posts.fulladmin-aaron') }}
                                        @else
                                            {{ __('posts.admin-aaron') }}
                                        @endif
                                    </small>
                                </div>
                                <a href="#" class="btn btn-xs btn-primary-soft">مشاهده اخبار</a>
                            </div>
                            <p class="my-2">مهدی علیزاده سردبیر ارشد این وبلاگ است و همچنین اخبار فوری مستقر در لندن را
                                گزارش می دهد. او از سال 2015 درباره دولت، عدالت کیفری و نقش پول در سیاست نوشته است.</p>
                            <!-- Social icons -->
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 pe-2 fs-5" href="#"><i
                                                class="fab fa-facebook-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Author info END -->

                    <!-- Divider -->
                    <hr>

                    <!-- Comments START -->
                    <div>
                        <h3>
                            @php($num = 0)
                            @foreach($comments as $comment)
                                @php($num++)
                            @endforeach
                            {{ $num . ' ' . __('comments.comment')}}
                        </h3>
                        <!-- Comment level 1-->
                        @foreach($comments as $comment)
                            <div class="my-4 d-flex">
                                <img class="avatar avatar-md rounded-circle float-start me-3"
                                     src="{{ route('/') . current($users->get(['id' => $comment->user_id]))->photo }}"
                                     alt="avatar">
                                <div>
                                    <div class="mb-2">
                                        <h5 class="m-0">{{ current($users->get(['id' => $comment->user_id]))->first_name . ' ' . current($users->get(['id' => $comment->user_id]))->last_name }}</h5>
                                        <span class="me-3 small">{{ $comment->date . ' ' . $comment->time }}</span>
                                        <a href="{{ route('/') . 'posts/' . $post->id . '/reply/' . $comment->id }}" class="text-body fw-normal">{{ __('comments.reply') }}</a>
                                    </div>
                                    <p> {{ $comment->text }}</p>
                                </div>
                            </div>
                            @foreach($replyComments->get(['status' => 'approved', 'post_comment_id' => $comment->id]) as $replyComment)
                                <div class="my-4 d-flex ps-2 ps-md-3">
                                    <img class="avatar avatar-md rounded-circle float-start me-3"
                                         src="{{ route('/') . current($users->get(['id' => $replyComment->user_id]))->photo }}"
                                         alt="avatar">
                                    <div>
                                        <div class="mb-2">
                                            <h5 class="m-0">{{ current($users->get(['id' => $replyComment->user_id]))->first_name . ' ' . current($users->get(['id' => $replyComment->user_id]))->last_name }}</h5>
                                            <span class="me-3 small">21{{ $replyComment->date . ' ' . $replyComment->time }}</span>
                                        </div>
                                        <p>
                                            {{ $replyComment->text }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <!-- Comment children level 3 -->
                        <div class="my-4 d-flex ps-3 ps-md-5">
                            <img class="avatar avatar-md rounded-circle float-start me-3"
                                 src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/avatar/01.jpg"
                                 alt="avatar">
                            <div>
                                <div class="mb-2">
                                    <h5 class="m-0">مونا شاه حسینی</h5>
                                    <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                    <a href="#" class="text-body fw-normal">پاسخ</a>
                                </div>
                                <p>در نهایت این مرگ است که باید پیروز شود، زیرا از هنگام تولد بخشی از سرنوشت ما شده و
                                    فقط مدت کوتاهی پیش از بلعیدن طعمه اش، با آن بازی می کند.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Comments END -->
                    <!-- Reply START -->
                    <div>
                        <h3>ثبت دیدگاه</h3>
                        <small>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی علامت گذاری شده اند *</small>
                        <form action="{{ route('/') . $action }}" method="post"
                              class="row g-3 mt-2">
                            {{--                            <div class="col-md-6">--}}
                            {{--                                <label class="form-label">نام *</label>--}}
                            {{--                                <input type="text" class="form-control" aria-label="First name">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-6">--}}
                            {{--                                <label class="form-label">ایمیل *</label>--}}
                            {{--                                <input type="email" class="form-control">--}}
                            {{--                            </div>--}}
                            <!-- custom checkbox -->
                            {{--                            <div class="col-md-12">--}}
                            {{--                                <div class="form-check">--}}
                            {{--                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">--}}
                            {{--                                    <label class="form-check-label" for="flexCheckDefault">برای دفعه بعد که نظر دادم نام و ایمیل من را در این مرورگر ذخیره شود.</label>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-12">
                                <label class="form-label">متن دیدگاه *</label>
                                <textarea name="text" class="form-control" rows="3"></textarea>
                                @if(!empty($errors['text']['required']))
                                    <div class="form-control bg-danger">
                                        {{ $errors['text']['required']  }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ __('comments.submit') }}</button>
                            </div>
                            @if(!empty($successMessage))
                                <div class="form-control bg-success">
                                    {{ $successMessage  }}
                                </div>
                            @endif
                        </form>
                    </div>
                    <!-- Reply END -->
                </div>
                <!-- Main Content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-3">
                    <div data-sticky data-margin-top="80" data-sticky-for="991">
                        <h4>اشتراک گذاری</h4>
                        <ul class="nav text-white-force">
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-facebook" href="#">
                                    <i class="fab fa-facebook-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-twitter" href="#">
                                    <i class="fab fa-twitter-square align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-linkedin" href="#">
                                    <i class="fab fa-linkedin align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-pinterest" href="#">
                                    <i class="fab fa-pinterest align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-primary" href="#">
                                    <i class="far fa-envelope align-middle"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Advertisement -->
                        <div class="mt-4">
                            <a href="#" class="d-block card-img-flash">
                                <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/adv.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Right sidebar END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Main END -->

    <!-- =======================
    Sticky post START -->
    <div class="sticky-post bg-light border p-4 mb-5 text-sm-end rounded d-none d-xxl-block">
        <div class="d-flex align-items-center">
            <!-- image -->
            <div class="col-4 d-none d-md-block">
                <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/blog/4by3/05.jpg" alt="Image">
            </div>
            <!-- Title -->
            <div class="ms-3 text-start">
                <span>خبر بعدی<i class="bi bi-arrow-right ms-3 rtl-flip"></i></span>
                <h6 class="m-0"><a href="javascript:void(0)" class="stretched-link btn-link text-reset">تداوم تنفس هوای
                        ناسالم در تهران</a></h6>
            </div>
        </div>
    </div>
    <!-- =======================
    Sticky post END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
{{ $view->make('frontend/main/layout/footer') }}
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/tiny-slider/tiny-slider-rtl.js"></script>
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/sticky-js/sticky.min.js"></script>
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/glightbox/js/glightbox.js"></script>

<!-- Template Functions -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/js') }}/functions.js"></script>

</body>

</html>
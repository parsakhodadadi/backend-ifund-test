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
    {{ $view->make('frontend/main/layout/script') }}

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ route('/Others/Themes/Frontend/Theme/assets/images') }}/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/css') }}/style-rtl.css">

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

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
                        <h2>{{ $lang['sign-in-to-panel'] }}</h2>
                        <!-- Form START -->
                        <form class="mt-4" action="{{ route('/sign-in') }}" method="post">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">{{ $lang['email'] }}</label>
                                <input type="hidden" name="csrf_token" value="{{$security->csrfToken()}}">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{ $lang['mail'] }}">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1">{{ $lang['password'] }}</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="*********">
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">{{ $lang['remember-me'] }}</label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">{{ $lang['sign-in'] }}</button>
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span>{{ $lang['not-register-yet'] }}<a href="{{ route('/sign-up') }}"><u>{{ $lang['sign-up'] }}</u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->
                        <hr>
                        <!-- Social-media btn -->
                        <div class="text-center">
                            <p>{{ $lang['sign-in-with-social-media'] }}</p>
                            <ul class="list-unstyled d-sm-flex mt-3 justify-content-center">
                                <li class="mx-2">
                                    <a href="#" class="btn bg-facebook d-inline-block"><i class="fab fa-facebook-f me-2">{{ $lang['sign-in-facebook'] }}</i>
                                    </a>
                                </li>
                                <li class="mx-2">
                                    <a href="#" class="btn bg-google d-inline-block"><i class="fab fa-google me-2">{{ $lang['sign-in-google'] }}</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

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

<!-- Template Functions -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets') }}/js/functions.js"></script>

</body>

</html>
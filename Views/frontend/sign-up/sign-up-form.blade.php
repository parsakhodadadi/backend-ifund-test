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
    <link rel="shortcut icon" href="{{ route('/Others/Themes/Frontend/Theme/') }}assets/images/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ route('/Others/Themes/Frontend/Theme/') }}assets/css/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
{{ $view->make('frontend/main/layout/preloader') }}
{{--<!-- Preloader END -->--}}

<!-- =======================
Header START -->
{{ $view->make('frontend/main/layout/header') }}
<!-- =======================
Header END -->

{{--<!-- **************** MAIN CONTENT START **************** -->--}}
<main>

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                        <h2>{{ $lang['sign-up-website'] }}</h2>
                        <!-- Form START -->
                        <form class="mt-4" action="{{ route('/sign-up') }}" method="post">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">{{ $lang['email'] }}</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                       value="@if(!empty($data['email'])) {{ $data['email'] }} @endif"
                                       placeholder="{{ $lang['mail'] }}">
                                @if(!empty($errors['email']))
                                    @if(!empty($errors['email']['required']))
                                        <div class="form-control bg-danger">{!! ($errors['email']['required']) !!}</div>
                                    @else
                                        @if(!empty($errors['email']['email']))
                                            <div class="form-control bg-danger">{!! ($errors['email']['email']) !!}</div>
                                        @endif
                                    @endif
                                @endif
                                <small id="emailHelp" class="form-text">{{ $lang['never-share-mail'] }}</small>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1">{{ $lang['password'] }}</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                       value="@if(!empty($data['password'])) {{ $data['password'] }} @endif"
                                       placeholder="*********">
                                @if(!empty($errors['password']))
                                    @if(!empty($errors['password']['required']))
                                        <div class="form-control bg-danger">{!! ($errors['password']['required']) !!}</div>
                                    @else
                                        @if(!empty($errors['password']['password']))
                                            <div class="form-control bg-danger">{!! ($errors['password']['password']) !!}</div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">{{ $lang['confirm-password'] }}</label>
                                <input type="password" name="confirm-password" class="form-control" id="exampleInputPassword2"
                                       value="@if(!empty($data['confirm-password'])) {{ $data['confirm-password'] }} @endif"
                                       placeholder="*********">
                                @if(!empty($errors['confirm-password']))
                                    @if(!empty($errors['confirm-password']['required']))
                                        <div class="form-control bg-danger">{!! ($errors['confirm-password']['required']) !!}</div>
                                    @else
                                        @if(!empty($errors['confirm-password']['password']))
                                            <div class="form-control bg-danger">{!! ($errors['confirm-password']['password']) !!}</div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="news_membership" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">{{ $lang['register-for-news'] }}</label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary" value="{{ $lang['sign-up'] }}">
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span>{{ $lang['not-register-yet'] }}<a href="{{ route('/sign-in') }}"><u>{{ $lang['sign-in'] }}</u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->
                        @if(!empty($successMessage))
                            <div class="form-control bg-success">{{ $successMessage }}</div>
                        @endif
                        @if(!empty($errorMessage))
                            <div class="form-control bg-danger">{{ $errorMessage }}</div>
                        @endif
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
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/js') }}/functions.js"></script>

</body>

</html>
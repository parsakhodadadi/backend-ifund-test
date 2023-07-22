<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/css/app.css" rel="stylesheet">
    <link href="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/css/icons.css" rel="stylesheet">
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-5 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-start">
                                        <img src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/images/logo-img.png" width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">{{ $lang['set-new-pass'] }}</h4>
                                    <form action="{{ route('/admin/changePassword') }}" method="post">
                                        <div class="mb-3 mt-5">
                                            <label class="form-label">{{ $lang['curr-password'] }}</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="{{ $lang['enter-curr-pass'] }}" />
                                            @if(!empty($errors['password']))
                                                @if(!empty($errors['password']['required']))
                                                    <div class="alert-danger">{{ $errors['password']['required'] }}</div>
                                                @endif
                                                @if(!empty($errors['password']['password']))
                                                    <div class="alert-danger">{{ $errors['password']['password'] }}</div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['new-password'] }}</label>
                                            <input type="password" name="new-pass" class="form-control"
                                                   placeholder="{{ $lang['enter-new-pass'] }}" />
                                            @if(!empty($errors['new-pass']))
                                                @if(!empty($errors['new-pass']['required']))
                                                    <div class="alert-danger">{{ $errors['new-pass']['required'] }}</div>
                                                @endif
                                                @if(!empty($errors['new-pass']['password']))
                                                    <div class="alert-danger">{{ $errors['new-pass']['password'] }}</div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['rep-new-pass'] }}</label>
                                            <input type="password" name="rep-new-pass" class="form-control"
                                                   placeholder="{{ $lang['rep-new-pass'] }}" />
                                            @if(!empty($errors['rep-new-pass']))
                                                @if(!empty($errors['rep-new-pass']['required']))
                                                    <div class="alert-danger">{{ $errors['rep-new-pass']['required'] }}</div>
                                                @endif
                                                @if(!empty($errors['rep-new-pass']['password']))
                                                    <div class="alert-danger">{{ $errors['rep-new-pass']['password'] }}</div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-primary" value="{{ $lang['change-pass'] }}" />
                                        </div>
                                        @if(!empty($successMessage))
                                            <div class="form-control alert-success">{{ $successMessage }}</div>
                                        @endif
                                        @if(!empty($errorMessage))
                                            <div class="form-control alert-danger">{{ $errorMessage }}</div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/images/login-images/forgot-password-frent-img.jpg"
                                 class="card-img login-img h-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>

</html>
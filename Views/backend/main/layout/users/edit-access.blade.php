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
    <title>ویرایش دسترسی</title>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="authentication-reset-password d-flex align-items-center justify-content-center">
        <div class="row-cols-xxl-auto">
            <div class="col-xxl-auto col-xxl-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-12 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-start">
                                        <img src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/images/logo-img.png" width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">{{ $lang['edit-access'] }}</h4>
                                    <form action="{{ route('/admin/user/list/editAccess/') . $user->id }}" method="post">
                                        <div class="mb-6 mt-5">
                                            <label class="user-type">{{ $lang['user_type'] }}</label>
                                            <select name="user_type" id="user-type" class="form-select">
                                                @if($user->user_type == "user")
                                                    <option value="user" selected="selected">{{ $lang['user'] }}</option>
                                                    <option value="admin">{{ $lang['admin'] }}</option>
                                                @else
                                                    <option value="admin" selected="selected">{{ $lang['admin'] }}</option>
                                                    <option value="user">{{ $lang['user'] }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-6 mt-5">
                                            <label class="form-label">{{ $lang['block-status'] }}</label>
                                            <select name="blocked" id="user-type" class="form-select">
                                                @if($user->blocked == "yes")
                                                    <option value="yes" selected="selected">{{ $lang['blocked'] }}</option>
                                                    <option value="no">--</option>
                                                @else
                                                    <option value="no" selected="selected">--</option>
                                                    <option value="yes">{{ $lang['blocked'] }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-primary" value='{{ $lang['apply'] }}' />
                                        </div>
                                        @if(!empty($successMessage))
                                            <div class="alert-success">{{ $successMessage }}</div>
                                        @endif
                                    </form>
                                </div>
                            </div>
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
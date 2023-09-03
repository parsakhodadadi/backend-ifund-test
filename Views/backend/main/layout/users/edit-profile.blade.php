<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $lang['aaron-magazine'] }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $lang['user-profile'] }}</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">تنظیمات</button>
                    <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"><span class="visually-hidden">فهرست کشویی</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a
                                class="dropdown-item" href="javascript:;">عمل</a>
                        <a class="dropdown-item" href="javascript:;">عمل دیگر</a>
                        <a class="dropdown-item" href="javascript:;">هر چیز دیگر اینجا</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">لینک
                            جدا کننده</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ route('/') . $user->photo }}" alt="Admin"
                                         class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                                        <p class="text-secondary mb-1">
                                            @if($user->user_type == 'user')
                                                {{ $lang['website-user'] }}
                                            @elseif($user->user_type == 'admin')
                                                {{ $lang['website-admin'] }}
                                            @else
                                                {{ $lang['website-full-admin'] }}
                                            @endif
                                        </p>
                                        <p class="text-muted font-size-sm">ایران، تهران</p>
                                        <button class="btn btn-primary">دنبال کردن</button>
                                        <button class="btn btn-outline-primary">پیام</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('/panel/edit-profile') }}" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['first-name'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"/>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            @if(!empty($errors['first_name']))
                                                @if(!empty($errors['first_name']['required']))
                                                    <div class="form-select alert-danger">
                                                        {{ $errors['first_name']['required'] }}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['last-name'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"/>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            @if(!empty($errors['last_name']))
                                                @if(!empty($errors['last_name']['required']))
                                                    <div class="form-select alert-danger">
                                                        {{ $errors['last_name']['required'] }}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['email'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <label type="text" class="form-control">{{ $user->email }}</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['new-profile-photo'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control"
                                                   id="image-uploadify" name="photo" type="file"
                                                   accept="image/*"
                                                   multiple>
                                        </div>
                                        @if(!empty($errors['files']))
                                            @if(!empty($errors['files']['photo']))
                                                <div class="form-select alert-danger">
                                                    {{ $errors['files']['photo'] }}
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4"
                                                   value="{{ $lang['submit-changes'] }}"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        @if(!empty($successMessage))
                                            <div class="form-control alert-success">
                                                {{ $successMessage }}
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<!-- Bootstrap JS -->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="{{ route('') }}/Others/Themes/Backend/main/vertical/assets/js/app.js"></script>
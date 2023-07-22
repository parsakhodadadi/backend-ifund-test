<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ $lang['edit-profile'] }}</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form action="{{ route('/admin/editProfile') }}" method="post" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">{{ $lang['first_name'] }}</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                           value="{{ $user->first_name }}" name="first_name" placeholder="{{ $lang['enter-first-name'] }}" required>
{{--                                    <div class="valid-feedback">ورودی صحیح!</div>--}}
                                    @if(!empty($errors['first_name']))
                                        @if(!empty($errors['first_name']['required']))
                                            <div class="form-control alert-danger">{{ $errors['first_name']['required'] }}</div>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">{{ $lang['last_name'] }}</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                           value="{{ $user->last_name }}" name="last_name" placeholder="{{ $lang['enter-last-name'] }}" required>
                                    @if(!empty($errors['last_name']))
                                        @if(!empty($errors['last_name']['required']))
                                            <div class="form-control alert-danger">{{ $errors['last_name']['required'] }}</div>
                                        @endif
                                    @endif
{{--                                    <div class="valid-feedback">ورودی صحیح!</div>--}}
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">{{ $lang['email'] }}</label>
                                    <input type="email" class="form-control" id="validationCustomUsername"
                                               aria-describedby="inputGroupPrepend" name="email" value="{{ $user->email }}" placeholder="example@user.com" required>
{{--                                    <div class="invalid-feedback">لطفا یک نام کاربری وارد کنید</div>--}}
                                    @if(!empty($errors['email']))
                                        @if(!empty($errors['email']['required']))
                                            <div class="form-control alert-danger">{{ $errors['email']['required'] }}</div>
                                        @else
                                            <div class="form-control alert-danger">{{ $errors['email']['email'] }}</div>
                                        @endif
                                    @endif

                                </div>
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" value="{{ $lang['edit-data'] }}" />
                                </div>
                                @if(!empty($successMessage))
                                    <div class="form-control alert-success">{{ $successMessage }}</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end row-->
</div>
<!--end page wrapper -->

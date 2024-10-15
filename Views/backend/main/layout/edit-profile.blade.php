<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">پروفایل</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">امکانات</li>
                                <li class="breadcrumb-item active" aria-current="page">پروفایل</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                            <div class="tab-pane" id="usertimeline">
                                <div class="box no-shadow">
                                    <form class="form-horizontal form-element col-12" method="post" action="{{ route('/panel/edit-profile') }}">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 form-label">{{ $lang['name'] }}</label>
                                            <div class="col-sm-10">
                                                <input type="text" 
                                                name="name" class="form-control" id="inputName"
                                                value="{{ $user->name }}" placeholder="">
                                                @if(!empty($errors['name']))
                                                   <div class="form-element alert-danger">{{ $errors['name']['required'] }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 form-label">{{ $lang['email'] }}</label>
                                            <div class="col-sm-10">
                                                <input type="email" 
                                                name="email"
                                                class="form-control" id="inputEmail"
                                                value="{{ $user->email }}"
                                                placeholder="">
                                                @if(!empty($errors['email']['required']))
                                                    <div class="form-element alert-danger">{{ $errors['email']['required'] }}</div>
                                                @elseif(!empty($errors['email']['email']))
                                                    <div class="form-element alert-danger">{{ $errors['email']['email'] }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPhone" class="col-sm-2 form-label">{{ $lang['phone'] }}</label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" 
                                                name="phone"
                                                id="inputPhone"
                                                value="{{ $user->phone }}" placeholder="">
                                                @if(!empty($errors['phone']['phone_number']))
                                                    <div class="form-element alert-danger">{{ $errors['phone']['phone_number'] }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 form-label">{{ $lang['experience'] }}</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                name="experience"
                                                value="{{ $user->experience }}"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 form-label"> {{ $lang['skills'] }}</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                name="skills" id="inputSkills" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="ms-auto col-sm-10">
                                                <button type="submit" class="btn btn-success">ارسال</button>
                                            </div>
                                        </div>
                                        @if(!empty($successMessage))
                                            <div class="form-group alert-success">{{ $successMessage }}</div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
</div>
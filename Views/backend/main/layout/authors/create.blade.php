<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $lang['aaron-website'] }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $lang['add-new-author'] }}</li>
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
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">{{ $lang['author-identities-form'] }}</h5>
                <hr/>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <form action="{{ route('') . $action }}" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">{{ $lang['name'] }}</label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle"
                                               placeholder="{{ $lang['enter-name'] }}"
                                               value="@if(!empty($data)) {{ $data->name }} @endif">
                                        @if(!empty($errors['name']))
                                            @if(!empty($errors['name']['required']))
                                                <div class="form-control alert-danger">{{ $errors['name']['required'] }}</div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription"
                                               class="form-label">{{ $lang['about'] }}</label>
                                        <textarea name="about" class="form-control" id="myCKEditortextarea"
                                                  rows="3">
                                            @if(!empty($data))
                                                {{ $data->about }}
                                            @endif
                                        </textarea>
                                        @if(!empty($errors['about']))
                                            @if(!empty($errors['about']['required']))
                                                <div class="form-control alert-danger">{{ $errors['about']['required'] }}</div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription"
                                               class="form-label">{{ $lang['add-photo'] }}</label>
                                        <input class="form-control" value="@if(!empty($data)) @if(!empty($data->photo)) {{ $data->photo }} @endif @endif"
                                               id="image-uploadify" name="photo" type="file"
                                               accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                               multiple>
                                        @if($method == 'update')
                                            @if(!empty($data->photo))
                                                <div class="card-body">
                                                <span>
                                                    <img src="{{ route('/') . $data->photo }}" width="200" height="auto" alt="">
                                                </span>
                                                </div>
                                            @endif
                                        @endif
                                        @if(!empty($errors['files']))
                                            @if(!empty($errors['files']['photo']))
                                                <div class="form-control alert-danger">{{ $errors['files']['photo'] }}</div>
                                            @endif
                                        @endif
                                    </div>
                                    <input type="submit" class="btn btn-primary px-4" value="{{ $lang['register-data'] }}">
                                </form>
                            </div>
                            @if(!empty($successMessage))
                                <div class="form-control alert-success">{{ $successMessage }}</div>
                            @endif
                            @if(!empty($errorMessage))
                                <div class="form-control alert-danger">{{ $errorMessage }}</div>
                            @endif
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/js/jquery.min.js"></script>
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src='{{ route('/Others/Themes/Backend/main/vertical/') }}assets/plugins/tinymce-rtl/tinymce.min.js'></script>
<script src='{{ route('/Others/Themes/Backend/main/vertical/') }}assets/plugins/ckeditor/ckeditor.js'></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 400,
        theme: 'silver',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
        templates: [{
            title: 'متن نمونه 1',
            content: 'متن 1'
        },
            {
                title: 'متن نمونه 2',
                content: 'متن 2'
            }
        ],
        content_css: []
    });

    CKEDITOR.replace('myCKEditortextarea')
</script>
<script src="{{ route('/Others/Themes/Backend/main/vertical/') }}assets/js/app.js"></script>
<!--end page wrapper -->



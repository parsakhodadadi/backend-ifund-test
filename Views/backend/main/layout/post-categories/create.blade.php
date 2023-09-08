<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<span>
						<h4>
                            @if($method == 'create')
                                {{ $lang['create-category'] }}
                            @elseif($method == 'update')
                                {{ $lang['edit-category'] }}
                            @elseif($method == 'create_sub')
                                {{ $lang['create-subject'] }}
                            @elseif($method == 'edit_sub')
                                {{ $lang['edit-subject'] }}
                            @endif
						</h4>
					</span>
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
                    <form action="{!! route('') . $action !!}" method="post">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['title'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="{{ $lang['title'] }}"
                                                   value="@if(!empty($category)){{ $category->title }}@endif"/>
                                            @if(!empty($errors['title']))
                                                <div class="form-control alert-danger">{!! ($errors['title']['required']) !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{ $lang['description'] }}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input class="form-control" name="description"
                                                   placeholder="{{ $lang['description'] }}"
                                                   value="@if(!empty($category)){{ $category->description }}@endif"/>
                                            @if(!empty($errors['description']))
                                                <div class="form-control alert-danger">{!! ($errors['description']['required']) !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($method == 'update')
                                        @if($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/categories-management/edit/' . $category->id && $user->user_type == 'fulladmin')
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">{{ $lang['status'] }}</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select" name="status">
                                                        @if($category->status == 'approved')
                                                            <option value="approved"
                                                                    selected>{{ $lang['approved'] }}</option>
                                                            <option value="disapproved">{{ $lang['disapproved'] }}</option>
                                                        @else
                                                            <option value="disapproved"
                                                                    selected>{{ $lang['disapproved'] }}</option>
                                                            <option value="approved">{{ $lang['approved'] }}</option>
                                                        @endif
                                                    </select>
                                                    @if(!empty($errors['status']))
                                                        <div class="form-control alert-danger">{!! ($errors['status']['required']) !!}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4"
                                               value="{{ $lang['send'] }}"/>
                                    </div>
                                </div>
                                @if(!empty($errorMessage))
                                    <div class="form-control alert-danger">{!! $errorMessage !!}</div>
                                @endif
                                @if(!empty($successMessage))
                                    <div class="form-control alert-success">{!! $successMessage !!}</div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->



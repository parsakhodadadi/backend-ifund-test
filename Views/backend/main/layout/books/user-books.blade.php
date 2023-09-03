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
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $lang['my-books'] }}
                        </li>
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
        @foreach($books as $book)
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-0">{{ $book->name }}</h5>
                    </div>
                    <hr/>
                    <div class="card-body">
                        <img src="{{ route('/') . $book->photo }}" width="100%" alt="">
                    </div>
                    <div class="card-body">
                        {{ $book->description }}
                    </div>
                    <div class="card-footer">
                        {{ $lang['by'] }}
                        {{ $user->first_name }}
                        {{ $user->last_name }}
                        <br>
                        @if($user->user_type == 'user')
                            {{ $lang['user'] }}
                        @elseif($user->user_type == 'admin')
                            {{ $lang['admin'] }}
                        @else
                            {{ $lang['fulladmin'] }}
                        @endif
                        <br>
                        {{ $lang['email'] . ' : ' . $user->email }}
                        <br>
                        @if($book->edited == 'no')
                            {{ $lang['written-at'] }}
                        @else
                            {{ $lang['last-edited-at'] }}
                        @endif
                        {{ $book->date . ' ' . $book->time }}
                    </div>
                    <br>
                    <table>
                        <tr>
                            <td><a class="btn btn-primary"
                                   href="{{ route('/panel/my-books/edit/') . $book->id }}">{{ $lang['edit'] }}</a>
                            </td>

                            <td><a class="btn btn-danger"
                                   href="{{ route('/panel/my-books/delete') . $book->id }}">{{ $lang['delete'] }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--end page wrapper -->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>

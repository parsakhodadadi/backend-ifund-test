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
                        <li class="breadcrumb-item active" aria-current="page">{{ $lang['posts-management'] }}</li>
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
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    @if(!empty($user_id))
                        @if($post->user_id == $user_id)
                            <a href="{{ route('/panel/admin/posts/edit/') . $post->id }}"
                               class="form-control">{{ $lang['edit'] }}</a>
                        @endif
                    @endif
                    <div class="card-title">
                        <h5 class="mb-0">{{ $post->title }}</h5>
                    </div>
                    <hr/>
                    @if(!empty($post->photo))
                        <div class="card-body">
                            <img src="{{ route('/') . $post->photo }}" width="100%" alt="">
                        </div>
                    @endif
                    <div class="card-body">
                        {{ $post->description }}
                    </div>
                    <div class="card-footer">
                        {{ $lang['by'] }}
                        {{ current($users->get(['id' => $post->user_id]))->first_name }}
                        {{ current($users->get(['id' => $post->user_id]))->last_name }}
                        <br>
                        @if($post->status == "disapproved")
                            {{ $lang['email'] . ' : ' . current($users->get(['id' => $post->user_id]))->email }}
                        @endif
                        @if(current($users->get(['id' => $post->user_id]))->user_type == 'user')
                            {{ $lang['user'] }}
                        @elseif(current($users->get(['id' => $post->user_id]))->user_type == 'admin')
                            {{ $lang['admin'] }}
                        @else
                            {{ $lang['fulladmin'] }}
                        @endif
                        <br>
                        @if($post->edited == 'yes')
                            {{ $lang['written-at'] }}
                        @else
                            {{ $lang['last-edited-at'] }}
                        @endif
                        {{ $post->date . ' ' . $post->time }}
                    </div>
                    <br>
                    <table>
                        <tr>
                            @if($post->status == 'disapproved')
                                <td><a class="btn btn-success"
                                       href="{{ route('/panel/posts-management/approve/') . $post->id }}">{{ $lang['approve'] }}</a>
                                </td>
                            @endif
                            <td><a class="btn btn-danger"
                                   href="{{ route('/panel/posts-management/delete/') . $post->id }}">{{ $lang['delete'] }}</a>
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

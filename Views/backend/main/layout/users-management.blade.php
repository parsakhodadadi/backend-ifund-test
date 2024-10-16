<div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <h4 class="page-title">{{ $lang['users'] }}</h4>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $lang['users'] }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="box"> -->
                                <!-- <div class="box-body"> -->
                                    <!-- <div>
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item b-1">
                                                <a class="nav-link active text-center" href="#">51 <br>فعال</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">41 <br>در انتظار </a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">0 <br>تائید شده</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">10 <br>عضو شده</a>
                                            </li>
                                            <li class="nav-item b-1">
                                                <a class="nav-link text-center" href="#">0 <br>استخدام شده</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link disabled text-center" href="#" tabindex="-1" aria-disabled="true">0 <br>تائید نشده</a>
                                            </li>
                                        </ul>
                                    </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <div class="box">
                                <div class="box-body px-0">
                                    <div class="table-responsive">
                                        <table id="example2" class="table mb-0 w-p100">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="ch_bx_1" class="filled-in">
                                                        <label for="ch_bx_1" class="mb-0"></label>
                                                    </th>
                                                    <th>{{ $lang['name'] }}</th>
                                                    <th>{{ $lang['status'] }}</th>
                                                    <th>{{ $lang['user-type'] }}</th>
                                                    <th>{{ $lang['email'] }}</th>
                                                    <th>{{ $lang['phone'] }}</th>
                                                    <th>{{ $lang['experience'] }}</th>
                                                    <th>{{ $lang['skills'] }}</th>
                                                    <th><i class="fa fa-lock me-5"></i>{{ $lang['operations'] }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="ch_bx_2" class="filled-in">
                                                            <label for="ch_bx_2" class="mb-0"></label>
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>
                                                            @if($user->status == 'active')
                                                                <span class="badge badge-success-light">
                                                                    {{ $lang['active'] }}
                                                                </span>
                                                            @else 
                                                                <span class="badge badge-danger-light">
                                                                    {{ $lang['blocked'] }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($user->user_type == 'admin')
                                                               ادمین
                                                            @elseif($user->user_type == 'instructor')
                                                               مدرس
                                                            @else
                                                               کابر عادی   
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $user->email }}
                                                        </td>
                                                        <td>
                                                            {{ $user->phone }}
                                                        </td>
                                                        <td>
                                                            {{ $user->experience }}
                                                        </td>
                                                        <td>
                                                            {{ $user->skills }}
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                @if($user->user_type != 'admin')
                                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="{{ route('/panel/users-management/promote-to-instructor/') . $user->id }}">
                                                                            @if($user->user_type == 'instructor')
                                                                            {{ $lang['chnage-to-normal-user'] }}
                                                                            @else
                                                                            {{ $lang['promote-to-instructor'] }}
                                                                            @endif
                                                                        </a>
                                                                        <a class="dropdown-item" href="{{ route('/panel/users-management/block/') . $user->id }}">
                                                                            @if($user->status == 'active')
                                                                                {{ $lang['block'] }}
                                                                            @else
                                                                                {{ $lang['unblock'] }}
                                                                            @endif
                                                                        </a>
                                                                        <a class="dropdown-item" href="{{ route('/panel/users-management/delete/') . $user->id }}">{{ $lang['delete'] }}</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->

            </div>
        </div>
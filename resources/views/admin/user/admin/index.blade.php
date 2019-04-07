@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    {{ Breadcrumbs::render('profile.state.list') }}
@endsection

@section('adminContent')
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-success">
                        {{ session('warning') }}
                    </div>
                @endif

                <div class="box-header">
                    <h3 class="box-title">
                        {{$title}}-
                     ( تعداد کل کاربران :{{count($allUser)}}نفر )

                    </h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th>شماره همراه</th>
                            <th>شماره ثابت</th>
                            <th>ایمیل</th>
                            <th>کیف پول</th>
                            <th>نقش</th>
                            <th>کد ملی</th>
                            <th>آدرس</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allUser as $user)
                            <tr>
                                <td class="col-lg-1">{{$loop->iteration}}</td>
                                <td class="col-lg-1">{{$user->name}}</td>
                                <td class="col-lg-1">{{$user->mobile}}</td>
                                <td class="col-lg-1">{{$user->phone}}</td>
                                <td class="col-lg-1">{{$user->email}}</td>
                                <td class="col-lg-1">{{$user->wallet}}</td>
                                <td class="col-lg-1">{{\App\Models\Roles\Roles::getRoleName($user->getRoleNames()[0])}}</td>
                                {{--<td class="col-lg-1">--}}
                                    {{--<a href="">--}}
                                        {{--<i data-toggle="tooltip" data-placement="top" class="{{\App\Models\User\UserStatus::getUserStatusIconClass($user->status)}} editColor" style="{{\App\Models\User\UserStatus::getUserStatusColorIcon($user->status)}}" title="تغییروضعیت">--}}
                                        {{--</i>--}}
                                    {{--</a>--}}

                                <td class="col-lg-1">{{$user->codemeli}}</td>
                                <td class="col-lg-1">{{$user->address}}</td>

                                <td class="col-lg-1">
                                    <a href="{{route('profile.user.edit').'?item='.$user->id}}"><i data-toggle="tooltip" data-placement="top"
                                                                                                                      class="fa fa-pencil-square fa-2x editColor"
                                                                                                                      title="ویرایش"></i></a>
                                    <a onclick="confirmDelete(event,this)"
                                       href="{{route('profile.user.delete').'?item='.$user->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-times-circle fa-2x deleteColor" title="حذف"></i></a>


                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


        </section>
    </div>


    <!-- Main row -->
    <script>
        function confirmDelete(e, tag) {
            e.preventDefault();
            let hrefOfTag = $(tag).attr('href');
            swal({
                title: "ازحذف این مورد اطمینان دارید؟",
                text: "درصورت تایید ، فیلد مورد نظر حذف می گردد!",
                icon: "warning",
                buttons: ["خیر", "بله"],
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    $(location).attr('href', hrefOfTag);
                }
            });
        }
    </script>
@endsection

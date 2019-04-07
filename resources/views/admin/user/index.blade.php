@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>پروفایل</small>
    </h1>
    {{ Breadcrumbs::render('profile.state.list') }}
@endsection

@section('adminContent')
    <div class="row">
        <div class="col-md-12">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name.' '.$user->lastname}}</h3>
                    {{--<p class="text-muted text-center">مهندس نرم افزار</p>--}}
                    <div class="col-lg-6">

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>نام و نام خانوادگی:</b>
                            <a class="pull-left">{{$user->name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>شماره همراه:</b> <a class="pull-left">{{$user->mobile}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>دریافت خبرنامه:</b> <a class="pull-left">بلی</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>پست الکترونیک:</b> <a class="pull-left">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>کدملی:</b> <a class="pull-left">1291998225</a>
                            </li>
                            <li class="list-group-item">
                                <b>شماره کارت:</b> <a class="pull-left">6037-5585-6895-2012</a>
                            </li>
                        </ul>
                    </div>

                    <a href="{{route('user.edit')}}" class="btn btn-info"><b>ویرایش اطلاعات</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>



@endsection

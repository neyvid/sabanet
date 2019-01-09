@extends('layout.frontend.home')
@section('content')

    <div class="wrap">
        <div class="loginContainer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center m-0 m-auto">
                        <div class="loginContent">
                            @if (session('warning'))
                                <div class="alert alert-danger">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <img id="loginIcon" src="{{asset('images/frontend/login-icon.svg')}}" alt="">
                            <p class="m-0" id="loginTitle">ثبت نام کاربرجدید</p>
                            <form class="text-center registerForm" dir="rtl" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input name="registerField" type="text"
                                           class="form-control MobileInput"
                                           placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control PassInput"
                                           placeholder="کلمه عبور خود را وارد نمایید">
                                </div>

                                <button type="submit" class="btn btn-success btn-lg">ثبت نام</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

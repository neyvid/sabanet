@extends('layout.frontend.home')

@section('content')
<div class="wrap">
    <div class="loginContainer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="loginContent">
                        <img id="loginIcon" src="{{asset('images/frontend/login-icon.svg')}}" alt="">
                        <p class="m-0" id="loginTitle">ورود به صفحه کاربری</p>
                        @if (session('warning'))
                            <div class="alert alert-danger">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
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
                        <form class="text-center " dir="rtl" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input name="loginField" type="text"  class="form-control MobileInput" placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید">
                            </div>
                            <div class="form-group text-left ">
                                <a id="remembermeLink" href="">رمزعبوررافراموش کردید؟</a>
                            </div>
                            <div class="form-group text-left ">
                                <a id="remembermeLink" href="{{route('register')}}">هنوز ثبت نام نکرده اید؟</a>
                            </div>

                            <div class="form-group">
                                <input name="password" type="password" class="form-control PassInput" placeholder="کلمه عبور خود را وارد نمایید">
                            </div>
                            <div class="form-group form-check">
                                <input name="rememberMe" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label remmemberMe" for="exampleCheck1">مرابخاطربسپار!</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg">وارد شوید</button>

                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="rightSideOfLoginForm">
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

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
                        <form class="text-center " dir="rtl" method="">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control loginEmailInput" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="ایمیل ">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control loginPassInput" id="exampleInputPassword1"
                                       placeholder="رمزعبور">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
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

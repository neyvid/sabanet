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
                            <p class="m-0" id="loginTitle">یاد آوری کلمه عبور</p>
                            <form class="text-center" dir="rtl" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input name="forgotPasswordField" type="text" class="form-control MobileInput"
                                           placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید">
                                </div>

                                <button type="submit" class="btn btn-success btn-lg">یادآوری کلمه عبور</button>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

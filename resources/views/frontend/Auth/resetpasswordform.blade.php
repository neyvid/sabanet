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
                            <p class="m-0" id="loginTitle">تغییر رمز عبور</p>
                            <form class="text-center" dir="rtl" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input name="password" type="tel" class="form-control resetPasswordInput" placeholder="کلمه عبور جدید را وارد نمایید">
                                </div>
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" class="form-control resetPasswordInput"  placeholder="کلمه عبور جدید را وارد نمایید">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">تغییرکلمه عبور</button>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

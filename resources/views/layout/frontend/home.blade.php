@include('layout.frontend.header')
<div id="topMenu">
    <div class="container">
        <div class="row">

            <div class=" col-lg-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">خدمات ما</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    اینترنت ADSL
                                </a>
                                <div class="dropdown-menu dropdown-menu-custom" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">سفارش آنلاین اینترنت</a>
                                    <a class="dropdown-item" href="#">تعرفه خدمات اینترنت ADSL</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">مناطقق تحت پوشش اینترنت ADSL</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">تماس با ما</a>
                            </li>
                            @auth()
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn btn-success btn-sm" href=""
                                       id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->present()->showName }}

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-custom" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item profileLink"
                                           href="{{ route('profile.home') }}">پروفایل</a>
                                        @hasrole(\App\Models\Roles\Roles::USER)
                                        <a class="dropdown-item ordersLink" href="{{route('user.orders')}}">سفارش های من</a>
                                        @endhasrole
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item logoutLink" href="{{route('dologout')}}">خروج از حساب
                                            کاربری</a>
                                    </div>
                                </li>
                            @endauth
                            @guest()
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn btn-info btn-md" href="" id="navbarDropdown"
                                       role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ورود/ثبت نام
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-custom" aria-labelledby="navbarDropdown">
                                        <div class="loginRegisterBtn">
                                            <a class="dropdown-item" href="{{route('login')}}">ورود به نوید نت</a>
                                        </div>
                                        <div>
                                            <p class="dropdown-item">کاربرجدید هستید؟</p>
                                            <a href="{{route('register')}}" class="registerLink">ثبت نام</a>

                                        </div>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">مناطقق تحت پوشش اینترنت ADSL</a>
                                    </div>
                                </li>
                            @endguest


                        </ul>

                    </div>
                </nav>
            </div>
            <div class="col-lg-2">
                <img src="{{asset('images/frontend/logo/Sabanet-Logo.png')}}" alt="لوگو شرکت نوید نت" class="logo">
            </div>

        </div>
    </div>

</div>
@yield('content')
@include('layout.frontend.footer')

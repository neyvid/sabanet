<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--Custom Css--}}
    <link rel="stylesheet" href="{{asset('css/frontendCss.css')}}">
    {{--Swiper Css Of Slider--}}
    <link rel="stylesheet" href="{{asset('css/frontend/swiper.css')}}">
    <!-- Bootstrap CSS And Bootstrap RTL That Changed With Gulp)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app-rtl/app.css')}}">
    {{--Script Of Swiper (Slider)--}}
    <script src="js/frontend/swiper.js"></script>
    {{--Jquery Script--}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    {{--Script Of Bootstrap--}}
    <script src="{{asset('js/app.js')}}"></script>
    <title>نوید نت</title>
</head>
<body>
<header id="topHead">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 socialMediaIcons">
                <a class="socialIcon" href=""><img src="images/socialIcon/instagram2.svg" width="20px" height="20px"
                                                   alt="اینستگرام نویدنت"></a>
                <a class="socialIcon" href=""><img src="images/socialIcon/telegram.svg" width="20px" height="20px"
                                                   alt="تلگرام نویدنت"></a>
                <a class="socialIcon" href=""><img src="images/socialIcon/google-plus.svg" width="20px" height="20px"
                                                   alt="گوگل پلاس نویدنت"></a>
                <a class="socialIcon" href=""><img src="images/socialIcon/twitter.svg" width="20px" height="20px"
                                                   alt="توییتر نویدنت"></a>
                <a class="socialIcon" href=""><img src="images/socialIcon/whatsapp.svg" width="20px" height="20px"
                                                   alt="واتساپ نویدنت"></a>
            </div>
            <div class="col-lg-6 fastContact">
                <p>
                    شماره تماس با ما:

                    <span>09131011538</span>
                </p>
            </div>

        </div>
    </div>
</header>
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
                                <a class="nav-link" href="{{route('ourService')}}">خدمات ما</a>
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
<footer>
    <div class="container">
        <div class="firstFooterContent">
            <div class="row">
                <div class="col-lg-6 rightFirstFooter">
                    <div class="col-lg-12 rightFirstFooterContent">
                        <ul>
                            <li><a href=""><img src="{{asset('images/socialIcon/whatsapp.svg')}}" alt="واتساپ نوید نت"></a></li>
                            <li><a href=""><img src="{{asset('images/socialIcon/instagram2.svg')}}"  alt="اینستگرام نوید نت"></a></li>
                            <li><a href=""><img src="{{asset('images/socialIcon/telegram.svg')}}" alt="تلگرام نوید نت"></a></li>
                            <li><a href=""><img src="{{asset('images/socialIcon/google-plus.svg')}}"  alt="گوگل پلاس نوید نت"></a></li>
                            <li><a href=""><img src="{{asset('images/socialIcon/twitter.svg')}}" alt="توییتر نوید نت"></a></li>
                        </ul>

                    </div>
                    <div class="col-lg-12 rightFirstFooterContent">
                        <form class="form-inline">
                            <button type="submit" class="btn-lg btn-success rounded-0 border-right-0">عضویت در خبرنامه</button>
                            <input type="text" class="form-control-lg col rounded-right rounded-0 border-0"  placeholder="ایمیل شما">


                        </form>
                    </div>
                </div>

                <div class="col-lg-3 leftFirstFooterContent">
                    <ul>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 leftFirstFooterContent">
                    <ul>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>
                        <li><a href="">اخبار و تازه ها</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 leftSecondFooterContent">
                <ul>
                    <li>
                        <a href="">
                            رسیدگی به انتقادها و پیشنهادها
                        </a>
                    </li>
                    <li>

                        <a href="">
                            شماره پروانه ۱۵-۹۴-۱۰۰
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 copyrightFooter">
                <p>
                    کپی‌رایت © ۱۳۹۷. گروه فناوری ارتباطات و اطلاعات شاتل
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="js/frontend/customJs.js"></script>


</body>
</html>

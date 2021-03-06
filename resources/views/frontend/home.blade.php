@extends('layout.frontend.home')
@section('content')
    <div class="sliderOne">

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('images/frontend/slider/slider1.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('images/frontend/slider/slider2.jpg')}}" width="823px" height="300px"
                                     alt="">
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>


                <div class="col-lg-3 rightSideOfSliderOne">
                    <div class="rightSideOfSliderOne_content">
                        <button type="button" class="btn btn-danger btn-sm btn-block" dir="rtl">ثبت نام اینترنت پرسرعت
                            ADSL
                        </button>
                        <button type="button" class="btn btn-success btn-sm btn-block">ورود به پنل کاربری</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="firstContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center ourService adslServicePrice">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <h3 class="titleOf">تعرفه خدمات اینترنت +ADSL2</h3>
                    <p> تعرفه خدمات اینترنت پرسرعت شاتل را برای مقایسه خدمات و انتخاب سرویس مورد نیاز خود مشاهده
                        فرمایید.
                    </p>
                </div>
                <div class="col-lg-4 text-center ourService adslOrderOnline">
                    <img src="{{asset('images/frontend/buyOnline.svg')}}" alt="">
                    <h3>سفارش آنلاین خدمات +ADSL2</h3>
                    <p>
                        همین حالا سرویس مورد نیازتان را به سادگی و به صورت آنلاین خریداری کنید.
                    </p>

                </div>
                <div class="col-lg-4 text-center ourService adslSupportCheck p-0">
                    <img src="{{asset('images/frontend/search.svg')}}" alt="">
                    <h3>بررسی پوشش خدمات +ADSL2 </h3>
                    <form method="post" id="checkAdslSupport">
                        <div class="row">
                            <div class="alert alert-warning mt-3 validateAdslCheck"
                                 style="display: none;width: 100%;margin: 0 14px 10px 14px;">

                            </div>
                            <div class="col-lg-7">
                                <input type="text" name="telNumber" id="telNumber" class="form-control"
                                       placeholder="شماره تلفن ثابت">
                            </div>
                            <div class="col-lg-5">
                                <input type="text" name="stateCode" id="stateCode" class="form-control"
                                       placeholder="پیش شماره شهر">
                            </div>
                        </div>
                        <button id="numberCheckBtn" class="btn btn-success btn-block">بررسی</button>
                    </form>
                    <script>
                        $(document).ready(function () {
                            $('#checkAdslSupport').submit(function (event) {
                                event.preventDefault();
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                let telNumber = $('#telNumber').val();
                                let stateCode = $('#stateCode').val();
                                $.ajax({
                                    url: '/checkAdslSupport',
                                    type: 'POST',
                                    data: {stateCode: stateCode, telNumber: telNumber},
                                    success: function (result) {
                                        $('.validateAdslCheck>p').remove();
                                        $('.validateAdslCheck').hide();
                                        if (result.errors != null) {
                                            $.each(result.errors, function (key, value) {
                                                $('.validateAdslCheck').show();
                                                $('.validateAdslCheck').append('<p>' + value + '</p>');
                                            })
                                        }
                                        $('.responseOfAdslCheck').remove();
                                        $('#checkAdslSupport').after(result);
                                    },

                                });

                            });


                        })
                    </script>
                </div>
            </div>
        </div>

    </div>
    <div class="ourServices">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ourServicesTitle">
                    <span>خدمات ما</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">سرویس FMC</p>
                </div>
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">تلفن (Voice)</p>
                </div>
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">نوید موبایل</p>
                </div>
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">نوید لند</p>
                </div>
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">اینترنت برج‌ها و مجتمع‌ها</p>
                </div>
                <div class="col-lg-2 OurServiceContent">
                    <img src="{{asset('images/frontend/cash.svg')}}" alt="">
                    <p class="m-0 pt-4">پهنای باند</p>
                </div>

            </div>
        </div>
    </div>
    <div class="ourNews">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ourNewsTitle">
                    <span>خبرها</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 OurNewsContent">
                    <a href="">
                        <h2 class="h5">نهمین سمپوزیوم بین المللی مخابرات با حمایت شاتل‎موبایل برگزار می‌شود</h2>
                        <time> ۲۹آذر<i class="fa fa-clock-o"></i></time>
                        <p> به عنوان اپراتور نسل جدید تلفن همراه کشور از حضور خود به عنوان حامی طلایی نهمین سمپوزیوم بین
                            المللی مخابرات خبر داد.</p>
                    </a>

                </div>
                <div class="col-lg-3 OurNewsContent">
                    <a href="">
                        <h2 class="h5">نهمین سمپوزیوم بین المللی مخابرات با حمایت شاتل‎موبایل برگزار می‌شود</h2>
                        <time> ۲۹آذر<i class="fa fa-clock-o"></i></time>
                        <p> به عنوان اپراتور نسل جدید تلفن همراه کشور از حضور خود به عنوان حامی طلایی نهمین سمپوزیوم بین
                            المللی مخابرات خبر داد.</p>
                    </a>

                </div>
                <div class="col-lg-3 OurNewsContent">
                    <a href="">
                        <h2 class="h5">نهمین سمپوزیوم بین المللی مخابرات با حمایت شاتل‎موبایل برگزار می‌شود</h2>
                        <time> ۲۹آذر<i class="fa fa-clock-o"></i></time>
                        <p> به عنوان اپراتور نسل جدید تلفن همراه کشور از حضور خود به عنوان حامی طلایی نهمین سمپوزیوم بین
                            المللی مخابرات خبر داد.</p>
                    </a></div>
                <div class="col-lg-3 OurNewsContent">
                    <a href="">
                        <h2 class="h5">نهمین سمپوزیوم بین المللی مخابرات با حمایت شاتل‎موبایل برگزار می‌شود</h2>
                        <time> ۲۹آذر<i class="fa fa-clock-o"></i></time>
                        <p> به عنوان اپراتور نسل جدید تلفن همراه کشور از حضور خود به عنوان حامی طلایی نهمین سمپوزیوم بین
                            المللی مخابرات خبر داد.</p>
                    </a>

                </div>
                <div class="col-lg-12 text-right">
                    <button class="btn btn-info"> آرشیو خبرها</button>
                </div>


            </div>
        </div>
    </div>
    @if(count($articles)>0)
        <div class="ourNews">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ourNewsTitle">
                        <span>مقالات و آموزش ها</span>
                    </div>
                </div>

                    <div class="row">
                        @foreach($articles as $article)
                            <div class="col-lg-3 OurNewsContent">
                                <a href="{{route('article.show',[$article->id])}}">

                                    <img width="100%" height="120px"
                                         src="/media/{{($article->attachments->first()['name'])}}"
                                         alt="{{$article->title}}">
                                    <h2 class="h5">{{$article->title}}</h2>
                                    <time> ۲۹آذر<i class="fa fa-clock-o"></i></time>
                                    <p dir="rtl">
                                        {{$article->description}}
                                    </p>
                                </a>
                            </div>

                        @endforeach
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-info"> آرشیو مقالات و آموزش ها</button>
                        </div>
                    </div>

            </div>
        </div>
    @endif
@endsection

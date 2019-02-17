@extends('layout.frontend.home')
@section('content')
    <div class="stepRow">
        <div class="container">
            <div class="stepRowOrg">
                <div class="row">
                    <div class="col-2 stepDiv">
                        <i>
                            <i class="fa fa-check"></i>
                        </i>
                        <span>
                            انتخاب سرویس و مودم

                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i> <i class="fa fa-check"></i></i>
                        <span>
                            انتخاب خدمات تکمیلی

                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i> <i class="fa fa-check"></i></i>
                        <span>
                            تکمیل اطلاعات
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i> <i class="fa fa-check"></i></i>
                        <span>
بازبینی سفارش

                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i> <i class="fa fa-check"></i></i>
                        <span>
قرارداد
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i> <i class="fa fa-check"></i></i>
                        <span>
پرداخت
                        </span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end no-gutters">


            </div>
            <div class="serviceShow">
                <div class="row">
                    <div class="col-lg-12 serviceTitle">
                        <span>تکمیل اطلاعات</span>
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col-lg-6 m-auto">
                        <form method="post">
                            {{csrf_field()}}
                            <div class="col-lg-12 userTypeForBuy mb-3 text-center" dir="rtl">
                                <div class="form-group m-0">
                                    <input type="radio" class="minimal" name="userType" value="0" checked>
                                    <label class="userTypeLable">
                                        شخصی
                                    </label>
                                    <input type="radio" class="minimal" name="userType" value="1">
                                    <label class="userTypeLable">
                                        سازمان ها وشرکت ها
                                    </label>

                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('.userTypeForBuy>div>div').click(function () {
                                        alert('ada');
                                    })
                                })
                            </script>
                            <div class="col-lg-12 userInfoFOrBuyAdsl user" dir="rtl">
                                <div class="form-group">
                                    <label>نام :</label>
                                    <span>{{Auth::user()->name}}</span>
                                </div>
                                <div class="form-group">
                                    <label>نام خانوادگی :</label>
                                    <span>{{Auth::user()->lastname}}</span>
                                </div>
                                <div class="form-group">
                                    <label>شماره موبایل:</label>
                                    <span>{{Auth::user()->mobile}}</span>
                                </div>
                                <div class="form-group">
                                    <label>کدملی:</label>
                                    <span>{{Auth::user()->codemeli}}</span>
                                </div>
                                <div class="form-group">
                                    <label>ایمیل:</label>
                                    <span>{{Auth::user()->email}}</span>
                                </div>
                            </div>

                            <div class="col-lg-12 userInfoFOrBuyAdsl user" dir="rtl">
                                <div class="form-group">
                                    <label>نام شرکت :</label>
                                    <span>{{Auth::user()->companyName}}</span>
                                </div>
                                <div class="form-group">
                                    <label>نام رابط شرکت:</label>
                                    <span>{{Auth::user()->connectorLastname}}</span>
                                </div>
                                <div class="form-group">
                                    <label>نام خانوادگی رابط شرکت:</label>
                                    <span>{{Auth::user()->connectorName}}</span>
                                </div>
                                <div class="form-group">
                                    <label>شماره موبایل رابط شرکت:</label>
                                    <span>{{Auth::user()->connectorMobile}}</span>
                                </div>
                                <div class="form-group">
                                    <label>کدملی رابط شرکت:</label>
                                    <span>{{Auth::user()->connectorCodeMeli}}</span>
                                </div>
                                <div class="form-group">
                                    <label>ایمیل رابط شرکت:</label>
                                    <span>{{Auth::user()->connectorEmail}}</span>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>

                <div class="row mt-5 text-center justify-content-between">
                    <div class="col-4 next">
                        <a href="" class="btn btn-primary btn-block btn-lg">ادامه</a>
                    </div>
                    <div class="col-4 return">
                        <a class="btn btn-light btn-block btn-lg back" href="{{route('checkSupport')}}">بازگشت</a>
                    </div>
                </div>

            </div>
            <script>
                function setStep(stepNum) {
                    stepNum--;
                    $('.stepRowOrg>div.row>div.stepDiv').removeClass('currentStep');
                    $('.stepRowOrg>div.row>div.stepDiv:lt(' + stepNum + ')').addClass('completeStep');
                    $('.stepRowOrg>div.row>div.stepDiv:eq(' + stepNum + ')').addClass('currentStep');
                }

                setStep(3);
            </script>


        </div>
    </div>

@endsection


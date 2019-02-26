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
                @if (session('warning'))
                    <div class="row mt-2 warningEerror">
                        <div class="alert alert-danger col-12" dir="rtl">
                            <i class="fa fa-exclamation-triangle fa-2x" style="vertical-align: middle"></i>
                            {{ session('warning') }}
                            <a href="{{route('frontend.user.addinfo')}}" class="btn btn-success">ثبت اطلاعات شرکت</a>

                        </div>
                    </div>
                @endif

                <div class="row mt-5">
                    <div class="col-lg-6 m-auto">
                        <form method="post" action="{{route('typeselection')}}" id="userTypeForm">
                            {{csrf_field()}}
                            <div class="col-lg-12 userTypeForBuy mb-3 text-center" dir="rtl">
                                <div class="form-group m-0">
                                    <p class="userTypeLable">
                                        نوع خرید خود را انتخاب نمایید:
                                    </p>
                                    <input type="radio" class="minimal user" name="userType" checked value="0"
                                           autocomplete="off">
                                    <label class="userTypeLable">
                                        شخصی
                                    </label>
                                    <input type="radio" class="minimal" name="userType" value="1" autocomplete="off">
                                    <label class="userTypeLable">
                                        سازمان ها وشرکت ها
                                    </label>
                                </div>
                            </div>
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
                                <div class="form-group">
                                    <a href="{{route("frontend.user.addinfo")}}" class="btn btn-success">ویرایش
                                        اطلاعات حقوقی
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 userInfoFOrBuyAdsl company" style="display: none" dir="rtl">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-5 text-center justify-content-between">
                    <div class="col-4 next">
                        <a href="" class="btn btn-primary btn-block btn-lg submitBtn">ادامه</a>
                    </div>
                    <div class="col-4 return">
                        <a class="btn btn-light btn-block btn-lg back" href="{{route('showEquipmentOFService')}}">بازگشت</a>
                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function () {
                    let userDiv = $('.user');
                    $('.ajaxError').hide();
                    let companyDiv = $('.company');
                    $('input').on('ifChecked', function (event) {
                        $('.company>div').remove();
                        $('.warningEerror').hide();
                        let userType = $(this).val();
                        userDiv.hide();
                        companyDiv.hide();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.post('/typeselectionAjax/' + userType, function (result) {
                            console.log(result);
                            companyDiv.append(result);
                            if (userType == 0) {
                                userDiv.fadeIn();
                            }
                            if (userType == 1) {
                                companyDiv.fadeIn();
                            }
                        });
                    });
                    $('.submitBtn').click(function (e) {
                        e.preventDefault();
                        $('#userTypeForm').submit();
                    });
                });

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


{{--@extends('layout.frontend.home')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-6 m-0 m-auto text-center returnOfBankWrap" dir="rtl">--}}
            {{--<div class="OrderStatusIcon mt-5">--}}
                {{--<i class="fa fas fa-check-circle fa-5x ok"></i>--}}

                {{--<p>پرداخت شما با موفقیت انجام شد و شماره تراکنش شما :</p>--}}
                {{--<p>{{ isset($status->RefID)? $status->RefID : '' }}</p>--}}
                {{--<p>می باشد</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}


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

            <div class="container">
                <div class="row">
                    <div class="col-6 m-0 m-auto text-center returnOfBankWrap" dir="rtl">
                        <div class="OrderStatusIcon mt-5">
                            <i class="fa fas fa-check-circle fa-5x ok"></i>

                            <p>پرداخت شما با موفقیت انجام شد و شماره تراکنش شما :</p>
                            <p>{{ isset($status->RefID)? $status->RefID : '' }}</p>
                            <p>می باشد</p>
                        </div>
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

                setStep(7);
            </script>

        </div>
    </div>
@endsection


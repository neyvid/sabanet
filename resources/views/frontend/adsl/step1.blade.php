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
            @if (session('warning'))
                <div class="alert alert-danger">
                    {{ session('warning') }}
                </div>
            @endif
            <div class="row justify-content-end no-gutters" id="selectOpratorWrap">

                <div class="col-lg-4 col-md-12 order-lg-1 order-2">
                    <select class="form-control oprator">
                        @foreach(session('areacode')->oprators as $key=>$oprator)
                            <option name="oprator"
                                    {{session('opratorId')==$oprator->id ? 'selected': ''}} value="{{$oprator->id}}">{{$oprator->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-md-12 order-lg-2 order-1">
                    <span id="opratorSelectTitle">:اپراتور مورد نظر را انتخاب نمایید</span>
                </div>

            </div>
            <div class="serviceShow">
                <div class="row">
                    <div class="col-lg-12 serviceTitle">
                        <span>سرویس های پیشنهادی</span>
                    </div>
                    <div class="col-lg-12">
                        <span dir="rtl">شما می‌توانید سرویس مورد نظر خود را از میان فهرست پیشنهادی زیر انتخاب فرمایید. برای مشاهده سرویس‌های دیگر شاتل بر روی کلید انتخاب‌های بیش‌تر کلیک کنید. </span>
                    </div>

                </div>
                <div class="loading d-flex justify-content-center" style="margin-top: 25px;display: none !important;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <script>
                    function setStep(stepNum) {
                        stepNum--;
                        $('.stepRowOrg>div.row>div.stepDiv').removeClass('currentStep');
                        $('.stepRowOrg>div.row>div.stepDiv:lt(' + stepNum + ')').addClass('completeStep');
                        $('.stepRowOrg>div.row>div.stepDiv:eq(' + stepNum + ')').addClass('currentStep');
                    }

                    setStep(1);
                </script>

                <div class="row mt-5 services">

                </div>
                <div class="row mt-5 text-center justify-content-between">
                    <div class="col-4 next">

                        <a href="{{route('showEquipmentOFService')}}"
                           class="btn btn-primary btn-block btn-lg continueBtn">ادامه</a>
                    </div>
                    <div class="col-4 return">
                        <a class="btn btn-light btn-block btn-lg" href="{{route('registerAdslUser')}}">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {

                $('select').niceSelect();
                $('.oprator>ul>li').on('click', function () {
                    let opratorId = $(this).data('value');
                    $(".loading").attr('style', 'display:none !important;margin-top:25px');
                    $(document).ajaxStart(function () {
                        $(".loading").show();
                    });
                    $(document).ajaxComplete(function () {
                        $(".loading").attr('style', 'display:none !important;margin-top:25px');
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                    });
                    $.post('/showServiceOfOprator/' + opratorId, function (result) {
                        $('.services>div').remove();
                        $('.services').append(result);
                    });
                });
                $(function () {
                    $('.oprator>ul>li.selected').click();
                    $(document).click();

                });


            })

        </script>

@endsection

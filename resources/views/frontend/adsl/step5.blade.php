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

            <div class="content-wrapper" dir="rtl">
                <section class="invoice">
                    <div class="row">
                        <div class="col-12">
                            {{--<p class="lead">مهلت پرداخت: ۱۳ مرداد ۱۳۹۶</p>--}}

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">مبلغ کل:</th>
                                        <td>{{ number_format($priceInfo['totalPrice'])}} تومان</td>
                                    </tr>
                                    <tr>
                                        <th>تخفیف</th>
                                        <td>{{ number_format($priceInfo['discountOfService']+$priceInfo['discountOfEquipment'])}}
                                            - تومان
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>مالیات (9.3%)</th>
                                        <td>{{ number_format($priceInfo['taxAmount'])}}+ تومان</td>

                                    </tr>
                                    <tr>
                                        <th>مبلغ قابل پرداخت:</th>
                                        <td>{{ number_format($priceInfo['totalPayablePrice'])}} تومان</td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row confirmAndPayBtnWrap">


                        <div class="col-12">
                            <button type="button" class="btn btn-success btn-block pull-right confirmAndPayBtn">
                                <i class="fa fa-credit-card pl-2">
                                </i>
                                تایید و پرداخت
                            </button>

                        </div>
                        <script>
                            $('.confirmAndPayBtn').on('click',function (e) {
                                $(this).remove();
                                $('.confirmAndPayBtnWrap').append('<button class="btn btn-success btn-block" type="button" disabled dir="ltr"><span class="spinner-border spinner-border-sm pr-2" role="status" aria-hidden="true"></span></button>');
                                window.location.href = "{{url('/order/create')}}";
                            });
                        </script>
                    </div>
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>
            </div>


            <script>
                function setStep(stepNum) {
                    stepNum--;
                    $('.stepRowOrg>div.row>div.stepDiv').removeClass('currentStep');
                    $('.stepRowOrg>div.row>div.stepDiv:lt(' + stepNum + ')').addClass('completeStep');
                    $('.stepRowOrg>div.row>div.stepDiv:eq(' + stepNum + ')').addClass('currentStep');
                }

                setStep(6);
            </script>

        </div>
    </div>
@endsection


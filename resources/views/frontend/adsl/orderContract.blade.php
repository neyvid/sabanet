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
                <div class="row mt-2 warningEerror">
                    <div class="alert alert-danger col-12" dir="rtl">
                        {{ session('warning') }}
                    </div>
                </div>
            @endif
            <div class="row" dir="rtl">

                <div class="col-lg-12">
                    <div class="alert alert-info">
                        لطفاً قرار داد زیر را با دقت مطالعه بفرمایید و در صورت قبول تمام مفاد و تبصره های این قرار داد
                        آن را تایید نمایید.
                    </div>
                    <div class="contractShowBtn" style="text-align: center">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">مشاهده قرارداد
                        </button>
                    </div>
                    <div class="confirmContract">

                        <form method="post" id="confirmContractForm">
                            {{csrf_field()}}
                            <div class="col-lg-12 mt-4 text-center">
                                <div class="form-group">
                                    <label class="userTypeLable">
                                        قراردادرا مطالعه نمودم و آنرا قبول دارم!
                                    </label>
                                    <input type="checkbox" class="minimal user" name="confirmContract" value="1"
                                           autocomplete="off">

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-5 text-center justify-content-between" dir="ltr">
                <div class="col-4 next">
                    <button  id="continueOfContractConfirmLink" class="btn btn-primary btn-block btn-lg">ثبت اطلاعات و پرداخت</button>
                </div>
                <div class="col-4 return">
                    <a class="btn btn-light btn-block btn-lg back" href="{{route('orderReviewShow')}}">بازگشت</a>
                </div>
            </div>
            <div class="clearfix"></div>

            {{--Modal Content--}}
            <div dir="rtl" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">قراردادخرید سرویس اینترنت پر سرعت</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">

                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            sadasd
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">مطالعه کردم!</button>

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
                setStep(5);
                $('#continueOfContractConfirmLink').on('click', function (e) {
                    e.preventDefault();
                    $('#confirmContractForm').submit();

                //     setTimeout(function () {
                //         $('#confirmContractForm').submit();
                // },3000);
                //     $(this).attr('disabled','disabled');
                });


            </script>

        </div>
    </div>
@endsection


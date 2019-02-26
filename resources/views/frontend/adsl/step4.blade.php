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
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        سفارش
                        <small>شما</small>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="invoice">

                    <div class="row invoice-info">

                        <div class="col-sm-12">
                            <p>شما برای شماره تلفن
                                &nbsp;
                                <b style="color: #d40900">

                                    {{session()->get('clientNumber')}}
                                </b>
                                واقع در استان
                                &nbsp;
                                <b style="color: #d40900">
                                    {{session()->get('areacode')->state->name}}
                                </b>
                                ،وشهر

                                <b style="color: #d40900">

                                    {{session()->get('areacode')->city->name}}
                                </b>
                                درخواست سرویس
                                &nbsp;
                                <b style="color: #d40900">

                                    {{session()->get('service')->name}}
                                </b>
                                از شرکت
                                &nbsp;
                                <b style="color: #d40900">
                                    {{session()->get('opratorId')}}
                                </b>
                                نموده اید.
                            </p>
                            <p>نوع خرید شما
                                <b style="color: #d40900">
                                    {{session()->get('userType')== 0?'حقیقی':'حقوقی (شرکت/سازمان)'}}
                                </b>
                                می باشد.
                            </p>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    @if($service)
                        <div class="row mb-5">
                            <p class="reviewOrderTitle">
                                 سرویس  انتخابی شما برای شماره تلفن فوق، به شرح ذیل می باشد:

                            </p>
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>نام سرویس</th>
                                        <th>مدت سرویس(ماه)</th>
                                        <th>سرعت سرویس(کلو بیت بر ثانیه)</th>
                                        <th>میزان ترافیک شبانه(گیگا بایت)</th>
                                        <th> قیمت (تومان)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->period}}</td>
                                        <td>{{$service->speed}}</td>
                                        <td>{{$service->night_trafic}}</td>
                                        <td>{{$service->price}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                    @endif

                    @if(count($equpments)>0)
                        <div class="row mb-5">
                            <p class="reviewOrderTitle">
                                تجهیزاتی که شما همراه این سرویس برای خرید انتخاب نموده اید به شرح ذیل میباشد:
                            </p>
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>نام محصول</th>
                                        <th> قیمت (تومان)</th>
                                        <th>تصویر</th>
                                        <th>میزان تخفیف (%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($equpments as $equpment)
                                        <tr>
                                            <td>{{$equpment->name}}</td>
                                            <td>{{$equpment->price}}</td>
                                            <td>
                                                <img width="80" height="80"
                                                     src="{{asset('media').'/'.$equpment->attachments->first()['name']}}">
                                            </td>
                                            <td>{{$equpment->discount}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                @endif




                </section>
                <!-- /.content -->
                <div class="row mt-5 text-center justify-content-between" dir="ltr">
                    <div class="col-4 next">
                        <a href="{{route('showStep5')}}" class="btn btn-primary btn-block btn-lg">ادامه</a>
                    </div>
                    <div class="col-4 return">
                        <a class="btn btn-light btn-block btn-lg back" href="{{route('showStep3')}}">بازگشت</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>


            <script>
                function setStep(stepNum) {
                    stepNum--;
                    $('.stepRowOrg>div.row>div.stepDiv').removeClass('currentStep');
                    $('.stepRowOrg>div.row>div.stepDiv:lt(' + stepNum + ')').addClass('completeStep');
                    $('.stepRowOrg>div.row>div.stepDiv:eq(' + stepNum + ')').addClass('currentStep');
                }

                setStep(4);
            </script>

        </div>
    </div>
@endsection


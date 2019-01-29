@extends('layout.frontend.home')
@section('content')
    <div class="stepRow">
        <div class="container">
            <div class="stepRowOrg">
                <div class="row">
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
                      پرداخت
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
                            قرارداد
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
بازبینی سفارش
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
تکمیل اطلاعات
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
انتخاب خدمات تکمیلی
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i></i>
                        <span>
انتخاب سرویس و مودم
                        </span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end no-gutters">
                {{--{{dd(session('areacode')->oprators)}}--}}
                <div class="col-lg-4 col-md-12 order-lg-1 order-2">
                    <select class="form-control oprator">
                        @foreach(session('areacode')->oprators as $key=>$oprator)
                            <option name="oprator" value="{{$oprator->id}}">{{$oprator->name}}</option>
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
                <div class="row mt-5 services">

                </div>

            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('select').niceSelect();
                $('.oprator>ul>li').on('click', function () {
                    let opratorId = $(this).data('value');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                    });
                    $.post('/showServiceOfOprator/' + opratorId, function (result) {
                        $('.services>div').remove();
                        $('.services').append(result);
                    })


                });

            })

        </script>
@endsection

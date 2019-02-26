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
                        <i>   <i class="fa fa-check"></i></i>
                        <span>
                            انتخاب خدمات تکمیلی

                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i>   <i class="fa fa-check"></i></i>
                        <span>
                            تکمیل اطلاعات
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i>   <i class="fa fa-check"></i></i>
                        <span>
بازبینی سفارش

                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i>   <i class="fa fa-check"></i></i>
                        <span>
قرارداد
                        </span>
                    </div>
                    <div class="col-2 stepDiv">
                        <i>   <i class="fa fa-check"></i></i>
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
                        <span>محصولات مرتبط با سرویس شما</span>
                        <span
                            dir="rtl">شما می‌توانید محصول مورد نظر خود را از میان فهرست محصولات زیر انتخاب فرمایید. </span>
                    </div>

                </div>
                <div class="row mt-5 services netEqu">
                    <div class="col-lg-12 titleOfEquipment">
                        <p>تجهیزات شبکه</p>

                    </div>
                    @if(isset($productsForNetwork))
                        @foreach($productsForNetwork as $productforNet)
                            @if($productforNet->product_type==\App\Models\Product\ProductType::NETWORK_EQUIPMENT)
                                <div class="col-lg-3 order-lg-4 serviceWrap">
                                    <a href="#"
                                       class="serviceContent netEquipment"
                                       data-value="{{$productforNet->id}}">
                                        <img class="imageOfService"
                                             src="{{asset('media').'/'.$productforNet->attachments->where('type',1)->first()['name']}}"
                                             alt="{{$productforNet->name}}">
                                        <h4 class="titleOfService">{{$productforNet->name}}</h4>
                                        <p class="descOfService">{{$productforNet->description}}</p>
                                        <button class="selectBtnOfService btn {{session('net-equ')['id']== $productforNet->id ? 'btn-success': 'btn-primary'}} btn-block" href="">انتخاب
                                        </button>
                                    </a>
                                </div>
                            @endif

                        @endforeach
                    @endif

                </div>
                <div class="row mt-5 services pcEqu">
                    <div class="col-lg-12 titleOfEquipment">
                        <p>تجهیزات کامپیوتر</p>
                    </div>
                    @if(isset($productsForPc))
                        @foreach($productsForPc as $productForPc)
                            @if($productForPc->product_type==\App\Models\Product\ProductType::PC_EQUIPMENT)
                                <div class="col-lg-3 order-lg-4 serviceWrap">
                                    <a href="#" class="serviceContent pcEquipment"
                                       data-value="{{$productForPc->id}}">
                                        <img class="imageOfService"
                                             src="{{asset('media').'/'.$productforNet->attachments->first()['name']}}"
                                             alt="{{$productforNet->name}}">
                                        <h4 class="titleOfService">{{$productForPc->name}}</h4>
                                        <p class="descOfService">{{$productForPc->description}}</p>
                                        <button class="selectBtnOfService btn {{session('pc-equ')['id']== $productForPc->id ? 'btn-success': 'btn-primary'}}  btn-block" href="">انتخاب

                                        </button>
                                    </a>
                                </div>
                            @endif

                        @endforeach
                    @endif

                </div>
                <script>
                    $(document).ready(function () {
                        function toggleSelectEquipment(tag,classNameOfLink){
                            let allBtn=$('.'+classNameOfLink).find('button');
                            let btnItem=$(tag).find('.selectBtnOfService');
                            if(btnItem.hasClass('btn-primary')){
                                allBtn.removeClass('btn-success');
                                allBtn.addClass('btn-primary');
                                btnItem.removeClass('btn-primary');
                                allBtn.find('i').remove();
                                btnItem.addClass('btn-success');
                                btnItem.append('<i class="fa fa-check"></i>');
                            }else{
                                btnItem.removeClass('btn-success');
                                allBtn.addClass('btn-primary');
                                btnItem.find('i').remove();
                            }
                        }
                        function ajaxSetup(){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        }

                        $('.netEquipment').on('click', function (e) {
                            e.preventDefault();
                            let netEquipmentId = $(this).data('value');
                            toggleSelectEquipment($(this),'netEquipment');
                            ajaxSetup();
                            $.post('/addEquipmentForUser/net-equ/' + netEquipmentId, function (result) {
                                console.log(result)
                            })

                        });
                        $('.pcEquipment').on('click', function (e) {
                            e.preventDefault();
                            let pcEquipmentId = $(this).data('value');
                            toggleSelectEquipment($(this),'pcEquipment');
                            ajaxSetup();
                            $.post('/addEquipmentForUser/pc-equ/' + pcEquipmentId, function (result) {
                                console.log(result)
                            })

                        })

                    })
                </script>
                <div class="row mt-5 text-center justify-content-between">
                    <div class="col-4 next">
                        <a href="{{route('showStep3')}}" class="btn btn-primary btn-block btn-lg">ادامه</a>
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
                setStep(2);
            </script>

            {{--<script>--}}
            {{--$(document).ready(function () {--}}
            {{--$('.back').on('click',function (e) {--}}
            {{--e.preventDefault();--}}

            {{--})--}}
            {{--})--}}
            {{--</script>--}}

        </div>
    </div>

@endsection


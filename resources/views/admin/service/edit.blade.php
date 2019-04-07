@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
{{--    {{ Breadcrumbs::render('profile.state.edit') }}--}}



@endsection

@section('adminContent')


    <div class="row">
        <section class="col-lg-12 col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                    <form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>نام سرویس:</label>
                            <input type="text" name="name" class="form-control" value="{{$service->name}}"
                                   placeholder="نام سرویس را واردنمایید">
                        </div>
                        <div class="form-group">
                            <label class="opratorLable">
                                این سرویس متعلق به کدام اپراتور می باشد،لطفا یک اپراتور را انتخاب نمایید:
                            </label>
                            @foreach($oprators as $oprator)
                                <label>
                                    {{$oprator->name}}
                                    <input type="radio"
                                           {{ ($service->oprator->id==$oprator->id) ? 'checked' : ' ' }} name="oprator"
                                           class="flat-red minimal" value="{{$oprator->id}}">
                                </label>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label class="periodInput">مدت سرویس:</label>
                            <input type="text" name="period" value="{{$service->period}}"
                                   class="form-control "
                                   placeholder="مدت سرویس را به صورت ماه و فقط عدد وارد نمایید ( مثال: ۲)">
                        </div>


                        <div class="form-group ">
                            <label>
                                نوع سرویس را انتخاب نمایید:
                            </label>
                            @foreach($serviceTypes as $key=>$serviceType)
                                <label>
                                    {{$serviceType}}
                                    <input type="radio" {{ ($service->type==$key) ? 'checked' : ' ' }} name="type"
                                           value="{{$key}}" class="flat-red minimal">
                                </label>
                            @endforeach


                        </div>
                        <div class="form-group ">
                            <label>
                                نوع طرح را انتخاب نمایید:
                            </label>
                            @foreach($servicePlans as $key=>$servicePlan)
                                <label>
                                    {{$servicePlan}}
                                    <input type="radio" name="plan"
                                           {{ ($service->plan==$key) ? 'checked' : ' ' }} value="{{$key}}"
                                           class="flat-red minimal">
                                </label>

                            @endforeach

                        </div>
                        <div class="form-group ">
                            <label>
                                ترافیک شبانه :
                            </label>
                            <label>
                                دارد
                                <input type="radio" name="nightTrafic" value="1"
                                       {{($service->night_trafic==1)? 'checked' : ''}} class="flat-red minimal">
                            </label>
                            <label>
                                ندارد
                                <input type="radio" name="nightTrafic" value="0"
                                       {{($service->night_trafic==0)? 'checked' : ''}}  class="flat-red minimal">
                            </label>

                        </div>
                        <div class="form-group ">
                            <label>
                                سرعت سرویس :
                            </label>
                            <label>
                                16384
                                <input type="radio" name="speed" value="16384"
                                       {{($service->speed==16384)? 'checked' : ''}}  class="flat-red minimal">
                            </label>
                            <label>
                                8192
                                <input type="radio" name="speed" value="8192"
                                       {{($service->speed==8192)? 'checked' : ''}}  class="flat-red minimal">
                            </label>

                        </div>
                        <div class="form-group">
                            <label>میزان حد آستانه ماهانه سرویس:</label>
                            <input type="text" name="limitAmount" value="{{$service->limit_amount}}"
                                   class="form-control"
                                   placeholder="به واحد گیگا بایت وفقط عدد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>میزان ترافیک بین المللی:</label>
                            <input type="text" name="internationalTrafic" value="{{$service->international_trafic}}"
                                   class="form-control"
                                   placeholder="به واحد گیگا بایت وفقط عدد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>قیمت سرویس:</label>
                            <input type="text" name="price" value="{{$service->price}}" class="form-control"
                                   placeholder="قیمت سرویس را وارد نمایید (به واحد تومان)">
                        </div>

                        <div class="form-group">
                            <label>تخفیف سرویس:</label>
                            <input type="text" name="discount" value="{{$service->discount}}" class="form-control"
                                   placeholder="میزان تخفیف را به درصد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>تصویر سرویس:</label>
                            @foreach($service->attachments as $attachment)
                                <img src="{{config('upload.url').'/'.$attachment->name}}" alt="تصویرسرویس" width="100"
                                     height="100"/>

                            @endforeach
                            <input type="file" onchange="showPic(this)" name="picture">

                        </div>
                        <div class="form-group">

                            <label>توضیحات سرویس:</label>
                            <textarea class="form-control" name="description" rows="5">{{$service->description}}</textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info">ثبت</button>
                        </div>
                    </form>


                </div>
            </div>

        </section>

    </div>
    <!-- Main row -->
    <script>
        function showPic(x) {
            let _img = window.URL.createObjectURL(x.files[0]);
            let _imgTag = $(x).prev('img').attr('src', _img);
        }
    </script>

@endsection


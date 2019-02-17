@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">داشبرد</li>
    </ol>
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
                            <input type="text" name="name" class="form-control" placeholder="نام سرویس را واردنمایید">
                        </div>
                        <div class="form-group">
                            <label class="opratorLable">
                                این سرویس متعلق به کدام اپراتور می باشد،لطفا یک اپراتور را انتخاب نمایید:
                            </label>
                            @foreach($oprators as $oprator)
                                <label>
                                    {{$oprator->name}}
                                    <input type="radio" name="oprator" value="{{$oprator->id}}"
                                           class="flat-red minimal">
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>مدت سرویس(ماه):</label>
                            <input type="text" name="period" class="form-control"
                                   placeholder="مدت سرویس را به صورت ماه و فقط عدد وارد نمایید ( مثال: ۲)">
                        </div>
                        <div class="form-group ">
                            <label>
                                نوع سرویس را انتخاب نمایید:
                            </label>
                            @foreach($serviceTypes as $key=>$serviceType)
                                <label>
                                    {{$serviceType}}
                                    <input type="radio" name="type" value="{{$key}}" class="flat-red minimal">
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
                                    <input type="radio" name="plan" value="{{$key}}" class="flat-red minimal">
                                </label>

                            @endforeach

                        </div>
                        <div class="form-group ">
                            <label>
                                ترافیک شبانه(گیگابایت) :
                            </label>
                            <label>
                                دارد
                                <input type="radio" name="nightTrafic" value="1" class="flat-red minimal">
                            </label>
                            <label>
                                ندارد
                                <input type="radio" name="nightTrafic" value="0" class="flat-red minimal">
                            </label>

                        </div>
                        <div class="form-group ">
                            <label>
                                سرعت سرویس (کیلوبایت):
                            </label>
                            <label>
                                16384
                                <input type="radio" name="speed" value="16384" class="flat-red minimal">
                            </label>
                            <label>
                                8192
                                <input type="radio" name="speed" value="8192" class="flat-red minimal">
                            </label>

                        </div>
                        <div class="form-group">
                            <label>میزان حد آستانه ماهانه سرویس(گیگابایت):</label>
                            <input type="text" name="limitAmount" class="form-control"
                                   placeholder="به واحد گیگا بایت وفقط عدد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>میزان ترافیک بین المللی(گیگابایت):</label>
                            <input type="text" name="internationalTrafic" class="form-control"
                                   placeholder="به واحد گیگا بایت وفقط عدد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>قیمت سرویس(تومان):</label>
                            <input type="text" name="price" class="form-control"
                                   placeholder="قیمت سرویس را وارد نمایید (به واحد تومان)">
                        </div>

                        <div class="form-group">
                            <label>تخفیف سرویس(درصد):</label>
                            <input type="text" name="discount" class="form-control"
                                   placeholder="میزان تخفیف را به درصد وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>تصویر سرویس (فایل های قابل قبول: JPEG-GIF-PNG ):</label>
                            <img src="https://fakeimg.pl/250x100/" alt="تصویرسرویس" width="100"
                                 height="100"/>
                            <input type="file" onchange="showPic(this)" name="picture">
                        </div>
                        <div class="form-group">
                            <label>توضیحات سرویس:</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
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


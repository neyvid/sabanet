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
            @if(session('warning'))
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
                            <label>‌نام محصول:</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="نام محصول را وارد نمایید">
                        </div>
                        <div class="form-group state">
                            <label>گروه محصول:</label>
                            @if(isset($categoriesOfProducts))
                                <select class="form-control category" name="category" style="width: 100%;">
                                    @foreach($categoriesOfProducts as $categoriesOfProduct)
                                        <option
                                            value="{{$categoriesOfProduct->id}}">{{$categoriesOfProduct->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group state">
                            <label>نوع محصول:</label>
                                <select class="form-control category" name="product_type" style="width: 100%;">
                                    @foreach(\App\Models\Product\ProductType::getProductTypes() as $key=>$productType)
                                        <option
                                            value="{{$key}}">{{$productType}}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="form-group">
                            <label class="opratorLable">
                                قیمت محصول:
                            </label>
                            <input type="number" name="price" class="form-control"
                                   placeholder="قیمت محصول را به تومان وارد نمایید">
                            {{--@foreach($oprators as $oprator)--}}
                            {{--{{$oprator->name}}--}}
                            {{--<input type="checkbox" class="minimal" name="oprators[]" value="{{$oprator->id}}">--}}
                            {{--@endforeach--}}
                        </div>
                        <div class="form-group state">
                            <label>میزان تخفیف:</label>
                            <input type="number" name="discount" class="form-control"
                                   placeholder="میزان درصد تخفیف را وارد نمایید">
                            {{--@if(isset($states))--}}
                            {{--<select class="form-control states" name="state" style="width: 100%;">--}}
                            {{--@foreach($states as $state)--}}
                            {{--<option value="{{$state->id}}">{{$state->name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@endif--}}
                        </div>
                        <div class="form-group code">
                            <label>موجودی انبار:</label>
                            <input type="text" name="stock" class="form-control stateCode"
                                   placeholder="موجودی انبار را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label>تصویر محصول (فایل های قابل قبول: JPEG-GIF-PNG ):</label>
                            <img src="https://fakeimg.pl/250x100/" alt="تصویرسرویس" width="100"
                                 height="100"/>
                            <input type="file" onchange="showPic(this)" name="picture">
                        </div>
                        <script
                            src="https://code.jquery.com/jquery-3.3.1.min.js"
                            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                            crossorigin="anonymous"></script>
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
        $(document).ready(function () {
            $.fn.select2.defaults.set("theme", "classic");
            $('.category').select2({
                dir: "rtl",
                placeholder: "گروه محصول را انتخاب نمایید",
            });
            $(".category").select2("val", " ");

        });

        function showPic(x) {
            let _img = window.URL.createObjectURL(x.files[0]);
            let _imgTag = $(x).prev('img').attr('src', _img);
        }
    </script>
@endsection


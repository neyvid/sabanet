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
                <div class="box-header">
                    <h3 class="box-title">
                        <h3 class="box-title">{{$title}}</h3>
                    </h3>
                </div>

                <div class="box-body">

                    <form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>عنوان مقاله:</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="عنوان مقاله را وارد نمایید ">
                        </div>
                        <div class="form-group">
                            <label>توضیح مختصردرمورد مقاله:</label>
                            <textarea class="form-control" name="description" rows="1" cols="80"></textarea>

                        </div>

                        <div class="form-group">
                            <label>متن مقاله:</label>
                            <textarea id="articleBody" name="body" rows="10" cols="80"></textarea>

                        </div>

                        <div class="form-group">
                            <label>تصویر شاخص مقاله(فایل های قابل قبول: JPEG-GIF-PNG ):</label>
                            <img src="https://fakeimg.pl/250x100/" alt="تصویرسرویس" width="100"
                                 height="100"/>
                            <input type="file" onchange="showPic(this)" name="picture">
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


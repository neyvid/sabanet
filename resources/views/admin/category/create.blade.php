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
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                    <form method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>نام دسته بندی:</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="نام دسته بندی را واردنمایید">
                        </div>

                        <div class="form-group" id="categoryTypeSelection">
                            <label>دسته مورد نظر مرتبط با : </label>
                            <select class="form-control categoryType"
                                    name="category_type" style="width: 100%;">
                                <option value="">انتخاب کنید</option>
                                @foreach(\App\Models\Category\CategoryType::getCategoryType() as $key=>$categoryType)
                                    <option value="{{$key}}">{{$categoryType}}</option>
                                @endforeach
                            </select>
                        </div>

                        <script
                            src="https://code.jquery.com/jquery-3.3.1.min.js"
                            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                            crossorigin="anonymous"></script>

                        <script>
                            // In your Javascript (external .js resource or <script> tag)
                            $(document).ready(function () {
                                $.fn.select2.defaults.set("theme", "classic");
                                $('.parent').select2({
                                    dir: "rtl",
                                    placeholder: "زیر دسته موردنظرراانتخاب نمایید",

                                });
                                $('.categoryType').on('change', function () {
                                    let categoryTypeNume = $(this).val();
                                    if (categoryTypeNume != '') {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.post('/profile/getCategoryOfCatType/' + categoryTypeNume, function (result) {
                                            $('.subCategory').remove();
                                            $('#categoryTypeSelection').after(result);
                                            $('.parent').select2({
                                                dir: "rtl",
                                                placeholder: "زیر دسته موردنظرراانتخاب نمایید",

                                            });
                                        })
                                    } else {
                                        $('.subCategory').remove();
                                    }


                                });

                            });


                        </script>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info">ثبت</button>
                        </div>

                    </form>

                </div>
            </div>

        </section>

    </div>
    <!-- Main row -->


@endsection


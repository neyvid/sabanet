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
                            <label>نام مرکز مخابرات:</label>
                            <input type="text" name="name" class="form-control" placeholder="نام  مرکز مخابرات را واردنمایید">
                        </div>

                        <div class="form-group">
                            <label>مرکز مخابرات متعلق به کدام شهر هست  :</label>
                            <select class="form-control states" name="city" style="width: 100%;">
                                @if(isset($cities))
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" >{{$city->name}}</option>
                                    @endforeach
                                @endif

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

                                $('.states').select2({
                                    dir: "rtl",
                                    placeholder: "شهرموردنظرراانتخاب نمایید",

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


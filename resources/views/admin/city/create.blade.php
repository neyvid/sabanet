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
                            <label>نام شهر:</label>
                            <input type="text" name="name" class="form-control" placeholder="نام شهر را واردنمایید">
                        </div>

                        <div class="form-group">
                            <label>معمولی</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">تهران</option>
                                <option>مشهد</option>
                                <option>اصفهان</option>
                                <option>شیراز</option>
                                <option>اهواز</option>
                                <option>تبریز</option>
                                <option>کرج</option>
                            </select>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('.select2').select2();
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


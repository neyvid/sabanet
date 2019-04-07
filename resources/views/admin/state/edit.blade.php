@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>


    <ol class="breadcrumb">
        {{ Breadcrumbs::render('profile.state.edit',$state) }}

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
                            <label>نام استان:</label>
                            <input type="text" name="name" class="form-control" placeholder="نام استان را واردنمایید" value="{{$state->name}}">
                        </div>
                        <div class="form-group">
                            <label>کد استان:</label>
                            <input type="text" name="code" class="form-control" placeholder="کد استان را واردنمایید"
                                   value="{{$state->code}}">
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


@endsection


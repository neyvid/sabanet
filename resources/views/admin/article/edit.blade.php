@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    {{ Breadcrumbs::render('profile.state.edit') }}



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
                            <input type="text" name="name" class="form-control" placeholder="نام شهر را واردنمایید" value="{{$city->name}}">
                        </div>
                        <div class="form-group">
                            <label>استان شهر را انتخاب نمایید : </label>
                            <select class="form-control states" name="state" style="width: 100%;">
                                @if(isset($states))
                                    @foreach($states as $state)
                                        <option {{ $state->id == $city->state->id ? 'selected=selected' : '' }} value="{{$state->id}}" >{{$state->name}}</option>
                                    @endforeach
                                @endif

                            </select>

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

@endsection


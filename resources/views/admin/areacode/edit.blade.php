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

                    <form method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>پیش شماره (۴رقم ابتدایی) :</label>
                            <input type="text" name="areacode" class="form-control"
                                   placeholder="پیش شماره را وارد نمایید" value="{{$areacode->areacode}}">
                        </div>
                        <div class="form-group">
                            <label class="opratorLable">
                                اپراتورهایی که این پیش شماره را پشتیبانی می کنند را انتخاب نمایید:
                            </label>
                            {{--should be i think for best way to show checkbox and checked--}}
                            @foreach($oprators as $oprator)
                                @php $check='' @endphp
                                @foreach($areacode->oprators as $opratorOfAreacode)
                                    @if($oprator->id ==$opratorOfAreacode->id )
                                        @php $check='checked' @endphp
                                    @endif
                                @endforeach
                                {{$oprator->name}}
                                <input type="checkbox" {{$check}} class="minimal" name="oprators[]"
                                       value="{{$oprator->id}}">
                            @endforeach
                        </div>
                        <div class="form-group state">
                            <label>پیش شماره متعلق به کدام استان می باشد : </label>
                            @if(isset($states))
                                <select class="form-control states " name="state" style="width: 100%;">
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>

                            @endif

                        </div>
                        <div class="form-group code">
                            <label>کد استان :</label>
                            <input type="text" name="code" class="form-control stateCode"
                                   placeholder="کد استان را وارد نمایید(مثلا 021)">
                        </div>
                        <script
                            src="https://code.jquery.com/jquery-3.3.1.min.js"
                            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                            crossorigin="anonymous"></script>

                        <script>
                            function showCitiesOfState(stateId) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.post('/profile/getcity/' + stateId, function (result) {
                                    $('.city').remove();
                                    $('.telecomCenters').remove();
                                    $('.code').after(result.htmForShowCities);
                                    $('.stateCode').val(result.code);
                                    $('.cities').select2({   //for change normal select to selet2 plugin
                                        dir: "rtl",
                                        placeholder: "شهررا انتخاب نمایید",
                                    });
                                    $(".cities").select2("val", " ");   //for set placeholder in first
                                    $('.cities').val({{($areacode->city_id)}});
                                    $('.cities').trigger('change');
                                    if (stateId == {{$areacode->state_id}}) {
                                        showtelecomeOfCity({{($areacode->city_id)}});
                                    }
                                });

                            }


                            function showtelecomeOfCity(cityId) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.post('/profile/getTelecom/' + cityId, function (result) {
                                    $('.telecomCenters').remove();
                                    $('.city').after(result);
                                    $('.telecom').select2({
                                        dir: "rtl",
                                        placeholder: "مرکزمخابرات را انتخاب نمایید",

                                    });
                                    $(".telecom").select2("val", " ");
                                    $('.telecom').val({{($areacode->telecomcenter_id)}});
                                    $('.telecom').trigger('change');
                                })


                            }

                            // In your Javascript (external .js resource or <script> tag)
                            $(document).ready(function () {
                                $.fn.select2.defaults.set("theme", "classic");
                                $('.states').select2({
                                    dir: "rtl",
                                    placeholder: "استان را انتخاب نمایید",
                                });
                                $(".states").select2("val", " ");
                                $('.states').val({{($areacode->state_id)}});
                                $('.states').trigger('change');
                                showCitiesOfState({{($areacode->state_id)}});
                                $('.states').on('select2:select', function (e) {
                                    var stateId = e.params.data.id;
                                    $('.telecomCenters').remove();
                                    showCitiesOfState(stateId);

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


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
                    <form method="post">
                        {{csrf_field()}}
                        <div class="col-lg-6 userInfo">
                            <div class="form-group">
                                {{--@if($errors->has('name'))--}}
                                    {{--{{$errors->first('name')}}--}}
                                {{--@endif--}}
                                <label>نام:</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}"
                                       placeholder="نام خود را واردنمایید">
                            </div>
                            <div class="form-group">
                                <label>نام خانوادگی:</label>
                                <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}"
                                       placeholder="نام خانوادگی خود را واردنمایید">
                            </div>
                            <div class="form-group">
                                <label>شماره همراه:</label>
                                <input type="tel" name="mobile" maxlength="11" class="form-control"
                                       value="{{$user->mobile}}"
                                       placeholder="شماره همراه خود را واردنمایید">
                            </div>
                            <div class="form-group">
                                <label>کدملی(بدون خط تیره):</label>
                                <input type="text" maxlength="10" name="codemeli" class="form-control"
                                       value="{{$user->codemeli}}"
                                       placeholder="کدملی خود را واردنمایید">
                            </div>
                            <div class="form-group">
                                <label>ایمیل:</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}"
                                       placeholder="ایمیل خود را واردنمایید">
                            </div>
                            <div class="form-group">
                                <label>آدرس پستی:</label>
                                <textarea class="form-control" name="address"
                                          placeholder="آدرس پستی خودرابصورت کامل و دقیق وارد نمایید"
                                          rows="5">{{$user->address}}</textarea>
                            </div>

                        </div>
                        <div class="col-lg-6 companyInfo">
                            <div class="form-group">
                            <span id="align--5">                            مایل به تکمیل اطلاعات حقوقی برای خرید سازمانی هستم.
                            </span>
                                <label class="switch">
                                    <input type="checkbox" id="buyCompanyBtn" name="isCompany">
                                    <span class="slider round"></span>
                                </label>
                                <p>
                                    با تکمیل اطلاعات حقوقی سازمان مورد نظر خود می‌توانید اقدام به خرید سازمانی با دریافت
                                    فاکتور رسمی و گواهی ارزش افزوده نمایید
                                </p>
                            </div>
                            <div class="form-group disable">
                                <label>نام شرکت:</label>
                                <input type="text" name="companyName" class="form-control companyName"
                                       placeholder="نام شرکت را وارد نمایید" value="{{$user->companyName}}">
                            </div>
                            <div class="form-group disable">
                                <label>کداقتصادی:</label>
                                <input type="text" name="economyCode" class="form-control" value="{{$user->economyCode}}"
                                       placeholder="کداقتصادی موردنظر را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>شناسه ملی:</label>
                                <input type="tel" name="nationalCode" maxlength="11" class="form-control"
                                       value="{{$user->nationalCode}}"
                                       placeholder="شناسه ملی موردنظر را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>شماره ثبت:</label>
                                <input type="text" name="registerNumber" class="form-control"
                                       value="{{$user->registerNumber}}"
                                       placeholder="شماره ثبت شرکت را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>نام رابط:</label>
                                <input type="text" name="connectorName" class="form-control" value="{{$user->connectorName}}"
                                       placeholder="نام رابط را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>نام خانوادگی رابط:</label>
                                <input type="text" name="connectorLastname" class="form-control"
                                       value="{{$user->connectorLastname}}"
                                       placeholder="نام و نام خانوادگی رابط را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>شماره همراه رابط:</label>
                                <input type="tel" name="connectorMobile" maxlength="11" class="form-control"
                                       value="{{$user->connectorMobile}}"
                                       placeholder="شماره همراه رابط شرکت را واردنمایید">
                            </div>
                            <div class="form-group disable">
                                <label>کدملی:</label>
                                <input maxlength="10" type="text" name="connectorCodeMeli" class="form-control"
                                       value="{{$user->connectorCodeMeli}}"
                                       placeholder="کدملی رابط شرکت را واردنمایید">
                            </div>
                            <div class="form-group disable">
                                <label>ایمیل:</label>
                                <input type="email" name="connectorEmail" class="form-control" value="{{$user->connectorEmail}}"
                                       placeholder="ایمیل رابط شرکت را وارد نمایید">
                            </div>
                            <div class="form-group disable">
                                <label>آدرس شرکت:</label>
                                <textarea class="form-control" name="companyAddress"
                                          placeholder="آدرس شرکت را وارد نمایید"
                                          rows="5">{{$user->companyAddress}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">ثبت</button>
                            </div>
                        </div>
                    </form>

                    <script>

                        $(document).ready(function () {
                            let divTag = $('.companyInfo>div:not(:first-child)');
                            if($('.companyName').val()!=''){
                                $('.switch>input').prop('checked',true);
                                divTag.removeClass('disable');
                            }else{
                                $('.switch>input').prop('checked',false);
                            }
                            $('#buyCompanyBtn').click(function () {
                                if (divTag.hasClass('disable')) {
                                    divTag.removeClass('disable');
                                } else {
                                    divTag.addClass('disable');
                                }

                            })
                        });
                    </script>

                </div>
            </div>

        </section>

    </div>


@endsection


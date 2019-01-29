@extends('layout.frontend.home')
@section('content')
    <div class="adslRegisterBlock">


        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="alert alert-warning" role="alert">
                        از حسن سلیقه شما برای انتخاب ما سپاسگزاریم
                        <br>
                        لطفا جهت مشاهده شرایط ارایه سرویس ، شماره تلفن خود را وارد فرمایید
                    </div>
                    <div class="adslRegisterFormWrap">
                        <div class="waiting" style="display: none">
                            <div class="spinner-border mt-3 mb-3 text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <p class="mt-2">
                                ...لطفا منتظر بمانید
                            </p>
                        </div>
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-12 order-lg-1 order-2">
                                    <select class="form-control city" name="city">
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-12 order-lg-2 order-1">
                                    <select class="form-control state" id="exampleFormControlSelect1" name="state">
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group code col-12 order-lg-3 order-3 text-left" dir="rtl">
                                    <label>شماره تلفن :</label>
                                    <input type="text" name="telNumber" class="form-control"
                                           placeholder="شماره تلفن خود را بصورت ۸ رقمی وارد نمایید">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block order-4">تایید</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('select').niceSelect();
                $(document).ajaxStart(function () {
                    $(".waiting").fadeIn();
                });
                $(document).ajaxComplete(function () {
                    $(".waiting").fadeOut();
                });
                $('.state>ul>li').on('click', function () {
                    let stateId = $(this).data('value');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.post('/registerAdslUser/' + stateId, function (result) {
                        $('select.city>option').remove();
                        $('select.city').append(result);
                        $('.city').niceSelect('update');
                    });
                });
                $(function () {
                    $('.state>ul>li:first-child').click();
                    $('.state').toggleClass('open');
                });


            });

        </script>
        {{--<script src="{{asset('plugins/nice-select/js/jquery.js')}}"></script>--}}
        {{--<script src="{{asset('plugins/nice-select/js/jquery.nice-select.js')}}"></script>--}}


    </div>
@endsection

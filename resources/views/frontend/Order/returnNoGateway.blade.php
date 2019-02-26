@extends('layout.frontend.home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 m-0 m-auto text-center" dir="rtl">
            <div class="OrderStatusIcon mt-5">
                {{--<i class="fa fas fa-check-circle fa-5x ok" style="color: #38c172;"></i>--}}
                <i class="fa fas fa-times-circle fa-5x nok" style="color: #c1293f;"></i>
                {{--<p>پرداخت شما با موفقیت انجام شد و شماره تراکنش شما :</p>--}}
                {{--<p>1236548</p>--}}
                {{--<p>می باشد</p>--}}
                <p>خطایی در زمان پرداخت صورت گرفته است لطفا مجددا از طریق پنل خود اقدام فرمایید</p>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    {{ Breadcrumbs::render('profile.state.list') }}
@endsection

@section('adminContent')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-header">
                <h5>جزییات سفارش شماره :
                    {{$currentOrder->orderNumber}}
                </h5>
                <p id="showDateInOrderItems">
                    ثبت شده درتاریخ:
                    {{$currentOrder->present()->showDateInJalali}}
                </p>
            </div>

            @if(count($orderItems)>0)
                <div class="box box-success">
                    <div class="orderWrap">
                        <div class="orderContent table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام محصول یا سرویس</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">تخفیف (%)</th>
                                    <th scope="col">قیمت نهایی</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderItems as $orderItem)
                                    <tr class="orderTr">
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img width="50px" height="70px"
                                                 src="{{ url('/media').'/'.$orderItem->attachments->first()['name']}}"
                                                 alt="">
                                            {{$orderItem->name}}
                                        </td>
                                        <td>{{number_format($orderItem->price).'  تومان '}}</td>
                                        <td>{{$orderItem->discount}}</td>
                                        <td>{{number_format($orderItem->price-(($orderItem->price)*($orderItem->discount/100))).'  تومان '}}</td>

                                    </tr>
                                @endforeach

                            </table>
                        </div>

                    </div>
                </div>
            @else
                <div class="box box-warning text-center">
                    <div class="orderWrap">
                        <div class="orderContent">
                            <div class="alert">
                                <p>هیچ سفارشی برای شما ثبت نشده است.</p>
                            </div>

                        </div>
                    </div>
                </div>

            @endif

        </div>

        <div class="col-lg-12">
            <div>

                <a class="btn btn-info" href="{{route('user.orders')}}">برگشت به سفارش های من</a>
            </div>
        </div>



@endsection

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
                <h4>همه سفارش ها</h4>
            </div>

            @if(count($orders)>0)
                <div class="box box-body">
                    <div class="orderWrap">
                        <div class="orderContent table-responsive">
                            <table class="table table-bordered text-center">
                                <thead style="background: #d4ffd4;color: black;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">شماره سفارش</th>
                                    <th scope="col">تاریخ ثبت سفارش</th>
                                    <th scope="col">مبلغ قابل پرداخت</th>
                                    <th scope="col">عملیات پرداخت</th>
                                    <th scope="col">جزییات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="orderTr">
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$order->present()->showOrderNumber}}</td>
                                        <td>{{$order->present()->showDateInJalali}}</td>
                                        <td>{{$order->present()->showNicePrice}}</td>
                                        <td>{{$order->present()->showStatus}}</td>
                                        <td><a title="مشاهده جزییات" href="{{route('orderItemDetail',[$order->id])}}"><i
                                                    class="fa fa-angle-left fa-3x"></i></a></td>
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



@endsection

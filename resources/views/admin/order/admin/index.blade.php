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
        <section class="col-lg-12 col-md-12">
            <div class="box">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-success">
                        {{ session('warning') }}
                    </div>
                @endif

                <div class="box-header">
                    <h3 class="box-title">{{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th>شماره سفارش</th>
                            <th>جزییات سفارش</th>
                            <th>وضعیت سفارش</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allOrders as $order)
                            <tr>
                                <td class="col-lg-1">{{$loop->iteration}}</td>
                                <td>
                                    {{$order->user->name}}

                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#myModal{{$order->user->id}}">
                                        مشاهده جزییات
                                    </button>
                                    <!-- The Modal For User Detail -->
                                    <div class="modal fade" id="myModal{{$order->user->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        {{$order->user->name.' '.$order->user->lastname}}
                                                    </h4>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body orderDetailModal">
                                                    <div>
                                                                <span>
                                                     ایمیل:
                                                                   <span>
                                                                   {{$order->user->email}}
                                                       </span>
                                                        </span>
                                                        <span>
                                                            شماره همراه:
                                                             <span>

                                                                   {{$order->user->mobile}}
                                                                 </span>
                                                        </span>
                                                        <span>
                                                            کد ملی:
                                                            <span>

                                                                   {{$order->user->codemeli}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            مبلغ کیف پول:
                                                            <span>

                                                                   {{$order->user->email}}
                                                            </span>

                                                        </span><span>
                                                            آدرس:
                                                            <span>

                                                                   {{$order->user->address}}
                                                            </span>

                                                        </span>
                                                    </div>


                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">بستن
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </td>
                                <td>{{$order->orderNumber}}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#myModal{{$order->id}}">
                                        مشاهده جزییات
                                    </button>
                                </td>
                                <td>{{$order->present()->showStatus}}
                                    @if($order->status==\App\Models\Orders\OrdersStatus::PAID)
                                        (شماره تراکنش:
                                        {{$order->refId}}
                                        )
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('profile.service.edit').'?item='.$order->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-pencil-square fa-2x editColor"
                                            title="ویرایش"></i></a>
                                    <a onclick="confirmDelete(event,this)"
                                       href="{{route('profile.service.delete').'?item='.$order->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-times-circle fa-2x deleteColor" title="حذف"></i></a>
                                </td>
                            </tr>
                            <!-- The Modal For Orders Detail -->
                            <div class="modal fade" id="myModal{{$order->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">جزییات سفارش شماره :
                                                {{$order->orderNumber}}
                                            </h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body orderDetailModal">
                                            @foreach($order->order_items as $order_item)
                                                @if($order_item->item_type=='Product')
                                                    <div>
                                                        <p>
                                                            # {{$loop->iteration}}
                                                        </p>
                                                        <span>
                                                     نام محصول یا سرویس:
                                                                   <span>
                                                            {{\App\Models\Product::find($order_item->item_id)->name}}
                                                       </span>
                                                        </span>
                                                        <span>
                                                            قیمت (تومان):
                                                             <span>
                                                            {{number_format($order_item->price)}}
                                                                 </span>
                                                        </span>
                                                        <span>
                                                            میزان تخفیف (%):
                                                            <span>
                                                                {{$order_item->discount}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            مبلغ قابل پرداخت  (تومان):
                                                            <span>
                                                                {{ number_format($order_item->payable_amount)}}
                                                            </span>

                                                        </span>
                                                    </div>
                                                @else
                                                    <div>
                                                        <p>
                                                            # {{$loop->iteration}}
                                                        </p>
                                                        <span>
                                                     نام محصول یا سرویس:
                                                                   <span>
                                                        {{\App\Models\Service::find($order_item->item_id)->name}}
                                                        </span>
                                                        </span>
                                                        <span>
                                                            قیمت  (تومان):
                                                             <span>
                                                            {{number_format($order_item->price)}}
                                                                 </span>
                                                        </span>
                                                        <span>
                                                           میزان تخفیف (%):
                                                            <span>
                                                                {{$order_item->discount}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            مبلغ قابل پرداخت  (تومان):
                                                            <span>
                                                                {{number_format($order_item->payable_amount)}}
                                                            </span>

                                                        </span>
                                                    </div>

                                                @endif


                                            @endforeach
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


        </section>
    </div>


    <!-- Main row -->
    <script>
        function confirmDelete(e, tag) {
            e.preventDefault();
            let hrefOfTag = $(tag).attr('href');
            swal({
                title: "ازحذف این مورد اطمینان دارید؟",
                text: "درصورت تایید ، فیلد مورد نظر حذف می گردد!",
                icon: "warning",
                buttons: ["خیر", "بله"],
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    $(location).attr('href', hrefOfTag);
                }
            });
        }
    </script>
@endsection

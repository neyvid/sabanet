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
                            <th>عنوان سرویس</th>
                            <th>ارایه دهنده سرویس</th>
                            <th>جزییات بیشتر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="col-lg-1">{{$loop->iteration}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->oprator->name}}


                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#myModal{{$service->id}}">
                                        مشاهده جزییات
                                    </button>
                                    <!-- The Modal For User Detail -->
                                    <div class="modal fade" id="myModal{{$service->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        ارایه دهنده سرویس : شرکت
                                                        {{$service->oprator->name}}
                                                    </h4>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body orderDetailModal">
                                                    <div>
                                                                <span>
                                                     نوع سرویس:
                                                                   <span>
                                                                   {{\App\Models\Service\ServiceType::getServiceTypeWithTypeNumber($service->type)}}
                                                       </span>
                                                        </span>
                                                        <span>
                                                           طرح سرویس:
                                                             <span>

                                                                   {{\App\Models\Service\ServiceType::getServiceTypeWithTypeNumber($service->plan)}}
                                                                 </span>
                                                        </span>
                                                        <span>
                                                            مدت زمان سرویس(ماه):
                                                            <span>

                                                                   {{$service->period}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            ترافیک شبانه:
                                                            <span>

                                                                   {{$service->night_trafic==1? 'دارد':'ندارد'}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            سرعت سرویس (KB):
                                                            <span>

                                                                   {{$service->speed}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            میزان حد آستانه ماهیانه (GB):
                                                            <span>

                                                                   {{$service->limit_amount}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            میزان ترافیک بین المللی(GB):
                                                            <span>

                                                                   {{$service->international_trafic}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            قیمت سرویس(تومان):
                                                            <span>

                                                                   {{$service->price}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            تخفیف سرویس(%):
                                                            <span>

                                                                   {{$service->discount}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            توضیحات سرویس:
                                                            <span>

                                                                   {{$service->description}}
                                                            </span>

                                                        </span>
                                                        <span>
                                                            تصویر سرویس:
                                                            <span>
                                                                <img src="{{ config('upload.url').'/'.$service->attachments[0]->name }}" alt="" width="100px" height="100px">
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

                                <td>
                                    <a href="{{route('profile.service.edit').'?item='.$service->id}}"><i data-toggle="tooltip" data-placement="top"
                                                             class="fa fa-pencil-square fa-2x editColor"
                                                             title="ویرایش"></i></a>
                                    <a onclick="confirmDelete(event,this)"
                                       href="{{route('profile.service.delete').'?item='.$service->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-times-circle fa-2x deleteColor" title="حذف"></i></a>


                                </td>

                            </tr>
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

@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    {{ Breadcrumbs::render('profile.city.list') }}
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
                            <th>نام فایل</th>
                            <th>نوع فایل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attachments as $attachment)
                            <tr>
                                <td class="col-lg-1">{{$loop->iteration}}</td>
                                <td class="text-right" dir="ltr">{{$attachment->name}}</td>
                                <td class="text-right"
                                    dir="ltr">
                                    @foreach($attachment->services as $attachOfService)

                                        {{$attachOfService->pivot->attachable_type}}

                                    @endforeach
                                </td>
                                <td>{{\App\Models\Attachment\AttachmentType::getTypeWithTypeNumber($attachment->type)}}</td>
                                <td>
                                    <a onclick="confirmDelete(event,this)"
                                       href="{{route('profile.attachment.delete').'?item='.$attachment->id}}"><i
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

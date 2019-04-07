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





                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ردیف</th>

                                <th>متن دیدگاه</th>
                                <th>درجواب دیدگاه</th>
                                <th>مربوط به مقاله با عنوان</th>
                                <th>وضعیت</th>
                                {{--<th>عملیات</th>--}}
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comments as $comment)

                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td>{{$comment->body}}</td>
                                    <td>{{$comment->parent['body']!=null ?$comment->parent['body'] : '-' }}</td>


                                    <td>{{$comment->commentable->title}}</td>
                                    <td class="text-center align-middle">
                                            <i
                                                data-toggle="tooltip" data-placement="top"
                                                title="{{\App\Models\Comment\CommentStatus::get_Comment_status_With_Status_Number($comment->status)}}"
                                                class="{{\App\Models\Comment\CommentStatus::getClassForStatus($comment->status)}}"></i>

                                    </td>
                                    {{--<td class="text-center align-middle">--}}
                                        {{--<a href="{{route('profile.comment.edit').'?item='.$comment->id}}"><i--}}
                                                {{--data-toggle="tooltip" data-placement="top"--}}
                                                {{--class="fa fa-pencil-square fa-2x editColor"--}}
                                                {{--title="ویرایش"></i></a>--}}
                                        {{--<a onclick="confirmDelete(event,this)"--}}
                                           {{--href="{{route('profile.comment.delete').'?item='.$comment->id}}">--}}
                                            {{--<i data-toggle="tooltip" data-placement="top"--}}
                                               {{--class="fa fa-times-circle fa-2x deleteColor" title="حذف"></i>--}}
                                        {{--</a>--}}


                                    {{--</td>--}}

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

        $(document).ready(function () {
            var checkbox_input = $('.checkbox_input');

            $('.check_all').on('click', function (e) {
                checkbox_input.prop('checked', $(this).prop('checked'));
                $('.publicActionBtnWrap>button').prop('disabled', !$(this).prop('checked'))
            });

        });


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

        function confirmAllDelete(e, tag) {
            e.preventDefault();
            let hrefOfTag = $(tag).attr('href');
            swal({
                title: "ازحذف کلی همه موارد اطمینان دارید؟",
                text: "درصورت تایید ، همه فیلد ها حذف خواهند شد و امکان بازیابی ندارید!",
                icon: "warning",
                buttons: ["خیر", "بله"],
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    $(location).attr('href', hrefOfTag);
                }
            });
        }

        function confirmAllConfirm(e, tag) {
            e.preventDefault();
            let hrefOfTag = $(tag).attr('href');
            swal({
                title: "از تایید کلی همه این موارد اطمینان دارید؟",
                text: "درصورت تایید ، همه نظرات تایید و انتشار خواهند یافت!",
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

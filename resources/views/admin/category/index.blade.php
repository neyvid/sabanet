@extends('layout.admin.admin')

@section('adminContent-header')
    <h1>
        داشبرد
        <small>کنترل پنل</small>
    </h1>
    {{--{{ Breadcrumbs::render('profile.city.list') }}--}}
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
                            <th>نام دسته بندی</th>
                            <th>سردسته</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="col-lg-1">{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{isset($category->parent)? $category->parent->name : '--'}}</td>
                                <td>
                                    <a href="{{route('profile.category.edit').'?item='.$category->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-pencil-square fa-2x editColor"
                                            title="ویرایش"></i></a>
                                    <a onclick="confirmDelete(event,this)"
                                       href="{{route('profile.category.delete').'?item='.$category->id}}"><i
                                            data-toggle="tooltip" data-placement="top"
                                            class="fa fa-times-circle fa-2x deleteColor" title="حذف" data-obj="{{count($category->children)}}"></i></a>
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
            let checkHaveChildren=$(tag).find('>i').data('obj');
            let exist='';
            if(checkHaveChildren>0){
                exist='(این گروه دارای زیر دسته می باشد، لذا با حذف این گروه تمام زیر دسته های آن هم حذف خواهند گردید)'
            }

            let hrefOfTag = $(tag).attr('href');
            swal({
                title: "ازحذف این مورد اطمینان دارید؟",
                text: "درصورت تایید ، فیلد مورد نظر حذف می گردد "  + " " +  exist,
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

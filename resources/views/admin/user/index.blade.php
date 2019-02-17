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

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name.' '.$user->lastname}}</h3>
                    {{--<p class="text-muted text-center">مهندس نرم افزار</p>--}}
                    <div class="col-lg-6">

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>نام و نام خانوادگی:</b>
                            <a class="pull-left">{{$user->name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>شماره همراه:</b> <a class="pull-left">{{$user->mobile}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>دریافت خبرنامه:</b> <a class="pull-left">بلی</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>پست الکترونیک:</b> <a class="pull-left">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>کدملی:</b> <a class="pull-left">1291998225</a>
                            </li>
                            <li class="list-group-item">
                                <b>شماره کارت:</b> <a class="pull-left">6037-5585-6895-2012</a>
                            </li>
                        </ul>
                    </div>

                    <a href="{{route('user.edit')}}" class="btn btn-primary btn-block col-lg-12"><b>ویرایش اطلاعات</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">درباره من</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>

                    <p class="text-muted">
                        لیسانس نرم افزار کامپیوتر
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>

                    <p class="text-muted">ایران، تهران</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> توانایی ها</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">laravel</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> یادداشت</strong>

                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">فعالیت ها</a></li>
                    <li><a href="#timeline" data-toggle="tab">تایم لاین</a></li>
                    <li><a href="#settings" data-toggle="tab">تنظیمات</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                     alt="user image">
                                <span class="username">
                          <a href="#">جانی آیو</a>
                          <a href="#" class="pull-left btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">ارسال شده در ۱۲ اردیبهشت ۱۳۹۶</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>
                            <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> اشتراک
                                        گذاری</a></li>
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i>
                                        لایک</a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>
                                        نظر
                                        (5)</a></li>
                            </ul>

                            <input class="form-control input-sm" type="text" placeholder="نظر">
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg"
                                     alt="User Image">
                                <span class="username">
                          <a href="#">سارا روس</a>
                          <a href="#" class="pull-left btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">ارسال شده ۲ ساعت پیش</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </p>

                            <form class="form-horizontal">
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-9">
                                        <input class="form-control input-sm" placeholder="پاسخ">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">ارسال
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg"
                                     alt="User Image">
                                <span class="username">
                          <a href="#">آدام جونز</a>
                          <a href="#" class="pull-left btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                <span class="description">ارسال شده ۲ روز پیش</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="row margin-bottom">
                                <div class="col-sm-6">
                                    <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                            <br>
                                            <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                            <br>
                                            <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <ul class="list-inline">
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> اشتراک
                                        گذاری</a></li>
                                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i>
                                        لایک</a>
                                </li>
                                <li class="pull-right">
                                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>
                                        نظر
                                        (5)</a></li>
                            </ul>

                            <input class="form-control input-sm" type="text" placeholder="نظر">
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                  <span class="bg-red">
                    ۱۲ اردیبهشت ۱۳۹۴
                  </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">تیم پشتیبانی</a> یک ایمیل برای شما ارسال کرد
                                    </h3>

                                    <div class="timeline-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد.
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-xs">ادامه</a>
                                        <a class="btn btn-danger btn-xs">حذف</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-user bg-aqua"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 5 دقیقه پیش</span>

                                    <h3 class="timeline-header no-border"><a href="#">سارا</a> درخواست دوستی شما را قبول
                                        کرد</h3>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-comments bg-yellow"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 27 دقیقه پیش</span>

                                    <h3 class="timeline-header"><a href="#">جواد</a> در پست شما نظر گذاشت</h3>

                                    <div class="timeline-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است.
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-warning btn-flat btn-xs">نمایش نظر</a>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                  <span class="bg-green">
                   ۱۲ خرداد ۱۳۹۴
                  </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-camera bg-purple"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 2 روز پیش</span>

                                    <h3 class="timeline-header"><a href="#">مینا</a> تصویر آپلود کرد</h3>

                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">نام</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="نام">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">ایمیل</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">نام خانوادگی</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="نام خانوادگی">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">ویژگی ها</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience"
                                              placeholder="ویژگی ها"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">توانایی ها</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="توانایی ها">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>


@endsection

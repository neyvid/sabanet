<!-- right side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{asset('images/admin/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>{{Auth::user()->name. Auth::user()->lastname}}</p>
                {{--<a href="#"><i class="fa fa-circle text-success"></i>آنلاین</a>--}}
            </div>
        </div>
        <!-- search form -->
    {{--<form action="#" method="get" class="sidebar-form">--}}
    {{--<div class="input-group">--}}
    {{--<input type="text" name="q" class="form-control" placeholder="جستجو">--}}
    {{--<span class="input-group-btn">--}}
    {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
    {{--</button>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</form>--}}
    <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">


            @role(\App\Models\Roles\Roles::MANAGER)
            <li class="header">منو</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-flag"></i> <span>مدیریت استان ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.state.list')}}"><i class="fa fa-circle-o"></i>لیست
                            استان ها</a></li>
                    <li><a href="{{route('profile.state.create')}}"><i class="fa fa-circle-o"></i>تعریف استان جدید</a>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i> <span>مدیریت شهرها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.city.list')}}"><i class="fa fa-circle-o"></i>لیست شهرها</a>
                    </li>
                    <li><a href="{{route('profile.city.create')}}"><i class="fa fa-circle-o"></i>تعریف شهر جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i> <span>مدیریت مراکزمخابراتی</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.telecomcenter.list')}}"><i class="fa fa-circle-o"></i>لیست
                            مراکزمخابرات</a></li>
                    <li><a href="{{route('profile.telecomcenter.create')}}"><i class="fa fa-circle-o"></i>تعریف
                            مرکزمخابرات جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wifi"></i> <span>مدیریت اپراتورها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.oprator.list')}}"><i class="fa fa-circle-o"></i>لیست
                            اپراتورها</a></li>

                    <li><a href="{{route('profile.oprator.create')}}"><i class="fa fa-circle-o"></i>تعریف اپراتور
                            جدید</a></li>
                    <li><a href="{{route('profile.service.list')}}"><i class="fa fa-circle-o"></i>لیست سرویس
                            اپراتورها</a></li>
                    <li><a href="{{route('profile.service.create')}}"><i class="fa fa-circle-o"></i>تعریف سرویس
                            جدید</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sort-numeric-desc"></i> <span>مدیریت پیش شماره ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.areacode.list')}}"><i class="fa fa-circle-o"></i>لیست
                            پیش شماره ها</a></li>
                    <li><a href="{{route('profile.areacode.create')}}"><i class="fa fa-circle-o"></i>تعریف پیش شماره
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-server"></i> <span>مدیریت دسته بندی ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.category.list')}}"><i class="fa fa-circle-o"></i>لیست
                            دسته بندی ها</a></li>
                    <li><a href="{{route('profile.category.create')}}"><i class="fa fa-circle-o"></i>تعریف دسته بندی
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>مدیریت محصولات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.product.list')}}"><i class="fa fa-circle-o"></i>لیست
                            محصولات</a></li>
                    <li><a href="{{route('profile.product.create')}}"><i class="fa fa-circle-o"></i>تعریف محصول
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>مدیریت سفارش ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.orders.list')}}"><i class="fa fa-circle-o"></i>لیست
                            سفارش ها</a></li>
                    <li><a href="{{route('profile.orders.create')}}"><i class="fa fa-circle-o"></i>تعریف سفارش
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>مدیریت کاربران</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.users.list')}}"><i class="fa fa-circle-o"></i>لیست
                            کاربران</a></li>
                    <li><a href="{{route('profile.user.create')}}"><i class="fa fa-circle-o"></i>تعریف کاربر
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>مدیریت مقاله ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.articles.list')}}"><i class="fa fa-circle-o"></i>لیست
                            مقاله ها</a></li>
                    <li><a href="{{route('profile.article.create')}}"><i class="fa fa-circle-o"></i>ایجاد مقاله
                            جدید</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments-o"></i> <span>مدیریت دیدگاه ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.comments.list')}}"><i class="fa fa-circle-o"></i>لیست
                            دیدگاه ها</a></li>
                    <li><a href="{{route('profile.article.create')}}"><i class="fa fa-circle-o"></i>ایجاد دیدگاه
                            جدید</a></li>
                </ul>
            </li>  <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>مدیریت فایل ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('profile.attachment.list')}}"><i class="fa fa-circle-o"></i>لیست
                            فایل ها </a></li>
                    {{--<li><a href="{{route('profile.article.create')}}"><i class="fa fa-circle-o"></i>ایجاد فایل--}}
                    {{--جدید</a></li>--}}
                </ul>
            </li>
            @endrole


            <li class="header">حساب کاربری من</li>
            <li><a href="{{route('user.index')}}"><i class="fa fa-user text-yellow"></i> <span>پروفایل</span></a></li>
            <li><a href="{{route('user.orders')}}"><i class="fa fa-shopping-cart text-yellow"></i>
                    <span>سفارش های من</span></a></li>

            <li><a href="{{route('user.comment')}}"><i class="fa fa-comments-o text-yellow"></i>
                    <span>دیدگاه های من</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

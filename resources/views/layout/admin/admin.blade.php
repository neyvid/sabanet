@include('layout.admin.header')

@include('layout.admin.rightMainSide')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('adminContent-header')
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('adminContent')

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layout.admin.footer')

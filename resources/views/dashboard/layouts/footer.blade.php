<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a target="_blank" href="https://github.com/nordeveloper/laravelshop">LaravelShop</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b>1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('/adminlte/plugins/moment/moment.min.js')}}"></script>

<script src="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('/adminlte/plugins/chart.js/Chart.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{asset('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/dist/js/adminlte.js')}}"></script>


<script>
    $(function () {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');
        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
            // .css({'display': 'block'})
            .addClass('menu-open').prev('a')
            .addClass('active');
    });
</script>

</body>
</html>

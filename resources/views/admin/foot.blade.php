<!-- jQuery -->
{!! Html::script('admin/assets/vendors/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{!! Html::script('admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! Html::script('admin/assets/vendors/fastclick/lib/fastclick.js') !!}
<!-- NProgress -->
{!! Html::script('admin/assets/vendors/nprogress/nprogress.js') !!}
<!-- gauge.js -->
{!! Html::script('admin/assets/vendors/gauge.js/dist/gauge.min.js') !!}
<!-- bootstrap-progressbar -->
{!! Html::script('admin/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}
<!-- iCheck -->
{!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}
<!-- JQVMap -->
{!! Html::script('admin/assets/vendors/jqvmap/dist/jquery.vmap.js') !!}
{!! Html::script('admin/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') !!}
{!! Html::script('admin/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') !!}
<!-- PNotify -->
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.js') !!}
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.buttons.js') !!}
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.nonblock.js') !!}
<!-- Custom Theme Scripts -->
@yield('scripts')
{!! Html::script('admin/assets/build/js/custom.min.js') !!}

<script>
    var lastId = {{ App\Models\Announcement::todayAnnouncements()->first() != null ? App\Models\Announcement::todayAnnouncements()->first()->id : 0 }};
    var notficationCount = {{ \App\Library\MyClass::INFO_COUNT }};
    var _token = "{{ csrf_token() }}";
</script>
{!! Html::script('admin/js/apper.js') !!}

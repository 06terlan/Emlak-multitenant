<!-- jQuery -->
{!! Html::script('admin/assets/vendors/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{!! Html::script('admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- NProgress -->
{!! Html::script('admin/assets/vendors/nprogress/nprogress.js') !!}
<!-- bootstrap-progressbar -->
{!! Html::script('admin/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}
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
    var link = "{{ route('getLastAnnouncementAjax') }}";
</script>
{!! Html::script('admin/js/apper.js') !!}

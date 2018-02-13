<!-- new JS and jQuery -->
{!! Html::script('admin/assets/build/new/Scripts/jquery.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery-ui.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/bootstrap.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/bootstrap-select.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/select2.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery.multi-select.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery.inputmask.bundle.min.js') !!}

<script>

        // Handles the go to top button at the footer
  /*      var handleGoTop = function () {
            var offset = 300;
            var duration = 500;

            if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) { // ios supported
                $(window).bind("touchend touchcancel touchleave", function (e) {
                    if ($(this).scrollTop() > offset) {
                        $('.scroll-to-top').fadeIn(duration);
                    } else {
                        $('.scroll-to-top').fadeOut(duration);
                    }
                });
            } else { // general
                $(window).scroll(function () {
                    if ($(this).scrollTop() > offset) {
                        $('.scroll-to-top').fadeIn(duration);
                    } else {
                        $('.scroll-to-top').fadeOut(duration);
                    }
                });
            }

            $('.scroll-to-top').click(function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, duration);
                return false;
            });
        };

        jQuery(document).ready(function () {
            handleGoTop();
        });*/

    </script>
<!-- NProgress -->
{!! Html::script('admin/assets/vendors/nprogress/nprogress.js') !!}
<!-- bootstrap-progressbar -->
{!! Html::script('admin/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}
<!-- PNotify -->
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.js') !!}
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.buttons.js') !!}
{!! Html::script('admin/assets/vendors/pnotify/dist/pnotify.nonblock.js') !!}
<!-- Custom Theme Scripts -->
{!! Html::script('admin/assets/build/js/custom.min.js') !!}
@yield('scripts')


<script>
    var lastId = {{ App\Models\Announcement::todayAnnouncements()->first() != null ? App\Models\Announcement::todayAnnouncements()->first()->id : 0 }};
    var notficationCount = {{ \App\Library\MyClass::INFO_COUNT }};
    var _token = "{{ csrf_token() }}";
    var link = "{{ route('getLastAnnouncementAjax') }}";
</script>
{!! Html::script('admin/js/apper.js?1') !!}

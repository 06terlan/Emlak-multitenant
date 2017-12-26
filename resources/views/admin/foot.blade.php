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
    $(function() {
        var lastId = {{ App\Models\Announcement::todayAnnouncements()->first() != null ? App\Models\Announcement::todayAnnouncements()->first()->id : 0 }};
        var notficationCount = {{ \App\Library\MyClass::INFO_COUNT }};
        var interval_id = 0;

        function getNewAnn()
        {
            $.post( "{{ route('getLastAnnouncementAjax') }}", { lastId: lastId, _token: "{{ csrf_token() }}" }, function( data ) {
                //console.log(data);

                var currentNotficationCount = $("#menu1>li:not(.more)").length;
                if(data['status'] == 'success')
                {
                    if( data['announcement'].length > 0 )
                    {
                        lastId = data['lastId'];
                        for(var n in data['announcement'])
                        {
                            new PNotify({
                                title: 'Yeni elan var',
                                text: data['announcement'][n]['header'],
                                type: 'info',
                                hide: true,
                                delay: 2000,
                                text_escape: false,
                                styling: 'bootstrap3'
                            });
                            currentNotficationCount++;
                        }
                        $("#menu1").prepend(data['view']);


                        if(currentNotficationCount > notficationCount)
                        {
                            $("#menu1 li:not(.more):gt(" + (notficationCount-1) + ")").remove();
                            $("#not-count").text(notficationCount + "+");
                            $("#menu1 li.more").removeClass('hidden');
                        }
                        else $("#not-count").text(currentNotficationCount);
                    }

                    interval_id = setTimeout(getNewAnn, 1000);
                }
                else
                {
                    new PNotify({
                        title: 'Səhv oldu!',
                        text: 'İnternet kəsilib vəya xəta var.',
                        type: 'error',
                        hide: false,
                        styling: 'bootstrap3'
                    });
                }

            });
        }

        $(window).focus(function() {
            if (!interval_id)
                interval_id = setTimeout(getNewAnn, 1000);
        });

        $(window).blur(function() {
            clearInterval(interval_id);
            interval_id = 0;
        });
    });
</script>


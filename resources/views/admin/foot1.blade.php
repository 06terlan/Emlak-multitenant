<!-- new JS and jQuery -->
{!! Html::script('admin/assets/build/new/Scripts/jquery.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery-ui.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/bootstrap.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/bootstrap-select.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/select2.min.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery.multi-select.js') !!}
{!! Html::script('admin/assets/build/new/plugins/jquery.inputmask.bundle.min.js') !!}


<script type="text/javascript">

            function openSearchTab()
            {
                $('.nav-tabs a[href="#search"]').tab('show');
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            }

            function getSliderText(a, b)
            {
                return a + " - " + b;
            };

                    //check touch screen availability and show appropriate content
                    var is_touch_device = 'ontouchstart' in document.documentElement;
                    if (is_touch_device) {
                        $('#floorLabelForNonTouch').addClass("hidden");
                        $('#floorContentForNonTouch').addClass("hidden");
                    } else
                    {
                        $('#floorLabelForTouch').addClass("hidden");
                        $('#floorContentForTouch').addClass("hidden");
                    }

                    $('#entityType, #purpose').change( showAppFilters );
                    showAppFilters();

                    $('#city').select2();

                    $("#subwayStation, #region, #district, #orientmark").select2({
                        allowClear: true
                    });


                    $('#minPrice, #maxPrice, #minArea, #maxArea, #minParcelArea, #maxParcelArea').inputmask("decimal", {
                            radixPoint: ".",
                            groupSeparator: " ",
                            digits: 2,
                            autoGroup: true,
                            removeMaskOnSubmit: true,
                        });



                        $("#slider-range").slider({
                            //isRTL: Metronic.isRTL(),
                            range: true,
                            min: 1,
                            max: 31,
                            values: [$('#minFloor').val(), $('#maxFloor').val()],
                            slide: function (event, ui) {
                                $("#slider-range-amount").text(getSliderText(ui.values[0], ui.values[1]));
                                $('#minFloor').selectpicker('val', ui.values[0]);
                                $('#maxFloor').selectpicker('val', ui.values[1]);
                            }
                        });

                       $("#slider-range-amount").text(getSliderText($("#slider-range").slider("values", 0), $("#slider-range").slider("values", 1)));

                       $('#purpose, #entityType, #buildingType, #ownerType, #minFloor, #maxFloor, #remakeType, #documentType, #loanType').selectpicker();

        </script>

    <script>
        // price format
        $('.price-amount').each(function(){
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1 ") );
        });
    </script>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-89342947-1', 'auto');
      ga('send', 'pageview');




    </script>
        

<script>

        // Handles the go to top button at the footer
        var handleGoTop = function () {
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
        });

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

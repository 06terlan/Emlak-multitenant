
    <!--   Core JS Files   -->
{!! Html::script('admin/assets/build/js/jquery-1.11.1.min.js') !!}
{!! Html::script('admin/assets/build/huseynzade/js/popper.min.js') !!}


{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-material-design.min.js') !!}


{!! Html::script('admin/assets/build/huseynzade/js/perfect-scrollbar.jquery.min.js') !!}



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
{!! Html::script('admin/assets/build/huseynzade/js/moment.min.js') !!}

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-datetimepicker.min.js') !!}

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
{!! Html::script('admin/assets/build/huseynzade/js/nouislider.min.js') !!}



<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-selectpicker.js') !!}

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-tagsinput.js') !!}

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
{!! Html::script('admin/assets/build/huseynzade/js/jasny-bootstrap.min.js') !!}

<!-- Plugins for presentation and navigation  -->
{!! Html::script('admin/assets/build/huseynzade/js/modernizr.js') !!}




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

{!! Html::script('admin/assets/build/huseynzade/js/material-dashboard.js?v=2.0.0.js') !!}



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
{!! Html::script('admin/assets/build/huseynzade/js/core.js') !!}

<!-- Library for adding dinamically elements -->
{!! Html::script('admin/assets/build/huseynzade/js/arrive.min.js') !!}

<!-- Forms Validations Plugin -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.validate.min.js') !!}

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
{!! Html::script('admin/assets/build/huseynzade/js/chartist.min.js') !!}

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.bootstrap-wizard.js') !!}

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-notify.js') !!}

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<!--{!! Html::script('admin/assets/build/huseynzade/js/jquery-jvectormap.js') !!} -->

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
{!! Html::script('admin/assets/build/huseynzade/js/nouislider.min.js') !!}

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.select-bootstrap.js') !!}

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.datatables.js') !!}

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
{!! Html::script('admin/assets/build/huseynzade/js/sweetalert2.js') !!}

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
{!! Html::script('admin/assets/build/huseynzade/js/jasny-bootstrap.min.js') !!}

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
{!! Html::script('admin/assets/build/huseynzade/js/fullcalendar.min.js') !!}

<!-- demo init -->
{!! Html::script('admin/assets/build/huseynzade/js/demo.js?1') !!}



@yield('scripts')






<script>
    var lastId = {{ App\Models\Announcement::todayAnnouncements()->first() != null ? App\Models\Announcement::todayAnnouncements()->first()->id : 0 }};
    var notficationCount = {{ \App\Library\MyClass::INFO_COUNT }};
    var _token = "{{ csrf_token() }}";
    var link = "{{ route('getLastAnnouncementAjax') }}";
</script>



<script type="text/javascript">
	$(document).ready(function(){
	//init wizard
	demo.initMaterialWizard();
	// Javascript method's body can be found in assets/js/demos.js
	demo.initDashboardPageCharts();
	demo.initCharts();
	});
</script>

<script type="text/javascript">
	/*$(document).ready(function(){
	demo.initVectorMap();
	});*/
</script>


<!-- Sharrre libray -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.sharrre.js') !!}



<script>

	$(document).ready(function(){
	    $('#twitter').sharrre({
	      share: {
	        twitter: true
	      },
	      enableHover: false,
	      enableTracking: false,
	      enableCounter: false,
	      buttons: { twitter: {via: 'CreativeTim'}},
	      click: function(api, options){
	        api.simulateClick();
	        api.openPopup('twitter');
	      },
	      template: '<i class="fa fa-twitter"></i> Twitter',
	      url: ''
	    });

	    $('#facebook').sharrre({
	      share: {
	        facebook: true
	      },
	      enableHover: false,
	      enableTracking: false,
	      enableCounter: false,
	      click: function(api, options){
	        api.simulateClick();
	        api.openPopup('facebook');
	      },
	      template: '<i class="fa fa-facebook-square"></i> Facebook',
	      url: ''
	    });

	    $('#google').sharrre({
	      share: {
	        googlePlus: true
	      },
	      enableCounter: false,
	      enableHover: false,
	      enableTracking: true,
	      click: function(api, options){
	        api.simulateClick();
	        api.openPopup('googlePlus');
	      },
	      template: '<i class="fa fa-google-plus"></i> Google',
	      url: 'http://demos.creative-tim.com/material-kit-pro/presentation.html'
	    });
	});


	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-46172202-1']);
	_gaq.push(['_trackPageview']);

	(function() {
	    var ga = document.createElement('script');
	    ga.type = 'text/javascript';
	    ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(ga, s);
	})();

	// Facebook Pixel Code Don't Delete
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','//connect.facebook.net/en_US/fbevents.js');

	try{
		fbq('init', '111649226022273');
		fbq('track', "PageView");

	}catch(err) {
		console.log('Facebook Track Error:', err);
	}

</script>






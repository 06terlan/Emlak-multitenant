@extends('auth.app')

@section('content')

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <div id="container" xmlns="">
        <img src="{{ asset('admin/images/login/bg-1.jpg') }}" style="background-image: url( {{asset('/admin/images/login/loading.gif')}} )">
        <img src="{{ asset('/admin/images/login/bg-2.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
        <img src="{{ asset('/admin/images/login/bg-3.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
        <img src="{{ asset('/admin/images/login/bg-4.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
    </div>


      <script type="text/javascript">
        if (document.readyState === 'complete') {
            if (window.location != window.parent.location) {
              const elements = document.getElementsByClassName("iframe-extern");
              while (elemnts.lenght > 0) elements[0].remove();
                // $(".iframe-extern").remove();
            }
        };
      </script>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
    <div class="container">
    <div class="navbar-wrapper">
          <!-- <a class="navbar-brand" href="#pablo">Online Əmlak Bazası</a> -->
          <a class="navbar-brand" href="#pablo">
              <img style="width: 150px; height: 100px; margin-top: -25px" src="assets/build/huseynzade/img/login_ag.png">
          </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Menu</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Göstəriş paneli
                    </a>
                </li>
                <li class= "nav-item ">
                    <a href="register" class="nav-link">
                        <i class="material-icons">person_add</i>
                        Qeydiyyat
                    </a>
                </li>
                <li class= "nav-item  active ">
                    <a href="#login" class="nav-link">
                        <i class="material-icons">fingerprint</i>
                        Daxil ol
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->


        <div class="wrapper wrapper-full-page">
            <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('img/x0x0.jpg'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

            <div class="container">
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="post" action="{{ route('admin.login') }}">





                                <br /> <br /> <br />
                                <div></div>

                                <div class="card card-login card-hidden">

                                    <div class="card-header card-header-rose text-center">
                                    <h4 class="card-title">Giriş</h4>
                                        <div class="social-line">
                                            <a href="#facebook" class="btn btn-just-icon btn-link btn-white">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#twitter" class="btn btn-just-icon btn-link btn-white">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#google" class="btn btn-just-icon btn-link btn-white">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>

                                <div class="card-body ">

                                    <p class="card-description text-center">Məlumatları daxil et</p>
                                          <span class="bmd-form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">face</i>
                                                </span>
                                              </div>
                                                  <input type="text" name="login" class="form-control" placeholder="İstifadəçi adı ..." value="{{ old('login') }}">
                                            </div>
                                          </span>


                                        <span class="bmd-form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                              </div>
                                                <input type="password" name="password" class="form-control" placeholder="Parolu ...">
                                              </div>
                                        </span>

                                    </div> <br/>

                                        {{ csrf_field() }}
                                    <div class="container-login100-form-btn">
                                        <button class="btn btn-rose btn-link btn-lg" type="submit">
                                            Daxİl Ol
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>



                        <footer class="footer ">

                            <div class="container">
                                <nav class="pull-left">
                                    <ul>
                                        <li>
                                            <a href="">
                                                Əmlak Bazası
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                               Dəstək
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                               Müqavilə
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Bizimlə Əlaqə
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="copyright pull-right">
                                    &copy; <script>document.write(new Date().getFullYear())</script>, <a href="" target="_blank">bazam.az</a>
                                </div>
                            </div>


                        </footer>
 

                    </div>
                </div>




    <div id="dropDownSelect1"></div>
@endsection
@section('script')

<!--   Core JS Files   -->
{!! Html::script('admin/assets/build/huseynzade/js/jquery.min.js') !!}
{!! Html::script('admin/assets/build/huseynzade/js/popper.min.js') !!}


{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-material-design.min.js') !!}


{!! Html::script('admin/assets/build/huseynzade/js/perfect-scrollbar.jquery.min.js') !!}



<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>


<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
{!! Html::script('admin/assets/build/huseynzade/js/moment.min.js') !!}

<!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-datetimepicker.min.js') !!}

<!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
{!! Html::script('admin/assets/build/huseynzade/js/nouislider.min.js') !!}



<!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-selectpicker.js') !!}

<!--    Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
{!! Html::script('admin/assets/build/huseynzade/js/bootstrap-tagsinput.js') !!}

<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
{!! Html::script('admin/assets/build/huseynzade/js/jasny-bootstrap.min.js') !!}

<!-- Plugins for presentation and navigation  -->
{!! Html::script('admin/assets/build/huseynzade/js/modernizr.js') !!}




<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

{!! Html::script('admin/assets/build/huseynzade/js/material-dashboard.js?v=2.0.0') !!}



<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

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
{!! Html::script('admin/assets/build/huseynzade/js/jquery-jvectormap.js') !!}

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
{!! Html::script('admin/assets/build/huseynzade/js/demo.js') !!}


<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


    <script>
        $('#container img').load(function(){
            $(this).css('background','none');
        });
    </script>
@endsection

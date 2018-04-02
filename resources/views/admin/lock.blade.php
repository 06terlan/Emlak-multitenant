@extends('admin.masterpage_lock')

@section('content')
    @include('admin.error')
{!! Html::style('admin/assets/build/css/login_page.css?v=1') !!}
<div id="container" xmlns="">
        <img src="{{ asset('admin/images/login/bg-1.jpg') }}" style="background-image: url( {{asset('/admin/images/login/loading.gif')}} )">
        <img src="{{ asset('/admin/images/login/bg-2.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
        <img src="{{ asset('/admin/images/login/bg-3.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
        <img src="{{ asset('/admin/images/login/bg-4.jpg') }}" style="background-image: url( {{ asset('/admin/images/login/loading.gif') }} )">
    </div>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
	<div class="container">
    <div class="navbar-wrapper">
        <a class="navbar-brand" href="#lock">
          <img style="width: 150px; height: 100px; margin-top: -25px" src="assets/build/huseynzade/img/login_ag.png">
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a href="../dashboard.html" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Dashboard
                    </a>
                </li>
                <li class= "nav-item ">
                    <a href="register.html" class="nav-link">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li> -->
                <li class= "nav-item ">
                    <a href="{{ URL::to('admin/logout') }}" class="nav-link">
                        <i class="material-icons">fingerprint</i>
                        Çıxış
                    </a>
                </li>

                <li class= "nav-item  active ">
                    <a href="lock.html" class="nav-link">
                        <i class="material-icons">lock_open</i>
                        Kİlİdİ Aç
                    </a>
                </li>
            </ul>
        </div>
	</div>
</nav>
<!-- End Navbar -->


    <div class="wrapper wrapper-full-page">
            <div class="page-header lock-page header-filter" style="background-image: url('../../assets/img/lock.jpg'); background-size: cover; background-position: top center;">
    <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->

      <div class="container">
          <div class="col-md-4 ml-auto mr-auto">


<form class="form" method="post" action="{{ route('admin.login') }}">




<div class="card card-profile text-center card-hidden">

    <div class="card-header ">
    <div class="card-avatar">
          								<a href="#pablo">
          									<img class="img" src="{{ asset(Auth::user()->photo()) }}">
          								</a>
          							</div>
    </div>

    <div class="card-body ">



        <h4 class="card-title">{{ Auth::user()->fullname() }}</h4>









            <div class="form-group">
   <label for="exampleInput1" class="bmd-label-floating">Parolunuzu daxil edin</label>
   <input type="email" class="form-control" id="exampleInput1">

</div>



    </div>


{{ csrf_field() }}
    <div class="card-footer justify-content-center">
        <a href="#pablo" class="btn btn-rose btn-round">Kilidi aç</a>
    </div>

</div>

</form>

          </div>
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
                                    &copy; <script>document.write(new Date().getFullYear())</script>,  <a href="" target="_blank">www.bazam.az</a>
                                </div>
                            </div>


                        </footer>


    </div>


@endsection

@section('scripts')
  <script type="text/javascript">
    if (document.readyState === 'complete') {
        if (window.location != window.parent.location) {
          const elements = document.getElementsByClassName("iframe-extern");
          while (elemnts.lenght > 0) elements[0].remove();
            // $(".iframe-extern").remove();
        }
    };
  </script>



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
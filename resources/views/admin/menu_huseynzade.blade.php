




        <div class="wrapper">
            <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="" class="simple-text logo-mini">
             OB
        </a>

        <a href="" class="simple-text logo-normal">
             Online Baza
        </a>

    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset(Auth::user()->photo()) }}" alt="" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                       {{ Auth::user()->fullname() }}
                      <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> MH </span>
                              <span class="sidebar-normal"> Mənim hesabım </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('admin/profile') }}">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Profilə düzəliş et </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> P </span>
                              <span class="sidebar-normal"> Parolu dəyiş </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @php $currentRoute = \Request::route()->getName(); @endphp
            @foreach(\App\Library\MyClass::$modules as $val)
                @if( isset($val['child']) )
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples{{ $loop->iteration }}">
                            <i class="material-icons">{{ $val['icon'] }}</i>
                            <p> {{ $val['name'] }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples{{ $loop->iteration }}">
                            <ul class="nav">
                                @foreach($val['child'] as $k => $v)
                                    @if( \App\Library\MyHelper::has_priv($v['route'], $v['priv']) )
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route($v['route']) }}">
                                                <span class="sidebar-mini"> {{ $v['icon'] }} </span>
                                                <span class="sidebar-normal"> {{ $v['name'] }} </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @else
                    @if( \App\Library\MyHelper::has_priv($val['route'], $val['priv']) )
                        <li class="nav-item {{ $currentRoute == $val['route'] ? 'active':'' }}">
                            <a class="nav-link" href="{{ route($val['route']) }}">
                                <i class="material-icons">{{ $val['icon'] }}</i>
                                <p> {{ $val['name'] }} </p>
                            </a>
                        </li>
                    @endif
                @endif
            @endforeach

        </ul>
    </div>
</div>


    <div class="main-panel">
                <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
          <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                  <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                  <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
                  <a class="navbar-brand" href="#huseynzade">Dashboard</a>
              </div>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Axtarış...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                </div>
            </form>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#huseynzade">
            <i class="material-icons">lock</i>
                        <p>
              <span class="d-lg-none d-md-block">bağla</span>
            </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">5</span>
                        <p>
                            <span class="d-lg-none d-md-block"> Gələn elan</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @php
                            $count = App\Models\Announcement::todayAnnouncements()->count();
                            $countStr = $count;
                            if( $countStr > \App\Library\MyClass::INFO_COUNT ) $countStr = \App\Library\MyClass::INFO_COUNT."+";
                        @endphp
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('admin/logout') }}">
            <i class="material-icons">power_settings_new</i>
                      <p>
              <span class="d-lg-none d-md-block">Tam çıxış</span>
            </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->




                    <div class="content">
                      <div class="container-fluid">

                        <!-- ic hisse deyisen -->

                        .

                        <!-- ic hisse deyisen son -->

                      </div>
                    </div>

  <footer class="footer ">

    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, <i class="material-icons">favorite</i> by <a href="" target="_blank">Hüseynzadə</a>
        </div>
    </div>



</footer>


            </div>
        </div>



<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
                  <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="ml-auto mr-auto">
                      <span class="badge filter badge-purple" data-color="purple"></span>
                      <span class="badge filter badge-azure" data-color="azure"></span>
                      <span class="badge filter badge-green" data-color="green"></span>
                      <span class="badge filter badge-orange" data-color="orange"></span>
                      <span class="badge filter badge-danger" data-color="danger"></span>
                      <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="header-title">Sidebar Background</li>
              <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger background-color">
                      <div class="ml-auto mr-auto">
                          <span class="badge filter badge-white" data-color="white"></span>
                          <span class="badge filter badge-black active" data-color="black"></span>
                      </div>
                      <div class="clearfix"></div>
                  </a>
              </li>

            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Mini</p>
                    <label class="ml-auto">
                      <div class="togglebutton switch-sidebar-mini">
                        <label>
                            <input type="checkbox">
                                <span class="toggle"></span>
                        </label>
                      </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Images</p>
                    <label class="switch-mini ml-auto">
                      <div class="togglebutton switch-sidebar-image">
                        <label>
                            <input type="checkbox" checked="">
                              <span class="toggle"></span>
                        </label>
                      </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="header-title">Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-2.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div>
                    <a href="" target="_blank" class="btn btn-rose btn-block btn-fill">Buy now!</a>
                </div>
            </li>

            <li class="button-container">
                <div>
                    <a href="" target="_blank" class="btn btn-info btn-block">Get free demo!</a>
                </div>
            </li>
            <li class="header-title" id="sharrreTitle">Thank you for 95 shares!</li>

            <li class="button-container">
                        <button id="twitter" class="btn btn-social btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 45</button>
                <button id="facebook" class="btn btn-social btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 50</button>
            </li>
        </ul>
    </div>
</div>






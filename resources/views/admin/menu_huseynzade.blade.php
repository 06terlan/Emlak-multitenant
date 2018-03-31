    <div class="wrapper">
            <div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('/admin/assets/build/huseynzade/img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="" class="simple-text logo-mini">
             OB
             <!-- <div class="logo-img"> 
                <img src="../admin/assets/build/huseynzade/img/baza-logo.png">
            </div> -->
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
                            <a class="nav-link" href="{{ URL::to('admin/password') }}">
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

          
                  @if( \App\Library\MyHelper::has_priv($v['route'], $v['priv']) )
                  <a class="navbar-brand" href="#huseynzade">{{ $val['name'] }}</a>
                  @endif
               
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
                    <a class="nav-link" href="{{ URL::to('admin/lock') }}">
            <i class="material-icons">lock</i>
                        <p>
              <span class="d-lg-none d-md-block">bağla</span>
            </p>
                    </a>
                </li>
                @php
                            $count = App\Models\Announcement::todayAnnouncements()->count();
                            $countStr = $count;
                            if( $countStr > \App\Library\MyClass::INFO_COUNT ) $countStr = \App\Library\MyClass::INFO_COUNT."+";
                        @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" >
            <i class="material-icons">notifications</i>
            <span class="notification" id="not-count">{{ $countStr }}</span>
                        <p>
                            <span class="d-lg-none d-md-block"> Gələn elan</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                        
                      sdg
                        
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

                        

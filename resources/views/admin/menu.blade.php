<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="home" class="site_title"><i class="fa fa-paw"></i> <span>Əmlak bazası</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ url(Auth::user()->photo()) }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->fullname() }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ URL::to('admin/home') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                    @if (\App\Library\MyHelper::has_role(\App\Library\MyClass::SUPER_ADMIN_ROLE))
                        <li><a href="{{ route('tenant') }}"><i class="fa fa-briefcase"></i> Tenantlar </a></li>
                    @endif
                    @if ( \App\Library\MyHelper::has_role(\App\Library\MyClass::ADMIN_ROLE) )
                        <li><a href="{{ route('users') }}"><i class="fa fa-user"></i> İstifadəçilər </a></li>
                    @endif
                    <li><a href="{{ route('announcement') }}"><i class="fa fa-share-alt"></i> Elanlar </a></li>
                    <li><a href="{{ route('announcement_pro') }}"><i class="fa fa-share-alt-square"></i> Elanlar fərdi əlavə </a></li>
                    <li><a href="{{ route('search') }}"><i class="fa fa-search"></i> Axtarış </a></li>
                    <li><a><i class="fa fa-wrench"></i> MSK <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none;">
                            <li><a href="{{ route('msk_makler') }}">Maklerlər</a></li>
                            <li><a href="{{ route('msk_group') }}">Gruplar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ URL::to('admin/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <span style="color: #73879c;font-weight:400;font-size: 27px;line-height: 56px;">{{ Auth::user()->tenant->company_name }}</span>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url(Auth::user()->photo()) }}" alt="">{{ Auth::user()->fullname() }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ URL::to('admin/profile') }}"> Profile</a></li>
                        <li><a href="{{ URL::to('admin/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                @php
                    $count = App\Models\Announcement::todayAnnouncements()->count();
                    $countStr = $count;
                    if( $countStr > \App\Library\MyClass::INFO_COUNT ) $countStr = \App\Library\MyClass::INFO_COUNT."+";
                @endphp

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green" id="not-count">{{ $countStr }}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="height:280px;overflow-y: auto;">
                        @include('admin.notfication', ['announcements' => App\Models\Announcement::todayAnnouncements()->take(\App\Library\MyClass::INFO_COUNT)->get()])


                        <li class="more {{ $count > \App\Library\MyClass::INFO_COUNT ? '' : 'hidden' }}">
                            <div class="text-center">
                                <a href="{{ route('announcement') }}">
                                    <strong>See All</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="home" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
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
                    <li><a href="{{ URL::to('admin/home') }}"><i class="fa fa-home"></i> Home </a></li>
                    @if (Auth::user()->role == App\Library\MyClass::ADMIN_ROLE)
                        <li><a href="{{ URL::to('admin/users') }}"><i class="fa fa-user"></i> Users </a></li>
                    @endif
                    <li><a href="{{ URL::to('admin/posts') }}"><i class="fa fa-share-alt"></i> Posts </a></li>
                    <li><a href="{{ URL::to('admin/about') }}"><i class="fa fa-info-circle"></i> About </a></li>
                    <li><a href="{{ URL::to('admin/contacts') }}"><i class="fa fa-envelope"></i> Contact </a></li>
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

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{ App\Models\Contact::NotRead()->get()->count() }}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach (App\Models\Contact::NotRead()->take(5)->get(); as $contact)
                            <li>
                              <a href="{{ url('admin/contacts/'.$contact->id) }}">
                                <span>
                                  <span>{{ $contact->name }}</span>
                                  <span class="time">{{ App\Library\Date::diffForHumans( $contact->created_at ) }} ago</span>
                                </span>
                                <span class="message">
                                  {{ str_limit($contact->message, $limit = 40, $end = '...') }}
                                </span>
                              </a>
                            </li>
                        @endforeach

                        @if( App\Models\Contact::NotRead()->get()->count() > 5 )
                            <li>
                              <div class="text-center">
                                <a href="{{ url('admin/contacts') }}">
                                  <strong>See All</strong>
                                  <i class="fa fa-angle-right"></i>
                                </a>
                              </div>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
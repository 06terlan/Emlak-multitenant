<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.menu')

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <footer>
            <div class="pull-right">
                 Created by <a href="">A.Terlan</a>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>

@include('admin.foot')

</body>
</html>

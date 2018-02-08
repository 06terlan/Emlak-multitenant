<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin panel</title>

    <!-- Bootstrap CSS -->
    {!! Html::style('admin/assets/vendors/bootstrap4/dist/css/bootstrap.min.css') !!}
    {!! Html::style('admin/assets/build/css/login_page.css?v=1') !!}

    {!! Html::script('admin/assets/build/js/jquery-1.11.1.min.js') !!}
  </head>

  <body class="login">
    @yield('content')
  </body>
</html>
@yield('script')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin panel</title>

    <!-- Bootstrap -->
    {!! Html::style('admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('admin/assets/vendors/font-awesome/css/font-awesome.min.css') !!}
    <!-- Custom Theme Style -->
    {!! Html::style('admin/assets/build/css/custom.min.css') !!}
  </head>

  <body class="login">
    @yield('content')
  </body>
</html>
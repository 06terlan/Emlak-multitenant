@extends('auth.app')

@section('content')

    <div id="container" xmlns="">
        <img src="/admin/images/login/bg-1.jpg" style="background-image: url(/admin/images/login/loading.gif)">
        <img src="/admin/images/login/bg-2.jpg" style="background-image: url(/admin/images/login/loading.gif)">
        <img src="/admin/images/login/bg-3.jpg" style="background-image: url(/admin/images/login/loading.gif)">
        <img src="/admin/images/login/bg-4.jpg" style="background-image: url(/admin/images/login/loading.gif)">
    </div>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('admin.login') }}" method="post">
                        <span class="login100-form-logo">
                            <i class="zmdi zmdi-landscape"></i>
                        </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                            Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="login" placeholder="İstİfadəçİ adı" value="{{ old('login') }}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Parol">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Yadda saxla
                        </label>
                    </div>
                    {{ csrf_field() }}
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Daxİl Ol
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="#">
                            Parolu bərpa et
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
@endsection
@section('script')
    <script>
        $('#container img').load(function(){
            $(this).css('background','none');
        });
    </script>
@endsection

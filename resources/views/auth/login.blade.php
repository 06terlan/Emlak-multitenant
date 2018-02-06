@extends('auth.app')

@section('content')

<!-- Login home page -->
    <div class="container">
        <div class="row">  

            <div class="loginBox">
                <div class="loginTitle">
                <img src="images/login/logo.jpg" alt="logo" width="110" height="77" />
                </div> <!--logintitle-->   

                <form method="POST" role="form" action="{{ route('admin.login') }}">
                    
                    <div class="loginContainer">
                        <div class="loginForms">
                            <label>İstİfadəçİ adı</label>
                            <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus placeholder="" />
                        </div><!--loginForms-->
                    <div class="loginForms">
                            <label> İstİfadƏçİ Parolu</label>
                            <input id="password" type="password" class="form-control inputText" name="password" required placeholder="" />
                    </div>
                        </div>

                    <div class="loginForms">     
                        {{ csrf_field() }}                   
                        <input type="submit" class="confirmBtn" style="cursor:pointer;" value="Daxİl Ol" />
                    </div>
                    <div class="loginlostPass">
                        <a href="#">Parolu bərpa et</a>
                    </div>                                  
                    <div class="loginCheck">
                        <label>
                            <input name="remember_me" type="checkbox" id="remember_me" /> Yadda saxla
                        </label>
                    </div><!--loginContainer-->

                </form><!--form-->

            </div> <!--Loginbox--> 

        </div> <!--row-->
    </div> <!--container-->


<div id="particles-js"></div>
@endsection

@extends('auth.app')

@section('content')
    <div>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                        <h1>Login</h1>
                        <div>
                            <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus placeholder="login" />
                        </div>
                        <div>
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password"/>
                        </div>
                        <div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default submit">
                                Log in
                            </button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                              <h1><i class="fa fa-paw"></i> Admin Panel</h1>
                              <p>©2017 All Rights Reserved. A.Terlan</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

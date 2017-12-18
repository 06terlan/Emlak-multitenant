@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profile</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ url('admin/users/addEdit/'.$id) }}">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" name="name" data-validate-length-range="5,20" type="text" class="form-control has-feedback-left" placeholder="Name" value="{{ $User['firstname'] }}">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Surname
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control has-feedback-left" placeholder="Surname" value="{{ $User['surname'] }}">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Login
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ $User['login'] }}" name="login" placeholder="Login" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input autocomplete="off" required="" name="email" type="email" class="form-control has-feedback-left" value="{{ $User['email'] }}" placeholder="Email">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Password </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input autocomplete="off" @if ($id == 0) {{ 'required=""' }} @endif type="password" placeholder="Password" name="password" data-validate-length="5,20" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="role" required="">
                                  <option value="1"> Admin </option>
                                  <option value="2" selected=""> Author </option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-default" href="{{ url('admin/users/') }}" type="reset">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}

    <script type="text/javascript">
        $("select[name=role]").val({{ $User['role'] }});
    </script>
@endsection
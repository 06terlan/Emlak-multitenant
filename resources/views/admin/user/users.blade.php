@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    <a href="{{ url('admin/users/addEdit/0') }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="get" action="" class="formFinder">
                        <input type="hidden" name="page" value="{{ $request->get("page",1) }}">
                        <table class="table table-striped formFinder">
                            <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Login</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><input class="form-control formFind" name="fullname" value="{{ $request->get("fullname") }}" placeholder="Full Name"></th>
                                    <th><input class="form-control formFind" name="email" value="{{ $request->get("email") }}" placeholder="Email"></th>
                                    <th><input class="form-control formFind" name="login" value="{{ $request->get("login") }}" placeholder="Login"></th>
                                    <th><input class="form-control formFind" name="role" value="{{ $request->get("role") }}" placeholder="Role"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->fullname() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->login }}</td>
                                        <td>{{ $user->getRole() }}</td>
                                        <th>
                                            <a href="{{ url('admin/users/addEdit/' . $user->id ) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            @if( Auth::user()->id != $user->id )
                                            <a href="{{ url('admin/users/delete/' . $user->id ) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $Users->links('admin.pagination', ['paginator' => $Users]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsection
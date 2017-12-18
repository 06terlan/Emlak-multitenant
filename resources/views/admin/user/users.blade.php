@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    <a href="{{ url('admin/users/addEdit/0') }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>

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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->fullname() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->login }}</td>
                                    <th>
                                        <a href="{{ url('admin/users/addEdit/' . $user->id ) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                        @if( Auth::user()->id != $user->id )
                                        <a href="{{ url('admin/users/delete/' . $user->id ) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
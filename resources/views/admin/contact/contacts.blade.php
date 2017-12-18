@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contact</small></h2>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact )
                                <tr>
                                    <td>{{ $contacts->perPage() * ($contacts->currentPage() - 1) + $loop->iteration }} @if( $contact->read == 0 ) <span class="badge bg-red">new</span> @endif </td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ App\Library\Date::d($contact->created_at,'d-m-Y H:i') }}</td>
                                    <th>
                                        <a href="{{ url('admin/contacts/delete/' . $contact->id ) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                        <a href="{{ url('admin/contacts/' . $contact->id ) }}" data-toggle="tooltip" data-original-title="Info" class="btn btn-info btn-xs"><i class="fa fa-info"></i></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $contacts->links('admin.pagination', ['paginator' => $contacts]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
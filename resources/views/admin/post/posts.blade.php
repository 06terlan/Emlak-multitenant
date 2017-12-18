@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    <a href="{{ url('admin/posts/addEdit/0') }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>

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
                                <th>Header</th>
                                <th>Author</th>
                                <th>Created at</th>
                                <th>Edited</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                                <tr>
                                    <td>{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $post->header }}</td>
                                    <td>{{ $post->author->fullname() }}</td>
                                    <td>{{ App\Library\Date::d($post->created_at,'d-m-Y H:i') }}</td>
                                    <td>{{ App\Library\Date::d($post->updated_at,'d-m-Y H:i') }}</td>
                                    <th>
                                        <a href="{{ url('admin/posts/addEdit/' . $post->id ) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('admin/posts/delete/' . $post->id ) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $posts->links('admin.pagination', ['paginator' => $posts]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <a href="{{ route('msk_group_add_edit',['group' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Makler</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="get" action="" class="formFinder">
                        <input type="hidden" name="page" value="">
                        <table class="table table-striped formFinder">
                            <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th>Full Name</th>
                                    <th>Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $groups->perPage() * ($groups->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $group->group_name }}</td>
                                        <td>{{ $group->number }}</td>
                                        <th>
                                            <a href="{{ route('msk_group_add_edit',['group' => $group->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('msk_group_delete',['group' => $group->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $groups->links('admin.pagination', ['paginator' => $groups]) }}
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
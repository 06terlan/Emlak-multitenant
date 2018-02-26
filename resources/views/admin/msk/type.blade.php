@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    @if(\App\Library\MyHelper::has_priv("msk_type", \App\Library\MyClass::PRIV_CAN_ADD))
        <a href="{{ route('msk_type_add_edit',['type' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Şirkət növləri</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="get" action="" class="formFinder">
                        <table class="table table-striped formFinder">
                            <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th>Group Name</th>
                                    <th>Dəyəri</th>
                                    @if(\App\Library\MyHelper::has_priv("msk_type", \App\Library\MyClass::PRIV_CAN_ADD))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td>{{ $types->perPage() * ($types->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->amount }}</td>
                                        <td>
                                            @if(\App\Library\MyHelper::has_priv("msk_type", \App\Library\MyClass::PRIV_CAN_ADD))
                                                <a href="{{ route('msk_type_add_edit',['type' => $type->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('msk_type_delete',['type' => $type->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $types->appends($request->except('page'))->links('admin.pagination', ['paginator' => $types]) }}
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
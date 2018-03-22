@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    @if( \App\Library\MyHelper::has_priv('msk_city', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
        <a href="{{ route('msk_city_add_edit',['cityr' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Şəhərlər</h2>
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
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $cities->perPage() * ($cities->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $city->name }}</td>
                                        <th>
                                            @if( \App\Library\MyHelper::has_priv('msk_city', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                                                <a href="{{ route('msk_city_add_edit',['city' => $city->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                                <a href="{{ route('msk_city_delete',['city' => $city->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $cities->appends($request->except('page'))->links('admin.pagination', ['paginator' => $cities]) }}
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
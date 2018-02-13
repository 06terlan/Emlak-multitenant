@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
        <a href="{{ route('tenant_add_edit',['tenant' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tenantlar</h2>
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
                                    <th>Company name</th>
                                    <th>Type</th>
                                    <th>Last date</th>
                                    <th>Creaed at</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><input class="form-control formFind" name="company_name" value="{{ $request->get("company_name") }}" placeholder="Company name"></th>
                                    <th>
                                        <select class="form-control formFind" name="type">
                                            <option></option>
                                            @foreach (\App\Library\MyClass::$companyTypes as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get("type") ? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th><input class="form-control formFind" name="last_date" value="{{ $request->get("last_date") }}" placeholder="Last date"></th>
                                    <th><input class="form-control formFind" name="created_at" value="{{ $request->get("created_at") }}" placeholder="Creaed at"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenans as $tenan)
                                    <tr>
                                        <td>{{ $tenans->perPage() * ($tenans->currentPage() - 1) + $loop->iteration }}</td>
                                        <td>{{ $tenan->company_name }}</td>
                                        <td>{{ $tenan->getType() }}</td>
                                        <td>{{ $tenan->last_date == null ? '-' : \App\Library\Date::d($tenan->last_date) }}</td>
                                        <td>{{ \App\Library\Date::d($tenan->created_at, "d-m-Y H:i") }}</td>
                                        <th>
                                            @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                                                <a href="{{ route('tenant_add_edit', ['tenant' => $tenan->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('tenant_delete', ['tenant' => $tenan->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $tenans->links('admin.pagination', ['paginator' => $tenans]) }}
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
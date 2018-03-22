@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    <!-- @if(\App\Library\MyHelper::has_priv("msk_group", \App\Library\MyClass::PRIV_CAN_ADD))
        <a href="{{ route('msk_group_add_edit',['group' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif -->

    <div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                @if(\App\Library\MyHelper::has_priv("msk_group", \App\Library\MyClass::PRIV_CAN_ADD))
                <a href="{{ route('msk_group_add_edit',['group' => 0]) }}"> <i class="material-icons" style="color: #fff">location_city</i> </a>
                @endif
              </div>
              <h4 class="card-title">Şirkətlər</h4>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>ID</th>
                        <th>Grupun adı</th>
                        @if( Auth::user()->group->super_admin == 1 )
                        <th>Şirkət</th>
                        @endif
                        @if(\App\Library\MyHelper::has_priv("msk_group", \App\Library\MyClass::PRIV_CAN_ADD))
                        <th class="text-right">Tədbirlər</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $groups->perPage() * ($groups->currentPage() - 1) + $loop->iteration }}</td>
                            <th><span style="font-weight: 500">{{ $group->group_name }}</span></th>
                            @if( Auth::user()->group->super_admin == 1 )
                            <td><span style="font-weight: 500; color: blue">{{ $group->tenant->company_name }}</span></td>
                            @endif
                            <th class="text-right">
                                @if(\App\Library\MyHelper::has_priv("msk_group", \App\Library\MyClass::PRIV_CAN_ADD))
                                   <a href="{{ route('msk_group_add_edit',['group' => $group->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                    <a href="{{ route('msk_group_delete',['group' => $group->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-link btn-danger btn-just-icon edit"><i class="material-icons">close</i></a>
                                @endif
                            </th>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <div class="row" style="margin-top: 15px">
        <div class="col-md-1"></div>
        <div class="col-sm-12 col-md-7 text-left">
            <!-- <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                <span style="font-weight: 700">40 </span>Grupdan <span style="font-weight: 700">1</span> ilə <span style="font-weight: 700">10</span> arasında göstərilir </div> -->
            </div>
            <div class="col-sm-12 col-md-4">
            {{ $groups->appends($request->except('page'))->links('admin.pagination', ['paginator' => $groups]) }}
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
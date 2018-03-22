@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

   <!--  @if( \App\Library\MyHelper::has_priv('msk_city', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
        <a href="{{ route('msk_city_add_edit',['cityr' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif -->

     <div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                @if( \App\Library\MyHelper::has_priv('msk_city', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                <a href="{{ route('msk_city_add_edit',['cityr' => 0]) }}"> <i class="material-icons" style="color: #fff">location_city</i> </a>
                @endif
              </div>
              <h4 class="card-title">İstifadəçilər</h4>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>ID</th>
                        <th></th>
                        <th>Şəhərin adı</th>
                        <th class="text-right">Tədbirlər</th>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                        <tr>
                            <td>{{ $cities->perPage() * ($cities->currentPage() - 1) + $loop->iteration }}</td>
                            <th></th>
                            <td><span style="font-weight: 500">{{ $city->name }}</span></td>
                            <th class="text-right">
                                @if( \App\Library\MyHelper::has_priv('msk_city', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                                   <a href="{{ route('msk_city_add_edit',['city' => $city->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                    <a href="{{ route('msk_city_delete',['city' => $city->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-link btn-danger btn-just-icon edit"><i class="material-icons">close</i></a>
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
                <span style="font-weight: 700">40 </span>Şəhərdən <span style="font-weight: 700">1</span> ilə <span style="font-weight: 700">10</span> arasında göstərilir </div> -->
            </div>
            <div class="col-sm-12 col-md-4">
            {{ $cities->appends($request->except('page'))->links('admin.pagination', ['paginator' => $cities]) }} 
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
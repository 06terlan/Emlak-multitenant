@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')
   <!--  @if( \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD) )
        <a href="{{ route('user_add_edit',['user' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif -->

       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <a href="{{ route('user_add_edit',['user' => 0]) }}"> <i class="material-icons" style="color: #fff">person_add</i> </a>
                </div>
                <h4 class="card-title">İstifadəçilər</h4>

              </div>

              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center">#</th>
                                  <th>Tam adı</th>
                                  <th>E-mail</th>
                                  <th>İstifadəçi adı</th>
                                  <th>Grup</th>
                                  @if( Auth::user()->group->super_admin == 1 )
                                  <th class="text-left">Şirkət</th>
                                  @endif
                                  <th class="text-right">Tədbirlər</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($Users as $user)
                      <tr role="row" class="odd">
                              <td tabindex="0" class="sorting_1" style="max-width: none; width: 0">{{ $Users->perPage() * ($Users->currentPage() - 1) + $loop->iteration }}</td>
                              <td style="max-width: none; width: 0">{{ $user->fullname() }}</td>
                              <td style="max-width: none; width: 0">{{ $user->email }}</td>
                              <td style="max-width: none; width: 0">{{ $user->login }}</td>
                              <td style="max-width: none; width: 0">{{ $user->group->group_name }}</td>
                                @if( Auth::user()->group->super_admin == 1 )
                                    <td>{{ $user->tenant->company_name }}</td>
                                @endif
                              <td class="text-right" style="max-width: none; width: 0">
                                            @if( $user->group->super_admin != 1 && \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD))
                                                <a style="width:25px;" href="{{ route('user_add_edit',['user' => $user->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                            @endif
                                            @if( Auth::user()->id != $user->id && $user->group->super_admin != 1 && \App\Library\MyHelper::has_priv('users', \App\Library\MyClass::PRIV_CAN_ADD))
                                                <a style="width:25px;" href="{{ route('user_delete',['user' => $user->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-link btn-danger btn-just-icon edit"><i class="material-icons">close</i></a>
                                            @endif
                               
                              </td>
                          </tr>
                         @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="row" style="margin-top: 15px">
            <div class="col-sm-12 col-md-5">
                <!-- <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                    <span style="font-weight: 700">40 </span>istifadəçidən <span style="font-weight: 700">1</span> ilə <span style="font-weight: 700">10</span> arasında göstərilir </div> -->
            </div>
        <div class="col-sm-12 col-md-7">
            {{ $Users->appends($request->except('page'))->links('admin.pagination', ['paginator' => $Users]) }}
        </div>
    </div>
          </div>

        </div>
      </div>
                      
    
@endsection

<!-- @section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsectio -->
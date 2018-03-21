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
                  <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">

                  <div id="datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatables_length">
                            <label class="form-group">Göstər <select name="datatables_length" aria-controls="datatables" class="form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="-1">Bütün</option>
                            </select> sıra</label></div></div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatables_filter" class="dataTables_filter">
                                    <label class="form-group bmd-form-group bmd-form-group-sm">
                                        <input type="search" class="form-control form-control-sm" placeholder="Axtarış qeydləri" aria-controls="datatables">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Axtaris butonlari -->
                            <!-- <div class="row">

                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <input name="company_name" value="{{ $request->get("company_name") }}" class="form-control formFind" style="margin-top: 15px" placeholder="Şirkətin adı">
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <select class="selectpicker form-control formFind" name="type" data-size="7" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="Tipi">
                                    @foreach (\App\Library\MyClass::$companyTypes as $typeK => $type)
                                        <option value="{{ $typeK }}" {{ $typeK == $request->get("type") ? 'selected':'' }}> {{ $type }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <input name="created_at" value="{{ $request->get("created_at") }}" class="form-control formFind" style="margin-top: 15px" placeholder="Yaranma vaxtı">
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <input name="last_date" value="{{ $request->get("last_date") }}" class="form-control formFind" style="margin-top: 15px" placeholder="Bitmə vaxtı">
                            </div>
                        </div> -->
                        <!-- Axtaris Butonlari son -->

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                     <thead>
                          <tr role="row">
                            <th><span style="margin-top: 15px !important">ID</span></th>
                            <th><input name="fullname" value="{{ $request->get("fullname") }}" class="form-control formFind" style="margin-top: 15px" placeholder="Tam adı"></th>
                            <th><input name="email" value="{{ $request->get("email") }}" class="form-control formFind" style="margin-top: 15px" placeholder="E-mail"></th>
                            <th><input name="login" value="{{ $request->get("login") }}" class="form-control formFind" style="margin-top: 15px" placeholder="İstifadəçi adı"></th>
                            <th>
                                <select class="selectpicker form-control formFind" name="type" data-size="7" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="Grup">
                                    @foreach (\App\Models\Group::realData()->get() as $type)
                                        <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get("group_id") ? 'selected':'' }}> {{ $type['group_name'] }} </option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <select class="selectpicker form-control formFind" name="type" data-size="7" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-red" title="Şirkət">
                                    @foreach (\App\Models\Tenant::realTenants()->get() as $type)
                                        <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get("tenant") ? 'selected':'' }}> {{ $type['company_name'] }} </option>
                                    @endforeach
                                </select>
                            </th>
                            <th class="text-right">Tədbirlər</th>
                        </tr>
                      </thead>

                      <!-- <thead>
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 152px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 152px;" aria-label="Position: activate to sort column ascending">Tam adı</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Office: activate to sort column ascending">E-mail</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Office: activate to sort column ascending">İstifadəçi adı</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Age: activate to sort column ascending">Grup</th>
                            <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Date: activate to sort column ascending">Şirkət</th>
                            <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 153px;" aria-label="Actions: activate to sort column ascending">Tədbirlər</th>
                        </tr>
                      </thead> -->

                      <tfoot>
                          <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Tam adı</th><th rowspan="1" colspan="1">E-mail</th><th rowspan="1" colspan="1">İstifadəçi adı</th><th rowspan="1" colspan="1">Grup</th><th rowspan="1" colspan="1">Şirkət</th><th class="text-right" rowspan="1" colspan="1">Tədbirlər</th></tr>
                      </tfoot>
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
                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                    <span style="font-weight: 700">40 </span>istifadəçidən <span style="font-weight: 700">1</span> ilə <span style="font-weight: 700">10</span> arasında göstərilir </div>
            </div>
        <div class="col-sm-12 col-md-7">
            {{ $Users->appends($request->except('page'))->links('admin.pagination', ['paginator' => $Users]) }}
        </div>
    </div>
</div>
                  </div>
              </div><!-- end content-->
          </div><!--  end card  -->
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
    
@endsection

<!-- @section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsectio -->
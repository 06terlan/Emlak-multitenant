@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Agent Grup</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_group_add_edit', ['group' => $id]) }}">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Grupun adı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group bmd-form-group is-filled has-success">

                                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Grupun adı" value="{{ $group['group_name'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <!-- kategorialar -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Görəcəyi kategorialar</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                          <div class="form-check form-check-inline">
                                              <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="">
                                                   Obyekt   
                                                  <span class="form-check-sign">
                                                      <span class="check"></span>
                                                  </span>
                                              </label>
                                          </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- kategorialar son -->

                                    <!-- Elan tipi -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Görəcəyi Elanın tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                          <div class="form-check form-check-inline">
                                              <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" value="">
                                                   İcarə   
                                                  <span class="form-check-sign">
                                                      <span class="check"></span>
                                                  </span>
                                              </label>
                                          </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Elan tipi son -->

                                    <!-- Modullar -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Modullar</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <label class="text-left" style="margin-top: 15px; font-weight: 500; color: blue"> Göstəriş paneli</label>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                          <label class="form-check-label">
                                                              <input class="form-check-input" type="radio" name="exampleRadios" value="option1" >
                                                              Görmür
                                                              <span class="circle">
                                                                  <span class="check"></span>
                                                              </span>
                                                          </label>
                                                      </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                          <label class="form-check-label">
                                                              <input class="form-check-input" type="radio" name="exampleRadios" value="option1" >
                                                              Görür
                                                              <span class="circle">
                                                                  <span class="check"></span>
                                                              </span>
                                                          </label>
                                                      </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                          <label class="form-check-label">
                                                              <input class="form-check-input" type="radio" name="exampleRadios" value="option1" >
                                                              Əlavə edir
                                                              <span class="circle">
                                                                  <span class="check"></span>
                                                              </span>
                                                          </label>
                                                      </div>
                                                    </div>

                                                </div> <!-- row -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modullar son -->

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="tenant" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan">
                                                    
                                                        @foreach (\App\Models\Tenant::realTenants()->get() as $type)
                                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $group['tenant_id']? 'selected':'' }}> {{ $type['company_name'] }} </option>
                                                        @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="submit">Success<div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-sm-5 col-md-6 mr-auto ml-auto">
                                            <button class="btn btn-danger" onclick="window.location.href='{{ redirect()->back()->getTargetUrl() }}'" type="reset">Geriyə<div class="ripple-container"></div></button>
                                        </div>

                                    </div>

                            </form> 
        
        </div>
  
    </div>

</div>
    
@endsection

@section('css')
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection

@section('scripts')
    <!-- validator -->
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}
@endsection

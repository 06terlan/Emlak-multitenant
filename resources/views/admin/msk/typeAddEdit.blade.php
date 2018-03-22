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
        
        
                            <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Şirkətin Tipi</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Şirkətin Tipi" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Dəyəri</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Dəyəri" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">İstifadəçi sayı</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Grupun adı" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modullar -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Modullar</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        <label class="text-left" style="margin-top: 15px; font-weight: 500; color: blue"> Göstəriş paneli</label>
                                                    </div>

                                                    <div class="col-sm-4 text-right">
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

                                                    <div class="col-sm-4 text-right">
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

                                                </div> <!-- row -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modullar son -->

                                    <!-- MSK -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">MSK</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        <label class="text-left" style="margin-top: 15px; font-weight: 500; color: blue"> Gruplar</label>
                                                    </div>

                                                    <div class="col-sm-4 text-right">
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

                                                    <div class="col-sm-4 text-right">
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

                                                </div> <!-- row -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- MSK son -->
                                    <!-- <hr> -->

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

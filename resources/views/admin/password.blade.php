@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')
    <div class="content">
  <div class="container-fluid">
    <div class="col-md-8 mr-auto ml-auto">
      <!--      Wizard container        -->
      <div class="wizard-container">
        <div class="card card-wizard" data-color="rose" id="wizardProfile">
          <form novalidate=""  method="post" action="{{ url('admin/profile/1') }}" enctype="multipart/form-data">
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <div class="card-header text-center">
              <h3 class="card-title">
                Profilinizdə məlumat dəyişikliyidsgsag
              </h3>
              <h5 class="card-description">Yazdığınız məlumatlar <span style="color: red; font-weight: 500; font-size: 18px">Baza</span>-da sizi tanımlayacağ .</h5>
            </div>
            <div class="wizard-navigation">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    Məlumatlar
                  </a>
                </li>
                
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="about">
                  <h5 class="info-text"> Əsas məfdglumatlarla başlayaq (doğrulama ilə)</h5>
                  <div class="row justify-content-center">
                    <div class="col-sm-4">
                      <div class="picture-container">
                        <div class="picture">
                          <img src="{{ asset(Auth::user()->photo()) }}" class="picture-src" id="wizardPicturePreview" title="" />
                          <input type="file" name="image" accept="image/png, image/jpeg" id="wizard-picture">
                        </div>
                        <h6 class="description">Profİl Şəklİnİz</h6>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <div class="form-group is-filled has-success">
                          <label for="exampleInput1" class="bmd-label-floating">Tam adınız (*)</label>
                          <input name="name" data-validate-length-range="5,20" type="text" class="form-control" id="exampleInput1"  value="{{ Auth::user()->firstname }}" required>
                        </div>
                      </div>
                      <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">record_voice_over</i>
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInput11" class="bmd-label-floating">Soyadınız</label>
                          <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" id="exampleInput11"  value="{{ Auth::user()->surname }}" >
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="tab-pane" id="account">
                  <h5 class="info-text">Məlumatları gör və E-mail təsdiq </h5>
                  <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div>
                            <h5 class="info-text">
                            <span style="font-weight: 500;">İstifadəçi adınız:</span>
                            <span style="font-weight: 500; font-style: italic; color: green;"> {{ Auth::user()->firstname }}</span></h5>
                        </div>
<!-- 
                        <div>
                            <h5 class="info-text">
                            <span style="font-weight: 500;">Soyadınız:</span>
                            <span style="font-weight: 500; font-style: italic; color: green;"> {{ Auth::user()->surname }} </span></h5>
                        </div> -->
                      <div class="row justify-content-center">
 
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">account_box</i>
                          </span>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInput1" class="bmd-label-floating">Login</label>
                          <input disabled type="text" class="form-control valid" id="exampleemalil" value="{{ Auth::user()->login }}" name="last-name" required="required">
                        </div>
                        
                         <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">email</i>
                          </span>
                        </div>
                        <div class="form-group is-filled has-success">
                          <label for="exampleInput1" class="bmd-label-floating">E-mail *</label>
                          <input name="email" type="email" class="form-control valid" id="exampleemalil" value="{{ Auth::user()->email }}" required>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="address">
                  <div class="row justify-content-center">
                    <div class="col-sm-12">
                      <h5 class="info-text"> Parolunuzu dəyişin </h5>
                    </div>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <label>Street Name</label>
                        <input type="text" class="form-control" name="streetName" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Street No.</label>
                        <input type="number" class="form-control" name="streetNo" required>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" required>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Country</label>
                        <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select">
                          <option value="Afghanistan"> Afghanistan </option>
                          <option value="Albania"> Albania </option>
                          <option value="Algeria"> Algeria </option>
                          <option value="American Samoa"> American Samoa </option>
                          <option value="Andorra"> Andorra </option>
                          <option value="Angola"> Angola </option>
                          <option value="Anguilla"> Anguilla </option>
                          <option value="Antarctica"> Antarctica </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="mr-auto">
                <input type="button" class="btn btn-previous btn-fill btn-info btn-wd disabled" name="previous" value="Geriyə">
              </div>
              <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="ml-auto">
                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Növbəti">
                <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"  value="Saxla" style="display: none;">
              </div>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
      </div>
      <!-- wizard container -->
    </div>
  </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
@endsection
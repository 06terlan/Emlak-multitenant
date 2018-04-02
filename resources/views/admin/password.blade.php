@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')
    <div class="content">
  <div class="container-fluid">
    <div class="col-md-8 mr-auto ml-auto">
      <!--      Wizard container        -->
      <div class="wizard-container">
        <div class="card card-wizard" data-color="rose" id="wizardProfile">
          <form novalidate="" method="post" action="{{ url('admin/profile/2') }}">
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <div class="card-header text-center">
              <h3 class="card-title">
                Profilinizdə parol dəyişikliyi
              </h3>
              <h5 class="card-description">Yazdığınız parol <span style="color: red; font-weight: 500; font-size: 18px">Baza</span>-da sizi qoruyacağ .</h5>
            </div>
            <div class="wizard-navigation">
              <ul class="nav nav-pills">
                <li class="nav-item" style="width: 663px">
                  <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    Parol DƏYİŞİKLİYİ
                  </a>
                </li>
                
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="about">
                  <h5 class="info-text"> Parolunuzu dəyişin (doğrulama ilə və istəyə bağlı)</h5>
                  <div class="row justify-content-center">
                    <div class="col-sm-8">
                      <div class="input-group form-control-lg">
                      
                        <div class="form-group is-filled has-success">
                          <label for="exampleInput1" class="bmd-label-floating">Köhnə parol (*)</label>
                          <input id="old_password" type="password" name="old_password" class="form-control" required>
                        </div>
                      </div>

                    </div>
                    
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-sm-8">
                      <div class="input-group form-control-lg">
                      
                        <div class="form-group is-filled has-success">
                          <label for="exampleInput1" class="bmd-label-floating">Yeni parol (*)</label>
                          <input id="password" type="password" name="password" class="form-control" required>
                        </div>
                      </div>

                    </div>
                    
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-sm-8">
                      <div class="input-group form-control-lg">
                      
                        <div class="form-group is-filled has-success">
                          <label for="exampleInput1" class="bmd-label-floating">Yeni parol təkrar (*)</label>
                          <input id="re_password" type="password" name="re_password" data-validate-linked="password" class="form-control" required>
                        </div>
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
                <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"  value="Parolu dəyiş" style="display: none;">
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

<style type="text/css">
  .card-wizard[data-color=rose] .moving-tab {
    width: 663px !important;
  }
</style>

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
@endsection
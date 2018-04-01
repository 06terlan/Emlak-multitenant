@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')
    
<!-- menim hesabim -->
    <div class="col-md-6 mr-auto ml-auto">
        <div class="card card-profile">
            <div class="card-avatar">
                    <img class="img" src="{{ asset(Auth::user()->photo()) }}" />
            </div>

            <div class="card-body">
                <h6 class="card-category text-danger">makler</h6>
                <h4 class="card-title">{{ Auth::user()->fullname() }}</h4>
                <hr>
                <div class="row">
                  <div class="col-md-4 text-left"><span class="text-left">Login:</span></div>
                  <div class="col-md-8"><p class="card-description text-left">{{ Auth::user()->login }}</p></div>
                </div>

                <div class="row">
                  <div class="col-md-4 text-left">E-mail:</div>
                  <div class="col-md-8"><p class="card-description text-left">{{ Auth::user()->email }}</p></div>
                </div>

                <div class="row">
                  <div class="col-md-4 text-left">Daxil olduğu Grup:</div>
                  <div class="col-md-8"><p class="card-description text-left">s</p></div>
                </div>

                <div class="row">
                  <div class="col-md-4 text-left">Daxil olduğu Şirkət:</div>
                  <div class="col-md-8"><p class="card-description text-left">s</p></div>
                </div>

                <div class="row">
                  <div class="col-md-4 text-left">Vəzifə:</div>
                  <div class="col-md-8"><p class="card-description text-left">İstifadəçi</p></div>
                </div>
                <hr style="margin-top: -2px;">
                <!-- <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                </p>
                <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                <hr> -->
                <div class="row" style="margin-bottom: -20px">
                  <div class="col-md-6 text-left">Bitmə vaxtı:</div>
                  <div class="col-md-6"><p class="card-description pull-right" style="color: green">20.06.2018 (33gün)</p></div>
                </div>
                <hr>
                <div class="row" style="margin-bottom: -20px">
                  <!-- <div class="col-md-6 text-left">Bitmə vaxtı:</div>
                  <div class="col-md-6"><p class="card-description pull-right" style="color: red">20.06.2018 (33gün)</p></div> -->
                  <div class="col-md-12" ><p class="card-description" style="color: red; cursor: pointer;">www.bazam.az</p></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
@endsection
@extends('admin.masterpage_huseynzade')

@section('content')

<div class="row">
    <div class="col-md-8 ml-auto mr-auto">
        <div class="page-categories">
  <h3 class="title text-center">Məlumat <span style="color: #ff9800; text-transform: uppercase;">Baza</span>SI</h3>
  <br />
  <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
              <i class="material-icons">info</i>
              Yenİlİklər
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
              <i class="material-icons">location_on</i>
              Ünvanımız
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
              <i class="material-icons">gavel</i>
              Legal Info
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
              <i class="material-icons">help_outline</i>
              Dəstək
          </a>
      </li>
  </ul>
  <div class="tab-content tab-space tab-subcategories">
      <div class="tab-pane" id="link7">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Description about product</h4>
              <p class="card-category">
                  More information here
              </p>
          </div>
          <div class="card-body">
              Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
              <br>
              <br> Dramatically visualize customer directed convergence without revolutionary ROI.
          </div>
        </div>
      </div>
      <div class="tab-pane active" id="link8">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Location of the product</h4>
              <p class="card-category">
                  More information here
              </p>
          </div>
          <div class="card-body">
              Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
              <br>
              <br> Dramatically maintain clicks-and-mortar solutions without functional solutions.
          </div>
        </div>
      </div>
      <div class="tab-pane" id="link9">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Legal info of the product</h4>
              <p class="card-category">
                  More information here
              </p>
          </div>
          <div class="card-body">
              Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
              <br>
              <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
          </div>
        </div>
      </div>
      <div class="tab-pane" id="link10">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Yardım Mərkəzi</h4>
              <p class="card-category">
                  More information here
              </p>
          </div>
          <div class="card-body">
              From the seamless transition of glass and metal to the streamlined profile, every detail was carefully considered to enhance your experience. So while its display is larger, the phone feels just right.
              <br>
              <br> Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.
          </div>
        </div>
      </div>
  </div>
</div>

    </div>
</div>


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

@section('css')

@endsection

@section('scripts')

@endsection

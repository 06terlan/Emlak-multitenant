@extends('admin.masterpage_huseynzade')

@section('content')


                    <div class="content">
                      <div class="container-fluid">
                        <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">weekend</i>
              </div>
              <p class="card-category">Elanlar</p>
              <h3 class="card-title">{{ $announcements + $proAnnouncements }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">local_offer</i>
                    <a href="#pablo">Bütün Elanlar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">equalizer</i>
              </div>
              <p class="card-category">Gələn Elanlar</p>
              <h3 class="card-title">{{ $announcements }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> Gələn bütün Elanlar
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Gələn Elanlar</p>
              <h3 class="card-title">{{ $announcementsToday }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> 24 saat ərzində
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Fərdi Elanlar</p>
              <h3 class="card-title">{{ $proAnnouncements }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> Bütün Fərdilər
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="row">
    <div class="col-md-12">

<div class="card ">

    <div class="card-header card-header-success card-header-icon">
    <div class="card-icon">
                          <i class="material-icons"></i>
                        </div>
                        <h4 class="card-title">Kategoria üzrə grafik</h4>
    </div>


    <div class="card-body ">




               <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive table-sales">
                                    <table class="table">
                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/apartments.svg">
                                                                </div>
                                                            </td>
                                                            <td>Bina ev Mənzil</td>
                                                            <td class="text-right">
                                                                2.920
                                                            </td>
                                                            <td class="text-right">
                                                                53.23%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/cottage.svg">
                                                                </div>
                                                            </td>
                                                            <td>Həyət evi</td>
                                                            <td class="text-right">
                                                                1.300
                                                            </td>
                                                            <td class="text-right">
                                                                20.43%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/village.svg">
                                                                </div>
                                                            </td>
                                                            <td>Villa</td>
                                                            <td class="text-right">
                                                                760
                                                            </td>
                                                            <td class="text-right">
                                                                10.35%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/house.svg">
                                                                </div>
                                                            </td>
                                                            <td>Bağ evi</td>
                                                            <td class="text-right">
                                                                690
                                                            </td>
                                                            <td class="text-right">
                                                                7.87%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/3d-building.svg">
                                                                </div>
                                                            </td>
                                                            <td>Ofis</td>
                                                            <td class="text-right">
                                                                690
                                                            </td>
                                                            <td class="text-right">
                                                                7.87%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/garage.svg">
                                                                </div>
                                                            </td>
                                                            <td>Qaraj</td>
                                                            <td class="text-right">
                                                                690
                                                            </td>
                                                            <td class="text-right">
                                                                7.87%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/forest.svg">
                                                                </div>
                                                            </td>
                                                            <td>Torpağ</td>
                                                            <td class="text-right">
                                                                600
                                                            </td>
                                                            <td class="text-right">
                                                                5.94%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../admin/assets/build/huseynzade/img/icons/dashboard/map-location.svg">
                                                                </div>
                                                            </td>
                                                            <td>Obyekt</td>
                                                            <td class="text-right">
                                                                550
                                                            </td>
                                                            <td class="text-right">
                                                                4.34%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto mr-auto">
                                <div id="worldMap" style="height: 300px;"></div>
                            </div>
                        </div>

    </div>



</div>

    </div>
</div>


<div class="row">
    <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-rose" data-header-animation="true">
            <div class="ct-chart" id="websiteViewsChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Bərpa Et!
                  </button>
                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Yenilə">
                      <i class="material-icons">refresh</i>
                  </button>
              </div>
              <h4 class="card-title">Gələn Elanlar</h4>
              <p class="card-category">Gələn Elanlar kategoria üzrə</p>
          </div>
          <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">local_offer</i> Gələn bütün Elanlar
              </div>
          </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-success" data-header-animation="true">
              <div class="ct-chart" id="dailySalesChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Bərpa Et!
                  </button>
                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Yenilə">
                      <i class="material-icons">refresh</i>
                  </button>
              </div>
              <h4 class="card-title">Gələn Elanlar</h4>
              <p class="card-category">
                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> Gələn Elanlar kategoria üzrə</p>
          </div>
          <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">access_time</i> 24 saat ərzində
              </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-chart">
          <div class="card-header card-header-info" data-header-animation="true">
              <div class="ct-chart" id="completedTasksChart"></div>
          </div>
          <div class="card-body">
              <div class="card-actions">
                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                      <i class="material-icons">build</i> Bərpa Et!
                  </button>
                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Yenilə">
                      <i class="material-icons">refresh</i>
                  </button>
              </div>
              <h4 class="card-title">Fərdi Elanlar</h4>
              <p class="card-category">Fərdilər kategoria üzrə</p>
          </div>
          <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">update</i> 24 saat ərzində
              </div>
          </div>
      </div>
    </div>
</div>





                      </div>
                    </div>
@endsection

@section('css')

@endsection

@section('scripts')
    {{--  Chart.js --}}
    {!! Html::script('admin/assets/vendors/Chart.js/dist/Chart.min.js') !!}

    <script type="text/javascript">
        var posts = document.getElementById("posts").getContext('2d');
        var myChart = new Chart(posts, {
            type: 'bar',
            data: {!! json_encode($announcementsGroup) !!},
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        var pros = document.getElementById("pros").getContext('2d');
        var myChart1 = new Chart(pros, {
            type: 'bar',
            data: {!! json_encode($proAnnouncementsGroup) !!},
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection

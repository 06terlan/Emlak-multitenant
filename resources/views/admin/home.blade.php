@extends('admin.masterpage')

@section('content')
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">{{ $total_users }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Admin Users</span>
        <div class="count">{{ $admin_users }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Author Users</span>
        <div class="count green">{{ $author_users }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> All Contacts</span>
        <div class="count">{{ $all_contacts }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Read Contacts</span>
        <div class="count">{{ $read_contacts }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Not Read Contacts</span>
        <div class="count">{{ $not_read_contacts }}</div>
      </div>
    </div>

    <div class="row">
    	<div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Posts<small> shared months</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <canvas id="posts" width="484" height="242" style="width: 484px; height: 242px;"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Posts<small> shared users</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <canvas id="user_sharings" width="484" height="242" style="width: 484px; height: 242px;"></canvas>
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
  		    data: {!! $posts !!},
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

      var user_sharings = document.getElementById("user_sharings").getContext('2d');
      var myChart = new Chart(user_sharings, {
          type: 'pie',
          data: {!! $user_sharings !!},
          options: {
            responsive: true
          }
      });
   </script>
@endsection

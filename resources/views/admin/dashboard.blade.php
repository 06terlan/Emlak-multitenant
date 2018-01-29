@extends('admin.masterpage')

@section('content')
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Agent</span>
            <div class="count">{{ $agents }}</div>
            <span class="count_bottom"> Bütün agentlər</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-share-alt"></i> Saytlardan elanlar</span>
            <div class="count">{{ $announcements }}</div>
            <span class="count_bottom"> Bütün saytlardan elanlar</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-share-alt-square"></i> Fərdi əlavə</span>
            <div class="count green">{{ $proAnnouncements }}</div>
            <span class="count_bottom"> Bütün fərdi əlavə </span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-share-alt"></i> Saytlardan elanlar</span>
            <div class="count">{{ $announcementsToday }}</div>
            <span class="count_bottom"> Bugün saytlardan elanlar</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-share-alt-square"></i> Fərdi əlavə</span>
            <div class="count">{{ $proAnnouncementsToday }}</div>
            <span class="count_bottom"> Bugün fərdi əlavə</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Elanlar</span>
            <div class="count">{{ $announcements + $proAnnouncements }}</div>
            <span class="count_bottom"> Bütün elanlar</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Saytlardan elanlar<small> bu gün</small></h2>
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
                    <h2> Fərdi əlavə<small> bu gün</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="pros" width="484" height="242" style="width: 484px; height: 242px;"></canvas>
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

@extends('admin.masterpage_huseynzade')



@section('content')


<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <!-- sekil + xerite -->


            <div class="card ">
    
                <div class="card-header mr-auto ml-auto">
                    <h4 class="card-title">Navigation Pills - <small class="description">Horizontal Tabs</small></h4>
                </div>
                
                <div class="card-body">

                            <div class="tab-content tab-space">
                                <!-- sekil -->
                                <div class="tab-pane active" id="link1">
                                    @foreach($announcement['pictures'] as $picture)
                                    <div class="card-header card-header-image" data-header-animation="true">
                                        <a href="#pablo">
                                            <img class="img" style="height: 400px" data-original="{{ url(\App\Library\MyClass::ANN_PIC_DIR . $picture->file_name) }}" src="{{ url(\App\Library\MyClass::ANN_THUMB_PIC_DIR . $picture->file_name) }}">
                                        </a>
                                    </div>
                                    @endforeach

                                    

                                </div>

                                <!-- xerite -->
                                <div class="tab-pane" id="link2">

                                    <div class="card-header card-header-image" data-header-animation="true">
                                        <div id="link2" style="display:none;height: 346px;">
                                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                            <div id="map" style="width: 100%;height: 100%"></div>
                                        </div>
                                    </div>
                                 
                                </div>

                            </div>
        
        
        
                            <ul class="nav nav-pills nav-pills-rose nav-pills-icons" role="tablist">
                                <li class="nav-item mr-auto ml-auto">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                       <i class="material-icons">insert_photo</i> Elanın şəkİllərİ
                                    </a>
                                </li>
                                <li class="nav-item mr-auto ml-auto">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                       <i class="material-icons">place</i> Elan Xərİtədə
                                    </a>
                                </li>
                            </ul>
                </div>
            </div>


                        <!-- sekil + xerite son -->



                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                              <!-- <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                              </div> -->
                              <h4 class="card-title">Fərdi Elan - <small class="category">Haqqında Ətraflı məlumat</small></h4>

                            </div>
                            <div class="card-body">

                                <form>
                                        <hr/>
                                            <p style="text-align: justify;">
                                                {!! $announcement->content !!}
                                            </p>
                                        <hr/>

                                        <div class="row">
                                            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <button type="button" style="width: 70%" class="btn btn-info" onclick="window.location.href='{{ url()->previous() }}'" rel="tooltip" data-placement="bottom" title="Geriyə">
                                                    <i class="material-icons">arrow_back</i>
                                                </button>
                                            </div>

                                            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <button type="button" style="width: 70%" class="btn btn-success " onclick="window.location.href='{{ route('announcement_insert',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Düzəliş Et">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </div>

                                            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

                                                <button type="button" style="width: 70%" class="btn btn-primary pull-right" onclick="window.location.href='{{ route('announcement_pro_status',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Web sayt">
                                                    {{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}
                                                    <!-- <i class="material-icons">link</i> -->
                                                </button>
                                            </div>

                                            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

                                                <button type="button" style="width: 70%" class="btn btn-danger pull-right" onclick="window.location.href='{{ route('announcement_pro_delete',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Sil Getsin">
                                                    <i class="material-icons">close</i>
                                                </button>

                                            </div>

                                        </div>


                                    <!-- <button type="submit" class="btn btn-rose pull-right">Update Profile</button> -->
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <!-- <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="{{ asset(Auth::user()->photo()) }}" />
                                </a>
                            </div> -->

                            <div class="card-body">

                                <h4 class="card-title">{{ $announcement->owner }}</h4>
                                @foreach ($announcement['numbers'] as $typeK => $num)
                                <h4>{{ $num['number'] }}</h4>
                                <h6 class="card-category text-gray">{!! \App\Library\MyHelper::getMakler($num['pure_number']) !!}</h6>
                                @endforeach
                                <hr><p class="card-description" style="text-align: justify;">
                                    {{ $announcement->header }}
                                </p><hr>

                                <!-- <hr/>
                                    <h4><span style="" class="text-danger">{{ (int)$announcement->amount }}</span> &#0160; <img src="../../assets/build/huseynzade/img/azn.png" style="width: 15px" alt="AZN"></h4>
                                <hr/> -->
                                <h5 class="text-left" style="">Obyektin növü: <span class="pull-right text-success">{{ $announcement->getAnnouncementType() }}</span></h5>
                                @if($announcement->type == 'building')
                                <p style="margin-top: -10px; color: red">{{ $announcement->getAnnouncementType2() }}</p>
                                @endif
                                <h5 class="text-left" style="">Elanın növü: <span class="pull-right text-success">{{ $announcement->getBuldingType() }}</span></h5>
                                <h5 class="text-left">Şəhər: <span class="pull-right text-success">{{ $announcement->city() }} AZ</span></h5>
                                <h5 class="text-left">Yerləşir: <span class="pull-right text-success">{{ $announcement->place }}</span></h5>

                                <h5 class="text-left">Metro: <span class="pull-right text-success">{{ $announcement->metro() }}</span></h5>

                                <h5 class="text-left">Nişangah: <span class="pull-right text-success"></span></h5>

                                <h5 class="text-left">Sahə: <span class="pull-right text-success">{{ $announcement->area }} m<sup>2</sup></span></h5>

                                @if(!in_array($announcement->type, ['land', 'garage']))
                                <h5 class="text-left">Binanın mərtəbə sayı: <span class="pull-right text-success">{{ $announcement->floorCount }}</span></h5>
                                @endif

                                @if(!in_array($announcement->type, ['land', 'garage', 'house', 'villa', 'garden_house']))
                                <h5 class="text-left">Yerləşdiyi mərtəbə: <span class="pull-right text-success">{{ $announcement->locatedFloor }}</span></h5>
                                @endif
                                
                                @if($announcement->type != 'land')
                                <h5 class="text-left">Otaq sayı: <span class="pull-right text-success">{{ $announcement->roomCount }}</span></h5>
                                @endif

                                <h5 class="text-left">Binanın təmiri: <span class="pull-right text-success">{{ $announcement->getRepairing() }}</span></h5>

                                <h5 class="text-left">Binanın çıxarışı: <span class="pull-right text-success">{{ $announcement->getDocumentType() }}</span></h5>
                                
                                <h5 class="text-left">Əlavə Edib: <span class="pull-right text-success">{{ $announcement->author->fullname() }}</span></h5>

                                <h5 class="text-left">Elanın statusu: <span class="pull-right text-success">{!! $announcement->getStatus() !!}</span></h5>

                                <!-- <h5 class="text-left">Gəldiyi yer: <span class="pull-right" style="color: yellowgreen">{{ $announcement->site }}</span></h5> -->

                                <h5 class="text-left">Elanı tarixi: <span class="pull-right text-danger">{{ date("d-m-Y", strtotime($announcement->date)) }}</span></h5>





                                <!-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> -->
                            </div>
                        </div>
                        <div class="ln_solid"></div>

                                <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $announcement->getLocations()[0] }}">
                                <input type="hidden" id="loc_lng" name="loc_lng" value="{{ $announcement->getLocations()[1] }}">
                    </div>
                </div>
            </div>
        </div>


   

@endsection

@section('css')
    {{--  view --}}
    {!! Html::style('admin/assets/vendors/view/css/viewer.css') !!}
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
    {{--  bootstrap-wysiwyg --}}
    <style>
        #map {
            height: 346px;
        }
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 60%;
            margin-top: 10px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }
    </style>
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/view/js/viewer.js') !!}
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}

    <script type="text/javascript">
        var pictures = document.querySelector('#photo_div');
        var options = {
            // inline: true,
            url: 'data-original',
            ready: function (e) {
                console.log(e.type);
            },
            show: function (e) {
                console.log(e.type);
            },
            shown: function (e) {
                console.log(e.type);
            },
            hide: function (e) {
                console.log(e.type);
            },
            hidden: function (e) {
                console.log(e.type);
            },
            view: function (e) {
                console.log(e.type);
            },
            viewed: function (e) {
                console.log(e.type);
            }
        };
        viewer = new Viewer(pictures, options);

        function show(div, el)
        {
            $(".footerBox .active").removeClass('active');
            $("#photo_div, #map_div").hide();

            $("#" + div + "_div").addClass('active').show();
            el.addClass('active');
        }

        var map;
        var loc_lat = parseFloat(document.getElementById('loc_lat').value);
        var loc_lng = parseFloat(document.getElementById('loc_lng').value);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:  loc_lat, lng: loc_lng},
                zoom: 12
            });

            var marker = new google.maps.Marker({
                position: {lat: loc_lat, lng: loc_lng},
                map: map,
                title: 'Burada',
                animation: google.maps.Animation.BOUNCE,
            });

            marker.addListener('dragend', handleEvent);

            function handleEvent(event) {
                document.getElementById('loc_lat').value = event.latLng.lat();
                document.getElementById('loc_lng').value = event.latLng.lng();
            }

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();

                places.forEach(function(place) {

                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                });

                map.fitBounds(bounds);
                map.setZoom(15);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMdXLXNx-pQWnbe3-mEYZkr3sPUdxlpvw&callback=initMap&libraries=places" async defer></script>
@endsection
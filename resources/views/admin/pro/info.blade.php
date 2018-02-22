@extends('admin.masterpage')



@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_title">
                    <h2>Elan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left infoPage" novalidate=""  method="post">
                        <!--info melumat -->
                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="headrBox effect7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="listClassLeft">
                                                <ul class="">
                                                    <li>
                                                        <a href="{{ url()->previous() }}">
                                                            <i class="fa fa-backward"> <span class="iconSpan" >Geriyə</span> </i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $announcement->link }}" target="_blank">
                                                            <i class="fa fa-link"> <span class="iconSpan" style="padding-right:15px;" >Link</span> </i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="listClass">
                                                <ul class="">
                                                    {{--<li>
                                                        <a href="">
                                                            <i class="fa fa-thumb-tack"> <span class="iconSpan" >Qeyd et</span> </i>
                                                        </a>
                                                    </li>--}}
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-print"> <span class="iconSpan">Print</span> </i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-share-alt"> <span class="iconSpan" style="padding-right:15px;" >Paylaş</span> </i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12 col-md-8">
                                <div class="leftBox effect7">

                                    <!--section #phto-->
                                    <div id="photo_div" class="infoPhoto">

                                    </div>
                                     <!--section #phto end-->

                                     <!--section #map-->
                                    <div id="map_div" style="display:none;height: 346px;">
                                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                        <div id="map" style="width: 100%;height: 100%"></div>
                                    </div>
                                    <!--section #map end-->

                                </div>

                                <div class="footerBox effect7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="active Button" onclick="show('photo', $(this))">
                                                <i class="fa fa-camera">
                                                    <span style="color:#515762;">&#0160; Şəkillər </span>
                                                </i>
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                             <button type="button" class="Button" onclick="show('map', $(this))">
                                                 <i class="fa fa-map">
                                                     <span style="color:#515762;">&#0160; Xəritə </span>
                                                 </i>
                                             </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="contentBox effect7">
                                    <p style="font-size:16px; padding-left:15px; margin-top:10px; text-indent:1.5em; color: #515762;">{!! $announcement->content !!}</p>
                                </div>

                            </div>

                            <div class="col-sm-12 col-md-4"> <!-- right panel -->
                                <div class="rightBox effect7">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="margin-top:15px; color: #23bbd2">
                                            <i class="fa fa-phone fa-2x"></i>
                                            @foreach ($announcement['numbers'] as $typeK => $num)
                                                <span style="color:#2e3238; font-size: 1.7rem; font-weight: 700;">
                                            {{ $num['number'] }} ({!! \App\Library\MyHelper::getMakler($num['pure_number']) !!})
                                        </span>
                                            @endforeach
                                            <br/>
                                            <span class="textColorSpan" style="font-size: 20px;">&#0160; 250000.00</span> <span style="font-size:12px;" >AZN</span>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <p style="margin-top:10px;">{{ $announcement->header }}</p>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Obyektin növü: <span class="textColorSpan">&#0160; {{ $announcement->getAnnouncementType() }} </span></div>
                                        </div>

                                        @if($announcement->type == 'building')
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                                <div class="elanBox">Binanın növü: <span class="textColorSpan">&#0160; {{ $announcement->getAnnouncementType2() }} </span></div>
                                            </div>
                                        @endif

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Elanın növü: <span class="textColorSpan">&#0160; {{ $announcement->getBuldingType() }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Şəhər: <span class="textColorSpan">&#0160; {{ $announcement->city->name }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Metro: <span class="textColorSpan">&#0160; {{ $announcement->metro->name }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Yerləşir: <span class="textColorSpan">&#0160; {{ $announcement->place }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Sahə m<sup>2</sup>: <span class="textColorSpan">&#0160; {{ $announcement->area }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Otaq sayı: <span class="textColorSpan">&#0160; {{ $announcement->roomCount }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Yerləşdiyi mərtəbə: <span class="textColorSpan">&#0160; {{ $announcement->locatedFloor }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Mərtəbə sayı: <span class="textColorSpan">&#0160; {{ $announcement->floorCount }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Sənədin tipi: <span class="textColorSpan">&#0160; {{ $announcement->getDocumentType() }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Təmiri: <span class="textColorSpan">&#0160; {{ $announcement->getRepairing() }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Sahibi: <span class="textColorSpan">&#0160; {{ $announcement->owner }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Sayt: <span class="textColorSpan">&#0160; {{ $announcement->site }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Əlavə edib: <span class="textColorSpan">&#0160; {{ $announcement->author->fullname() }} </span></div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">
                                                <i class="fa fa-calendar" style="color:#23bbd2"></i> Tarix: <span class="textColorSpan">&#0160; 08.05.2018 </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">
                                                <a class="btn btn-danger deleteAction" style="width: 100%;" href="{{ route('announcement_pro_delete',['id'=>$announcement->id]) }}"><i class="fa fa-trash"></i> Elanı sil</a>
                                                <a class="btn btn-primary" style="width: 100%;" href="{{ route('announcement_pro_status',['id'=>$announcement->id]) }}"><i class="fa fa-check-square-o"></i> {{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ln_solid"></div>

                        <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $announcement->getLocations()[0] }}">
                        <input type="hidden" id="loc_lng" name="loc_lng" value="{{ $announcement->getLocations()[1] }}">
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('css')
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
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}

    <script type="text/javascript">
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
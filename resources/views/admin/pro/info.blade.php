@extends('admin.masterpage')



@section('content')

    @include('admin.error')

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

                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post">

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Header:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->header !!}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kategoria:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->getAnnouncementType() }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Elanın Tipi:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->getBuldingType() }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Link:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                <a href="{{ $announcement->link }}" target="_blank">{{ $announcement->link == "" ? "-":"Link" }}</a>

                            </div>

                        </div>


                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tarix:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ \App\Library\Date::d($announcement->created_date, "d-m-Y") }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dəyəri:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->amount }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sahə:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->area }} m<sup>2</sup>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Metro:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->metro->name }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Şəhər:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->city }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Otaqların sayı:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->roomCount }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Yerləşdiyi mərtəbə:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->locatedFloor }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Mərtəbə sayı:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->floorCount }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Content:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->content !!}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sənədin tipi:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->getDocumentType() !!}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Təmiri:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->getRepairing() !!}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sahibkar:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->owner !!}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nömrə:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                @foreach ($announcement['numbers'] as $typeK => $num)
                                    <div class="numb">
                                        {{ $num['number'] }}
                                        {!! \App\Library\MyHelper::getMakler($num['pure_number']) !!}
                                    </div>
                                @endforeach

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Xəritə:</label>

                            <div class="col-md-9 col-sm-9 col-xs-9" style="height: 300px;">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <div id="map" style="width: 100%;height: 100%"></div>
                            </div>

                        </div>


                        <div class="ln_solid"></div>

                        <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $announcement->getLocations()[0] }}">
                        <input type="hidden" id="loc_lng" name="loc_lng" value="{{ $announcement->getLocations()[1] }}">

                        <div class="form-group">

                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">

                                <a class="btn btn-default" href="{{ url()->previous() }}" type="reset"><i class="fa fa-arrow-circle-left"></i> Back</a>

                                @if( \App\Library\MyHelper::has_priv("announcement_pro", \App\Library\MyClass::PRIV_CAN_ADD) )
                                    <a href="{{ route('announcement_insert',['announcement'=>$announcement->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="{{ route('announcement_pro_delete',['announcement'=>$announcement->id]) }}" class="btn btn-danger deleteAction"><i class="fa fa-trash"></i> Delete</a>

                                    <a href="{{ route('announcement_pro_status',['announcement'=>$announcement->id]) }}" class="btn btn-success"><i class="fa fa-thumb-tack"></i> {{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}</a>
                                @endif
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('css')

    {{--  bootstrap-wysiwyg --}}
    <style>
        #map {
            height: 500px;
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

    <script type="text/javascript">
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
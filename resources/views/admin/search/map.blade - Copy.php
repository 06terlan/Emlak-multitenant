@extends('admin.masterpage')



@section('content') 
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Elanlar</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link" data-toggle="tooltip" data-original-title="Gizlət/Göstər">Filtirlər <i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="x_content">

                    <div class="row">

                        <form class="form-horizontal form-label-left formFinder" novalidate="" method="get">

                            <input type="hidden" name="page" value="{{ $request->get("page",1) }}">
                            <div class="form-group">
                                <label class="control-label col-md-2">Tarix</label>
                                <div class="col-md-4">

                                    <div class="input-group">
                                        <input type="text" class="form-control daterange" name="date1" value="{{ $request->get('date1','') }}" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="text" class="form-control daterange" name="date2" value="{{ $request->get('date2','') }}" placeholder="Maksimum">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Kategoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('type')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Agent (user)</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="user">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\User::realUsers()->get() as $type)
                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get('user')? 'selected':'' }}> {{ $type->fullname() }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Elanın Tipi</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="buldingType">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('buldingType')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Təmiri</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="repairing">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$repairingTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('repairing')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sənədin Tipi</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="documentType">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$documentTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('documentType')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Şəhər</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,20" name="city" class="form-control" value="{{ $request->get('city') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Dəyəri</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="amount1" value="{{ $request->get('amount1') }}" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" class="form-control" name="amount2" value="{{ $request->get('amount2') }}" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Header</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,200" name="header" {{ $request->get('header') }} class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sahə</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" name="area1" value="{{ $request->get('area1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" name="area2" value="{{ $request->get('area2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Sahibkar</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,40" name="owner" value="{{ $request->get('owner') }}" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Otaq</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" data-validate-minmax=",255" name="roomCount1" value="{{ $request->get('roomCount1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" data-validate-minmax=",255" name="roomCount2" value="{{ $request->get('roomCount2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Nömrə</label>
                                <div class="col-md-4">
                                    <input type="text" name="mobnom" value="{{ $request->get('mobnom') }}" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mərtəbə</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" data-validate-minmax=",30000" name="floorCount1" value="{{ $request->get('floorCount1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" data-validate-minmax=",30000" name="floorCount2" value="{{ $request->get('floorCount2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Metro</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="metro">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$metros as $key => $metro)
                                            <option value="{{ $key }}" {{ $key == $request->get('metro')? 'selected':'' }}> {{ $metro[0] }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Yer m.</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" name="locatedFloor1" value="{{ $request->get('locatedFloor1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" name="locatedFloor2" value="{{ $request->get('locatedFloor2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="status">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$buttonStatus2 as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('status')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Content</label>
                                <div class="col-md-4">
                                    <textarea class="resizable_textarea form-control" placeholder="Content" name="content" style="border-radius: 5px; height: 200px;">{{ $request->get('content') }}</textarea>
                                </div>
                            </div>

                            <button type="submit" onclick="$('[name=page]').val(1);" class="btn btn btn-round btn-success" style="margin-top: 30px; width: 75%; height: 65px; font-size: 22px; font-weight: bold; margin-left: 15%;"><i class="fa fa-search"></i> Xəritədə göstər</button>

                        </form>

                    </div>
                </div>

                <!-- end x-content -->

                <div class="content">

                    <div class="row">

                        <div class="col-md-12 col-xs-12" style="height: 500px;">
                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div id="map" style="width: 100%;height: 100%"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('css')

    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}

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

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}

    <script>
        $(function () {
            $('input.daterange').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD-MM-YYYY'
                },
            });

            if( "{{ $request->get('page','') }}" != "" )
            {
                $(".collapse-link").click();
            }
        });

        //
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:  40.4018289, lng: 49.8425902},
                zoom: 10
            });

            let markers = {};
            let infowindows = {};
            @foreach ($markers as $marker)
                markers[ {{ $loop->iteration }} ] = new google.maps.Marker({
                    position: {lat: {{ $marker->getLocations()[0] }}, lng: {{ $marker->getLocations()[1] }} },
                    map: map,
                    title: 'Əmlak',
                    icon: "{{  url('/admin/images/map/' . $marker->type . '.png') }}"
                });
                infowindows[ {{ $loop->iteration }} ] = new google.maps.InfoWindow({
                    content: '<div id="content" style="width: 500px;">\
                        <div class="col-md-12"><h2>{{ $marker->header }}</h2></div>\
                        <div class="item col-md-12">\
                            <label class="control-label col-xs-3">Kategoria:</label>\
                            <div class="col-xs-9"> {{ $marker->getAnnouncementType() }}</div>\
                        </div>\
                        <div class="item col-md-12">\
                            <label class="control-label col-xs-3">Elanın Tipi:</label>\
                            <div class="col-xs-9"> {{ $marker->getBuldingType() }}</div>\
                        </div>\
                        <div class="item col-md-12">\
                            <label class="control-label col-xs-3">Qiymət:</label>\
                            <div class="col-xs-9"> {{ $marker->amount }}</div>\
                        </div>\
                        <div class="item col-md-12">\
                            <label class="control-label col-xs-3">Ətraflı:</label>\
                            <div class="col-xs-9"> <a target="_blank" href="{{ route('announcement_pro_info',['announcement'=> $marker->id]) }}"> Link </a> </div>\
                        </div>\
                    </div>'
                });
                markers[ {{ $loop->iteration }} ].addListener('click', function() {
                    for(var n in infowindows) if( infowindows[n] ) infowindows[n].close();
                    infowindows[ {{ $loop->iteration }} ].open(map, markers[ {{ $loop->iteration }} ]);
                });
            @endforeach

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
                });

                map.fitBounds(bounds);
                map.setZoom(15);
            });

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMdXLXNx-pQWnbe3-mEYZkr3sPUdxlpvw&callback=initMap&libraries=places" async defer></script>
@endsection

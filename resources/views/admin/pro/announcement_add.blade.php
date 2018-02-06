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

                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ isset($from) && $from > 0 ? route('announcement_insert_act_from',['announcement' => $from]) : route('announcement_insert_act',['announcement' => $id]) }}">

                        <input type="hidden" value="{{ isset($from) ? $from : 0 }}" name="from" />

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Header

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input required="" name="header" data-validate-length-range="5,200" type="text" class="form-control" placeholder="Header" value="{{ $announcement['header'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategoria

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="type" required="">

                                    @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Elanın Tipi

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="buldingType" required="">

                                    @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['buldingType']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dəyəri

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input required="" type="number" data-validate-minmax="1,99999999" name="amount" type="text" class="form-control" placeholder="Dəyəri" value="{{ $announcement['amount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sahə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1," name="area" type="text" class="form-control" placeholder="Sahə" value="{{ $announcement['area'] }}">

                            </div>

                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Metro

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="metro" required="">

                                    @foreach ( \App\Models\MskMetro::all() as $metro)

                                        <option value="{{ $metro['id'] }}" {{ $metro['id'] == $announcement['metro_id']? 'selected':'' }}> {{ $metro->name }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>





                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Şəhər

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input name="city" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Şəhər" value="{{ $announcement['city'] }}">

                            </div>

                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Otaqların sayı

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,255" name="roomCount" type="text" class="form-control" placeholder="Otaqların sayı" value="{{ $announcement['roomCount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Yerləşdiyi mərtəbə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,30000" name="locatedFloor" type="text" class="form-control" placeholder="Yerləşdiyi mərtəbə" value="{{ $announcement['locatedFloor'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mərtəbə sayı

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,30000" name="floorCount" type="text" class="form-control" placeholder="Mərtəbə sayı" value="{{ $announcement['floorCount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sənədin tipi

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="documentType" required="">

                                    @foreach (\App\Library\MyClass::$documentTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Təmiri

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="repairing" required="">

                                    @foreach (\App\Library\MyClass::$repairingTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>






                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sahibkar

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input name="owner" data-validate-length-range="1,40" type="text" class="form-control" placeholder="Sahibkar" value="{{ $announcement['owner'] }}">

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nömrə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12" id="allNubers">
                                @if($announcement['numbers'] != null)
                                    @foreach ($announcement['numbers'] as $typeK => $num)
                                        <div class="numb">
                                            <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="'mask' : '(999) 999-9999'" name="mobnom[]" type="text" class="form-control" value="{{ $num['number'] }}" placeholder="Nömrə">
                                            <button type="button" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="fa fa-trash"></i></button>
                                        </div>
                                    @endforeach
                                @else
                                        <div class="numb">
                                            <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="'mask' : '(999) 999-9999'" name="mobnom[]" type="text" class="form-control" value="" placeholder="Nömrə">
                                            <button type="button" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="fa fa-trash"></i></button>
                                        </div>
                                @endif
                                <button type="button" class="btn btn-success addNumber">+ Add</button>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">

                            </div>
                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content

                            </label>

                            <div class="col-md-9 col-sm-6 col-xs-12">

                                <textarea id="descr" style="width:100%;height:251px;" name="content">{{ strip_tags($announcement['content']) }}</textarea>

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Agent (user)

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="user" required="">

                                    @foreach ( \App\User::realUsers()->get() as $user)

                                        <option value="{{ $user['id'] }}" {{ $user['id'] == $announcement['userId']? 'selected':'' }}> {{ $user->fullname() }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Xəritə

                            </label>

                            <div class="col-md-9 col-sm-9 col-xs-9" style="height: 300px;">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <div id="map" style="width: 100%;height: 100%"></div>
                            </div>

                        </div>



                        <div class="ln_solid"></div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $id > 0 ? $announcement->getLocations()[0] : '40.4242696' }}">
                        <input type="hidden" id="loc_lng" name="loc_lng" value="{{ $id > 0 ? $announcement->getLocations()[1] : '49.8522489' }}">

                        <div class="form-group">

                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">

                                <button type="submit" class="btn btn-success">Save</button>

                                <a class="btn btn-default" href="{{ url()->previous() }}" type="reset"><i class="fa fa-arrow-circle-left"></i> Cancel</a>

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
        .numb{
            width: 190px;
        }
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
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <script type="text/javascript">
        $(".addNumber").click(function(){
            $(this).before('<div class="numb"> <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="\'mask\' : \'(999) 999-9999\'" name="mobnom[]" type="text" class="form-control" placeholder="Nömrə"> <button type="submit" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents(\'.numb:eq(0)\').remove()"><i class="fa fa-trash"></i></button> </div>');
            $("#allNubers .numb:last input").inputmask("mask", {"mask": "(999) 999-9999"});
        });

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
                /*icon: 'pin.png',*/
                animation: google.maps.Animation.BOUNCE,
                draggable: true
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
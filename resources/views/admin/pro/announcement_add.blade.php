@extends('admin.masterpage_huseynzade')



@section('content')

    @include('admin.error')


<div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Fərdi Elan əlavə et</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" enctype="multipart/form-data" class="form-horizontal" novalidate=""  method="post" action="{{ isset($from) && $from > 0 ? route('announcement_insert_act_from',['announcement' => $from]) : route('announcement_insert_act',['announcement' => $id]) }}">
                                <input type="hidden" value="{{ isset($from) ? $from : 0 }}" name="from" />
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Elanın başlığı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <input required="" name="header" data-validate-length-range="5,200" type="text" class="form-control" placeholder="Header" value="{{ $announcement['header'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Obyektin növü</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select name="type" required="" class="selectpicker"  data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-orange">
                                                    @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)

                                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Binanın növü</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="type2" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-red">
                                                    @foreach (\App\Library\MyClass::$buldingSecondType as $typeK => $type)

                                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type2']? 'selected':'' }}> {{ $type }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Elanın Tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="buldingType" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-goy">
                                                    @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)

                                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['buldingType']? 'selected':'' }}> {{ $type }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Dəyəri</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input required="" type="number" data-validate-minmax="1,99999999" name="amount" type="text" class="form-control" placeholder="Dəyəri" value="{{ $announcement['amount'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Sahə</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                               <input type="number" data-validate-minmax="1," name="area" type="text" class="form-control" placeholder="Sahə" value="{{ $announcement['area'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Metro</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select style="width: 100%" class="select2 " name="metro" required="">
                                                    @foreach (\App\Library\MyClass::$metros as $key => $metro)

                                                        <option value="{{ $key }}" {{ $key == $announcement['metro_id']? 'selected':'' }}> {{ $metro[0] }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Şəhər</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select style="width: 100%" class="select2" name="city" required="">
                                                    @foreach ( \App\Models\MskCity::all() as $city)
                                                        <option value="{{ $city['id'] }}" {{ $city['id'] == $announcement['city_id']? 'selected':'' }}> {{ $city->name }} </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Elanın Ünvanı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input type="text" data-validate-minmax="1,255" name="place" class="form-control" placeholder="Address" value="{{ $announcement['place'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Otaqların sayı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input type="number" data-validate-minmax="1,255" name="roomCount" type="text" class="form-control" placeholder="Otaqların sayı" value="{{ $announcement['roomCount'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Yerləşdiyi mərtəbə</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input type="number" data-validate-minmax="1,30000" name="locatedFloor" type="text" class="form-control" placeholder="Yerləşdiyi mərtəbə" value="{{ $announcement['locatedFloor'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Mərtəbə sayı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input type="number" data-validate-minmax="1,30000" name="floorCount" type="text" class="form-control" placeholder="Mərtəbə sayı" value="{{ $announcement['floorCount'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Sənədin tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="documentType" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-sened">
                                                    @foreach (\App\Library\MyClass::$documentTypes as $typeK => $type)

                                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['documentType']? 'selected':'' }}> {{ $type }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Təmiri</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="repairing" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan">
                                                    @foreach (\App\Library\MyClass::$repairingTypes as $typeK => $type)

                                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['repairing']? 'selected':'' }}> {{ $type }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Sahibkar</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="owner" data-validate-length-range="1,40" type="text" class="form-control" placeholder="Sahibkar" value="{{ $announcement['owner'] }}">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nomre -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Şəxsin nömrəsi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto" id="allNubers">
                                            <div class="form-group">
                                                
                                                @if($announcement['numbers'] != null)
                                                @foreach ($announcement['numbers'] as $typeK => $num)
                                                    <div class="numb">
                                                        <input style="width: 80%;display: inline-block;" required="" type="text" name="mobnom[]" type="text" class="form-control" value="{{ $num['number'] }}" placeholder="Nömrə">
                                                        <button type="button" class="btn btn-danger btn-link" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="material-icons">close</i></button><i class="material-icons">close</i></button>
                                                    </div>
                                                @endforeach
                                            @else
                                                    <div class="numb">
                                                        <input style="width: 80%;display: inline-block;" required="" type="text" name="mobnom[]" type="text" class="form-control" value="" placeholder="Nömrə">
                                                        <button type="button" class="btn btn-danger btn-link" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="material-icons">close</i></button>
                                                    </div>
                                            @endif
                                            <button type="button" class="btn btn-success btn-link addNumber"><i class="material-icons">add</i> Nömrə əlavə et</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nomre son -->

                                    <!-- photo -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right"></label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto" id="allPictures">
                                            <h4 class="title">Regular Image</h4>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="../../assets/build/huseynzade/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Şəkil seçin</span>
                                                        <span class="fileinput-exists">Dəyiş</span>
                                                        <input type="file" name="..." />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Sil</a>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-success addPicture">+ Add</button>
                                        </div>
                                    </div>
                                    <!-- photo son -->

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Ətraflı məlumat</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <textarea id="descr" class="form-control" rows="5" id="exampleInputTextarea" name="content">{{ strip_tags($announcement['content']) }}</textarea>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Agent (user)</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">

                                                <select style="width: 100%" class="select2" name="user" required="">
                                                    @foreach ( \App\User::realUsers()->get() as $user)

                                                        <option value="{{ $user['id'] }}" {{ $user['id'] == $announcement['userId']? 'selected':'' }}> {{ $user->fullname() }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Xəritə</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group" style="height: 300px;">
                                                <input id="pac-input" class="form-control" type="text" placeholder="Search Box">
                                                <div id="map" style="width: 100%;height: 100%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="ln_solid"></div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <input type="hidden" id="loc_lat" name="loc_lat" value="{{ $id > 0 ? $announcement->getLocations()[0] : '40.4242696' }}">
                                    <input type="hidden" id="loc_lng" name="loc_lng" value="{{ $id > 0 ? $announcement->getLocations()[1] : '49.8522489' }}">

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="submit">&#0160;Saxla&#0160;
                                                <div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-sm-5 col-md-6 mr-auto ml-auto">
                                            <button class="btn btn-danger" onclick="window.location.href='{{ url()->previous() }}'" type="reset">Geriyə<div class="ripple-container"></div></button>
                                        </div>

                                    </div>

                            </form> 
        
        </div>
  
    </div>

</div>


@endsection



@section('css')
    <!-- select2 -->
    {!! Html::style('admin/assets/build/new/Plugins/select2.css') !!}

    {{--  bootstrap-wysiwyg --}}
    <style>
        /*.numb{
            width: 190px;
        }*/
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
    <!-- select2 -->
    {!! Html::script('admin/assets/build/new/Plugins/select2.min.js') !!}

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}

    <script type="text/javascript">
        $(".select2").select2({
            //placeholder: "Hamısı",
            //allowClear: true
        });

        $("select[name='type']").change(function(){
            $("select[name='type2']").parents('.form-group').hide();
            $("input[name='locatedFloor']").parents('.form-group').show();
            $("input[name='roomCount']").parents('.form-group').show();
            $("input[name='floorCount']").parents('.form-group').show();
            $("select[name='repairing']").parents('.form-group').show();

            switch ($(this).val()){
                case 'building':
                    $("select[name='type2']").parents('.form-group').show();
                    break;
                case 'land':
                    $("input[name='locatedFloor']").parents('.form-group').hide();
                    $("input[name='roomCount']").parents('.form-group').hide();
                    $("input[name='floorCount']").parents('.form-group').hide();
                    $("select[name='repairing']").parents('.form-group').hide();
                    break;
                case 'garage':
                    $("input[name='locatedFloor']").parents('.form-group').hide();
                    $("input[name='roomCount']").parents('.form-group').hide();
                    $("input[name='floorCount']").parents('.form-group').hide();
                    break;
                case 'house':
                case 'villa':
                case 'garden_house':
                    $("input[name='locatedFloor']").parents('.form-group').hide();
                    break;
                case 'office':
                case 'object':
                    $("input[name='roomCount']").parents('.form-group').hide();
                    break;
            }
        }).trigger("change");

        //$("#allNubers .numb input").inputmask("mask", {"mask": "(999) 999-9999"});
        $(".addNumber").click(function(){
            $(this).before('<div class="numb"> <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="\'mask\' : \'(999) 999-9999\'" name="mobnom[]" type="text" class="form-control" placeholder="Nömrə"> <button type="submit" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents(\'.numb:eq(0)\').remove()"><i class="fa fa-trash"></i></button> </div>');
            $("#allNubers .numb:last input").inputmask("mask", {"mask": "(999) 999-9999"});
        });

        $(".addPicture").click(function(){
            $(this).before('<div class="numb"> <input style="width: 80%;display: inline-block;" accept="image/*" required="" type="file" name="pictures[]" class="form-control"> <button type="button" class="btn btn-danger btn-xs" onclick="$(this).parents(\'.numb:eq(0)\').remove()"><i class="fa fa-trash"></i></button> </div>');
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
@extends('admin.masterpage_huseynzade')



@section('content')

    @include('admin.error')


<div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">İstifadəçi dəyişikliyi</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" novalidate=""  method="post" action="" class="form-horizontal">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Elanın başlığı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input required="" name="name" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçinin Şəxsi Adı" value="">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Obyektin növü</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Binanın növü</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Elanın Tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Dəyəri</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Sahə</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Metro</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Şəhər</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Ünvan</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Otaqların sayı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Yerləşdiyi mərtəbə</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Mərtəbə sayı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Sənədin tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Təmiri</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Sahibkar</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nomre -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Şəxsin nömrəsi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- nomre son -->

                                    <!-- photo -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right"></label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <h4 class="title">Regular Image</h4>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="../../assets/build/huseynzade/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="..." />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- photo son -->

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Ətraflı məlumat</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                
                                                <textarea name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value=""></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Agent (user)</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker ht-btn" name="user" required="">
                                                    @foreach ( \App\User::realUsers()->get() as $user)

                                                        <option value="{{ $user['id'] }}" {{ $user['id'] == $announcement['userId']? 'selected':'' }}> {{ $user->fullname() }} </option>

                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    
                                    <div class="ln_solid"></div>
                                    <input type="hidden" name="_token" value="">

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="submit">Saxla<div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-sm-5 col-md-6 mr-auto ml-auto">
                                            <button class="btn btn-danger" onclick="window.location.href=''" type="reset">Geriyə<div class="ripple-container"></div></button>
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
    <!-- <style>
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
    </style> -->
@endsection



@section('scripts')
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}
    <!-- select2 -->
    {!! Html::script('admin/assets/build/new/Plugins/select2.min.js') !!}

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}


    <script type="text/javascript">

        $(document).ready(function(){

          //init DateTimePickers
          md.initFormExtendedDatetimepickers();


          // Sliders Init
          md.initSliders();

        });

    </script>

      <script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
    </script>

    <script type="text/javascript">
        $("select").select2({
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
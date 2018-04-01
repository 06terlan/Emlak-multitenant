@extends('admin.masterpage_huseynzade')



@section('content') 
    @include('admin.error')

<div class="row">
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-text card-header-rose">
            <div class="card-text">
                <h4 class="card-title">Uydu Xəritəsi</h4>
            </div>
        </div>
        <div class="card-body ">
<!--           <h4 class="card-title"></h4> -->
                    

                        <div class="col-md-12 col-xs-12" style="height: 500px; margin-top: -60px">
                            <input id="pac-input" class="controls form-control" type="text" placeholder="Xəritədə axtar">
                            <div id="map" style="width: 100%; height: 100%"></div>
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
        h2 {
            font-size: 1rem !important;
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
                            <div class="col-xs-9"> <a target="_blank" href="{{ route('announcement_pro_info',['announcement'=> $marker->id]) }}"> Məlumat </a> </div>\
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

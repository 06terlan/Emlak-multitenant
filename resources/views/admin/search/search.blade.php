@extends('admin.masterpage_huseynzade')

@section('content')

    @include('admin.error')
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <div class="col-md-12">
        <form method="get" action="">
            <div class="card ">

            <div class="card-header mr-auto ml-auto">
            <h4 class="card-title">Navigation Pills - <small class="description">Horizontal Tabs</small></h4>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">

                                <div class="row">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Elanın Seçimi</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" name="which" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Elanın Seçimi">
                                            <option></option>
                                            <option value="1" {{ $request->get('which') == 1? 'selected':'' }}>Elanlar</option>
                                            <option value="2" {{ $request->get('which') == 2? 'selected':'' }}>Fərdilər</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Obyektin növü</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px" >
                                        <select class="selectpicker" name="type" data-style="btn btn-hm btn-new-hm btn-new-hm-orange" title="Obyektin növün seç">
                                            <option></option>
                                            @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get('type')? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Binanın növü</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" name="buldingSecondType" data-style="btn btn-hm btn-new-hm btn-new-hm-red" title="Binanın növün seç">
                                            @foreach (\App\Library\MyClass::$buldingSecondType as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get('buldingSecondType')? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Elanın növü</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" name="buldingType" data-style="btn btn-hm btn-new-hm btn-new-hm-goy" title="Elanın növün seç">
                                            @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get('buldingType') ? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Şəhər</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker  btn-select2-red" data-live-search="true" title="Select the product" name="city">
                                            @foreach (\App\Library\MyClass::$city as $key => $type)
                                                <option value="{{ $key }}" {{ $key == $request->get('city') ? 'selected':'' }}> {{ $type[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Rayon</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker  btn-select2-goy" data-live-search="true" multiple title="Select the product" name="district[]">
                                            @foreach (\App\Library\MyClass::$district as $key => $type)
                                                <option value="{{ $key }}" {{ in_array($key, $request->get('district',[])) ? 'selected':'' }}> {{ $type[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Metro</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker  btn-select2-orange" multiple data-live-search="true" title="Select the product" name="metro[]">
                                            @foreach (\App\Library\MyClass::$metros as $key => $type)
                                                <option value="{{ $key }}" {{ in_array($key, $request->get('metro',[])) ? 'selected':'' }}> {{ $type[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <!-- <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Qəsəbə</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker  btn-select2-badimcan" multiple data-live-search="true" title="Select the product" name="">
                                                    <option data-tokens="Get Shit Done Kit" >
                                                        Get Shit Done Kit
                                                    </option>

                                                    <option data-tokens="" >
                                                        BB Shit Done Kit
                                                    </option>

                                                    <option data-tokens="" >
                                                        DD Shit Done Kit
                                                    </option>

                                                    <option data-tokens="" data-id="">
                                                        RRR Shit Done Kit
                                                    </option>
                                                </select>
                                    </div>
                                  </div> -->

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Nişangah</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker  btn-select2-tundgoy" multiple data-live-search="true" title="Select the product" name="sight[]">
                                            @foreach (\App\Library\MyClass::$sight as $key => $type)
                                                <option value="{{ $key }}" {{ in_array($key, $request->get('sight',[])) ? 'selected':'' }}> {{ $type[0] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>
                    </div> <!-- ilk col-6 1ci hisse -->

                    <div class="col-md-6">

                                <div class="row">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Satıcının tipi</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" name="ownerType" data-style="btn btn-hm btn-new-hm btn-new-hm-tundgoy" title="Satıcının tipin seç">
                                            <option>Hamısı</option>
                                            @foreach (\App\Library\MyClass::$ownerType as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $request->has('ownerType') && $typeK == $request->get('ownerType',"") ? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Binanın çıxarışı</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-seher" title="Single Select">
                                            <option disabled selected>Bina ev Mənzil</option>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Otaq sayı</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" name="roomCount" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Otaq sayı">
                                            <option value="">Hamısı</option>
                                            @for($i=1;$i<=10;$i++)
                                                <option value="{{ $i }}" {{ $i == $request->get('roomCount',null) ? 'selected':'' }}>{{ $i }}</option>
                                            @endfor
                                                <option value="-1" {{ -1 == $request->get('roomCount',null) ? 'selected':'' }}>10 və daha cox</option>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Yerləşdiyi mər.</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <select class="selectpicker" name="locatedFloor1" data-style="btn btn-hm btn-new-hm btn-new-hm-seher" title="Single Select">
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ $i == $request->get('locatedFloor1',1) ? 'selected':'' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <select class="selectpicker" name="locatedFloor2" data-style="btn btn-hm btn-new-hm btn-new-hm-seher" title="Single Select">
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ $i == $request->get('locatedFloor2',31) ? 'selected':'' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Binanın m/s</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <select class="selectpicker" name="floorCount1" data-style="btn btn-hm btn-new-hm btn-new-hm-seher" title="Single Select">
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ $i == $request->get('floorCount1',1) ? 'selected':'' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <select class="selectpicker" name="floorCount2" data-style="btn btn-hm btn-new-hm btn-new-hm-seher" title="Single Select">
                                                    @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ $i == $request->get('floorCount2',31) ? 'selected':'' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Dəyəri</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <input type="number" name="amount1" value="{{ $request->get('amount1') }}" class="form-control" placeholder="Minimum">
                                            </div>
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <input type="number" name="amount2" value="{{ $request->get('amount2') }}" class="form-control" placeholder="Maksimum">
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row rowHeightH ">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Sahə m<sup>2</sup></h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <input type="text" value="{{ $request->get('area1') }}" name="area1" class="form-control" placeholder="min...">
                                            </div>
                                            <div class="col-md-6 col-6 col-sm-6">
                                                <input type="text" value="{{ $request->get('area2') }}" name="area2" class="form-control" placeholder="max...">
                                            </div>
                                        </div>
                                    </div>
                                  </div>



                                  <div class="row rowHeightH">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                    Təkrar elanları gizlət
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                            </label>

                                            <button class="btn btn-tekrar-modal btn-info btn-round" rel="tooltip" data-placement="top" title="Müxtəlif saytlarda qoyulumuş eyni elanları bir elan şəklində göstərir">
                                              ?
                                            </button>

                                      </div>
                                    </div>
                                  </div>



                                  <!-- <div class="row rowHeightH">
                                    <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                                      <h4 class="title text-right">Elanın Seçimi</h4>
                                    </label>
                                    <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                        <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                            <option disabled selected>Bina ev Mənzil</option>
                                            <option value="2">Foobar</option>
                                            <option value="3">Is great</option>
                                        </select>
                                    </div>
                                  </div> -->
                    </div> <!-- ilk col-6 2ci hisse -->
                </div> <!-- ilk row -->

                <div class="row">
                    <div class="col-md-7 offset-md-5">
                        <button class="btn btn-success" type="submit">
                            <span class="btn-label">
                                <i class="material-icons">check</i>
                            </span>
                            Axtar
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        </form>
    </div>
    <!-- Announcemets -->
    <div class="row">
        @foreach ($announcements as $announcement )
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-header card-header-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" style="height: 200px" src="assets/build/huseynzade/img/card-1.jpeg">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-actions text-center">
                            <button type="button" class="btn btn-default btn-link" onclick="window.location.href='{{ route( ( $announcement->status > 0 ? 'announcement_pro_info' : 'announcement_info' ) ,['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Ətraflı">
                                <i class="material-icons">art_track</i>
                            </button>
                        </div>
                        <h4 class="card-title">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="{{ $announcement->link }}"> {{ $announcement->getAnnouncementType() }}</a> <span style="font-size: 16px; color:red;"> {{ $announcement->type == 'building' ? '(' . $announcement->getAnnouncementType2() . ')':'' }} </span>
                                </div>
                            </div>
                            <div><span class="badge {!! $announcement['owner_type'] == 1 ? 'badge-danger' : 'badge-success' !!}">{!! $announcement['owner_type'] == 1 ? 'Vasitəçi' : 'Mülkiyyətçi' !!}</span> <!-- <label class="label-control">(Sahibkar)</label> --></div>
                        </h4>
                        <br />
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto col-sm-6 text-center">{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</div>
                            <div class="col-md-4 ml-auto mr-auto col-sm-6 text-center"><span style="color:yellowgreen;" class="right">{{ $announcement->site }}</span></div><br />
                        </div>
                    </div>
                    <div class="card-footer">

                        <div class="price">
                            <h4> <img src="assets/build/huseynzade/img/azn.png" style="width: 15px" alt="AZN"> {{ (int)$announcement->amount }} / {{ $announcement->getBuldingType() }}</h4>

                        </div>

                        <div class="stats">
                            <p class="category"><i class="material-icons">place</i> {{ str_limit($announcement->city->name . '') }}, AZ</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection

@section('css')
    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- select2 -->
    {!! Html::style('admin/assets/build/new/Plugins/select2.css') !!}

    {!! Html::style('admin/assets/build/huseynzade/css/application.css?v=1.1') !!}
     

     <style type="text/css">

        .btn-select2-red {
            border-color: red;
            border:1px solid red;
            border-radius: 4px;
            background: #fff;
        }

        .btn-select2-orange {
            border-color: #ff9800;
            border:1px solid #ff9800;
            border-radius: 4px;
            background: #fff;
        }

        .btn-select2-goy {
            border-color: #00bcd4;
            border:1px solid #00bcd4;
            border-radius: 4px;
            background: #fff;
        }

        .btn-select2-badimcan {
            border-color: #9c27b0;
            border:1px solid #9c27b0;
            border-radius: 4px;
            background: #fff;
        }

        .btn-select2-tundgoy {
            border-color: #447df7;
            border:1px solid #447df7;
            border-radius: 4px;
            background: #fff;
        }


        
     </style>

    <!-- <style>
        .links_data .col-new,.links_data .col-old,.links_data .col-obj {
            margin-top: 20px;
            margin-bottom: 10px;
            padding-left: 60px;
            display: inline-block;
            line-height: 30px;
            margin-bottom: 0px;
        }

        .links_data .col-new ul,.links_data .col-old ul,.links_data .col-obj ul {
            list-style-type: none;
            padding-left: 0px;
        }

        .links_data .col-new li,.links_data .col-old li,.links_data .col-obj li {
            padding-left: 0px;
            white-space: nowrap;
            margin-left: -60px;
            padding-left: 60px;
            /* cursor: pointer; */
        }

        .links_data .col-new a,.links_data .col-old a,.links_data .col-obj a {
            color: #2b4a5c;
            font-size: 13px;
        }

        .links_data .col-new li::before,.links_data .col-old li::before,.links_data .col-obj li::before {
            content: "\f111";
            font-size: 6px !important;
            vertical-align: middle;
            padding: 0px 10px 0px 10px;
            color: #428bca;
            font: normal normal normal 14px/1 FontAwesome;
            text-rendering: auto;
            bottom: 1px;
            position: relative;
        }

        .links_data .col-new li:hover,.links_data .col-old li:hover,.links_data .col-obj li:hover,.links_data .col-new li.active,.links_data .col-old li.active,.links_data .col-obj li.active {
            /* background: #fdfaeb; */
            background: #eee;
        }

        #rent.tab-pane .row > .col-new li::before, #rent.tab-pane .row > .col-old li::before, #rent.tab-pane .row > .col-obj li::before {
            color: #f9bb05;
        }
    </style> -->

@endsection

@section('scripts')
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- select2 -->
    <!-- {!! Html::script('admin/assets/build/new/Plugins/select2.min.js') !!} -->

   <!--  <script>
        var dateInput;
        $(function () {

            $(".select2me").select2({
                placeholder: "Hamısı",
                allowClear: true
            });

            $('input.daterange').daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false,
                locale: {
                    format: 'DD-MM-YYYY'
                },
            }, function(start, end, label){
                dateInput.val(start.format('DD-MM-YYYY'));
            });

            $("select[name='type']").change(function(){
                $("select[name='buldingSecondType[]']").parents('.form-group').hide();
                $("input[name='locatedFloor1']").parents('.form-group').show();

                //val
                $("select[name='buldingSecondType[]']").val(null).trigger('change');

                switch ($(this).val()){
                    case 'building':
                        $("select[name='buldingSecondType[]']").parents('.form-group').show();
                        break;
                    case 'land':
                        $("input[name='locatedFloor1']").parents('.form-group').hide();
                        //val
                        $("input[name='locatedFloor1'],input[name='locatedFloor2']").val('');
                        break;
                    case 'garage':
                        $("input[name='locatedFloor1']").parents('.form-group').hide();
                        //val
                        $("input[name='locatedFloor1'],input[name='locatedFloor2']").val('');
                        break;
                }
            });

            @if($request->has('sent'))
                $(".collapse-link").click();
            @endif
        });
    </script> -->
@endsection

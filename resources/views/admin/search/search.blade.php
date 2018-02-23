@extends('admin.masterpage1')

@section('content')

    @include('admin.error')

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <h2>Axtariş</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link" data-toggle="tooltip" data-original-title="Gizlət/Göstər"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="x_content">

                    <form method="get" action="">
                        <input type="hidden" name="sent" value="1">
                        <div class="portlet light">
                            <div class="tabbable tabbable-custom nav-justified">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#search" id="a_search" data-toggle="tab">
                                            Axtarış
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#sell" id="a_sell" data-toggle="tab">
                                            Satılır
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#rent" id="a_rent" data-toggle="tab">
                                            Kirayə
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="padding-top: 15px;">
                                    <div class="tab-pane active" id="search">
                                        <div class="form-horizontal form-body ">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Tipi</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" name="which">
                                                                <option></option>
                                                                <option value="1" {{ $request->get('which') == 1? 'selected':'' }}>Elanlar</option>
                                                                <option value="2" {{ $request->get('which') == 2? 'selected':'' }}>Fərdilər</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Obyektin növü</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" name="type">
                                                                <option></option>
                                                                @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                                                    <option value="{{ $typeK }}" {{ $typeK == $request->get('type')? 'selected':'' }}> {{ $type }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Binanın növü</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" multiple name="buldingSecondType[]">
                                                                @foreach (\App\Library\MyClass::$buldingSecondType as $typeK => $type)
                                                                    <option value="{{ $typeK }}" {{ in_array($typeK, $request->get('buldingSecondType',[])) ? 'selected':'' }}> {{ $type }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Elanın növü</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" multiple name="buldingType[]">
                                                                @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                                                    <option value="{{ $typeK }}" {{ in_array($typeK, $request->get('buldingType',[])) ? 'selected':'' }}> {{ $type }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Şəhər</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" multiple name="city[]">
                                                                @foreach (\App\Models\MskCity::get() as $type)
                                                                    <option value="{{ $type['id'] }}" {{ in_array($type['id'], $request->get('city',[])) ? 'selected':'' }}> {{ $type->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-xs-3  control-label">Tarix</label>
                                                        <div class="col-xs-9 ">
                                                            <div class="input-group" >
                                                                <input type="text" class="form-control daterange" onclick="dateInput = $(this);" name="date1" value="{{ $request->get('date1','') }}" placeholder="Minimum">
                                                                <span class="input-group-addon">-</span>
                                                                <input type="text" class="form-control daterange" onclick="dateInput = $(this);" name="date2" value="{{ $request->get('date2','') }}" placeholder="Maksimum">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-xs-3  control-label">Satıcının tipi</label>
                                                        <div class="col-xs-9 ">
                                                            <select class="form-control select2me" name="ownerType">
                                                                <option></option>
                                                                @foreach (\App\Library\MyClass::$ownerType as $typeK => $type)
                                                                    <option value="{{ $typeK }}" {{ $request->has('ownerType') && $typeK == $request->get('ownerType',"") ? 'selected':'' }}> {{ $type }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-xs-3 control-label">Qiymət</label>
                                                        <div class="col-xs-9">
                                                            <div class="input-group">
                                                                <input type="number" name="amount1" value="{{ $request->get('amount1') }}" class="form-control" placeholder="Minimum">
                                                                <span class="input-group-addon">-</span>
                                                                <input type="number" name="amount2" value="{{ $request->get('amount2') }}" class="form-control" placeholder="Maksimum">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-xs-3 control-label">Mərtəbə</label>
                                                        <div class="col-xs-9">
                                                            <div class="input-group">
                                                                <input type="number" name="locatedFloor1" value="{{ $request->get('locatedFloor1') }}" class="form-control" placeholder="Minimum">
                                                                <span class="input-group-addon">-</span>
                                                                <input type="number" name="locatedFloor2" value="{{ $request->get('locatedFloor2') }}" class="form-control" placeholder="Maksimum">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12">
                                                        <label class="col-xs-3 control-label">Status</label>
                                                        <div class="col-xs-9">
                                                            <select class="form-control select2me" multiple name="status[]">
                                                                @foreach (\App\Library\MyClass::$buttonStatus2 as $typeK => $type)
                                                                    <option value="{{ $typeK }}" {{ in_array($typeK, $request->get('status',[])) ? 'selected':'' }}> {{ $type }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions noborder" id="list">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="anchor"></div>
                                                    <button type="submit" class="btn btn btn-round btn-success" style="margin-top: 30px; width: 75%; height: 65px; font-size: 22px; font-weight: bold; margin-left: 15%;"><i class="fa fa-search"></i> Axtar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane links_data" id="sell">
                                        <div class="row">

                                            <div class="col-xs-4 col-new">
                                                <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=2&locatedFloor1=1&locatedFloor2=1">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=2&locatedFloor1=2&locatedFloor2=2">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=2&locatedFloor1=3&locatedFloor2=3">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=2&locatedFloor1=4&locatedFloor2=4">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=2&locatedFloor1=5">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-old">
                                                <h4 class="text-primary text-nowrap">Köhnə tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=2&locatedFloor1=1&locatedFloor2=1">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=2&locatedFloor1=2&locatedFloor2=2">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=2&locatedFloor1=3&locatedFloor2=3">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=2&locatedFloor1=4&locatedFloor2=4">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=2&locatedFloor1=5">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-obj">
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingType[]=2">Mənzillər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=house&buldingType[]=2">Heyet evi</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=office&buldingType[]=2">Ofislər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=garage&buldingType[]=2">Qarajlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=land&buldingType[]=2">Torpaq</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=object&buldingType[]=2">Obyektlər</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane links_data" id="rent">
                                        <div class="row">
                                            <div class="col-xs-4 col-new">
                                                <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=1&locatedFloor1=1&locatedFloor2=1">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=1&locatedFloor1=2&locatedFloor2=2">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=1&locatedFloor1=3&locatedFloor2=3">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=1&locatedFloor1=4&locatedFloor2=4">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=new&buldingType[]=1&locatedFloor1=5">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-old">
                                                <h4 class="text-primary text-nowrap">Köhnə tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=1&locatedFloor1=1&locatedFloor2=1">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=1&locatedFloor1=2&locatedFloor2=2">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=1&locatedFloor1=3&locatedFloor2=3">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=1&locatedFloor1=4&locatedFloor2=4">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingSecondType[]=old&buldingType[]=1&locatedFloor1=5">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-obj">
                                                <ul>
                                                    <li class="">
                                                        <a href="?sent=1&type=building&buldingType[]=1">Mənzillər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=house&buldingType[]=1">Heyet evi</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=office&buldingType[]=1">Ofislər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=garage&buldingType[]=1">Qarajlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=land&buldingType[]=1">Torpaq</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="?sent=1&type=object&buldingType[]=1">Obyektlər</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="content">
                    <!-- announcements -->
                    <div class="row">
                        @foreach ($announcements as $announcement )
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="offer offer-radius {!! $announcement['owner_type'] == 1 ? 'offer-primary' : '' !!}">
                                    <div class="shape">
                                        <div class="shape-text">
                                            {!! $announcement['owner_type'] == 1 ? 'Vasitəçi' : 'Mülkiyyətçi' !!}
                                        </div>
                                    </div>
                                    <img src="{{ count($announcement->pictures) > 0 ? url(\App\Library\MyClass::ANN_THUMB_PIC_DIR . $announcement->pictures[0]->file_name ) : 'images/logo.jpg' }}">
                                    <h2 class="backColor">{{ $announcement->amount }} <span style="font-size: 17px; font-weight: 200;">AZN</span></h2>
                                    <h2 class="backColor2">{{ $announcement->getBuldingType() }} </h2>
                                    <h2 class="backColor3">{!! $announcement->status > 0 ? '<a class="btn btn-success" style="padding: 2px;">Fərdi əlavə</a>' : '<a class="btn btn-info" style="padding: 2px;">Elan</a>' !!} </h2>
                                    <div class="offer-content">
                                        <h3 class="lead text-center" style="font-size: 16px;margin-bottom: 0px">{{ $announcement->getAnnouncementType() }}</h3>
                                        <div class="row">
                                            <div class="col-sm-12"  style="font-weight: 700; color: red; font-size: 15px;height: 44px">{{ $announcement->city->name }} / {{ $announcement->place }}</div>
                                        </div>
                                        <ul class="text-left" style="padding-left: 15px;">
                                            <li><p style="font-weight: 600;">{{ $announcement->owner }}</p></li>
                                            <li><p style="font-weight: 600;">{{ $announcement->roomCount }} otaq</p></li>
                                            <li><p style="font-weight: 600;">{{ $announcement->area }} m²</p></li>
                                        </ul>
                                        <div class="row">
                                            <p></p>
                                            <div class="col-sm-8 text-left" style="font-size: 14px;"><i class="fa fa-calendar"></i> {{ App\Library\Date::d($announcement->date,'d-m-Y') }}</div>
                                            <div class="col-sm-4 text-right"><a target="_blank" href="{{ $announcement->link }}"> <i class="fa fa-long-arrow-right"></i> </a> <p></p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 text-left" style="font-size: 16px; font-weight: 600; color: green;">#{{ $announcement->id }}</div>
                                            <div class="col-sm-8 text-right" style="color: #dfba49;"><p>{{ $announcement->site }}</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center xetd">
                                                <a target="_blank" href="{{ route( ( $announcement->status > 0 ? 'announcement_pro_info' : 'announcement_info' ) ,['announcement'=>$announcement->id]) }}"> <i class="fa fa-info-circle" data-toggle="tooltip" data-original-title="Ətraflı"></i> </a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- announcements end -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $announcements->appends($request->except('page'))->links('admin.pagination', ['paginator' => $announcements]) }}
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
    <!-- select2 -->
    {!! Html::style('admin/assets/build/new/Plugins/select2.css') !!}

    <style>
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
    </style>

@endsection

@section('scripts')
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- select2 -->
    {!! Html::script('admin/assets/build/new/Plugins/select2.min.js') !!}

    <script>
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
    </script>
@endsection

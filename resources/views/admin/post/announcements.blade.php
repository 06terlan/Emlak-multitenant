@extends('admin.masterpage1')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Elanlar</h2>
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
                                                                    <option value="{{ $typeK }}" {{ $typeK == $request->get('ownerType',-1) ? 'selected':'' }}> {{ $type }} </option>
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
                                    <div class="tab-pane" id="sell">
                                        <div class="row">

                                            <div class="col-xs-4 col-new">
                                                <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="/1-otaqli-yeni-tikili-evler-satilir">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/2-otaqli-yeni-tikili-evler-satilir">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/3-otaqli-yeni-tikili-evler-satilir">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/4-otaqli-yeni-tikili-evler-satilir">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/5-6-7-8-ve-cox-otaqli-yeni-tikili-evler-satilir">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-old">
                                                <h4 class="text-primary text-nowrap">Köhnə tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="/1-otaqli-kohne-tikili-evler-satilir">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/2-otaqli-kohne-tikili-evler-satilir">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/3-otaqli-kohne-tikili-evler-satilir">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/4-otaqli-kohne-tikili-evler-satilir">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/5-6-7-8-ve-cox-otaqli-kohne-tikili-evler-satilir">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-obj">
                                                <ul>
                                                    <li class="">
                                                        <a href="/menziller-satilir">Mənzillər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/evler-villalar-bag-satilir">Evlər/Villalar, Bağlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/ofis-satilir">Ofislər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/qaraj-sat%C4%B1l%C4%B1r">Qarajlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/torpaq-satilir">Torpaq</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/obyekt-satilir">Obyektlər</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="rent">
                                        <div class="row">

                                            <div class="col-xs-4 col-new">
                                                <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="/1-otaqli-kiraye-evler-yeni-tikili">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/2-otaqli-kiraye-evler-yeni-tikili">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/3-otaqli-kiraye-evler-yeni-tikili">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/4-otaqli-kiraye-evler-yeni-tikili">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/5-6-7-8-ve-cox-otaqli-kiraye-evler-yeni-tikili">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-old">
                                                <h4 class="text-primary text-nowrap">Köhnə tikililər</h4>
                                                <ul>
                                                    <li class="">
                                                        <a href="/1-otaqli-kiraye-evler-kohne-tikili">
                                                            1 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/2-otaqli-kiraye-evler-kohne-tikili">
                                                            2 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/3-otaqli-kiraye-evler-kohne-tikili">
                                                            3 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/4-otaqli-kiraye-evler-kohne-tikili">
                                                            4 otaqlı mənzillər
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/5-6-7-8-ve-cox-otaqli-kiraye-evler-kohne-tikili">
                                                            5 otaqlı və daha çox
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-4 col-obj">
                                                <ul>
                                                    <li class="">
                                                        <a href="/kiraye-menziller">Mənzillər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/kiraye-evler-villalar-baglar-bag-evleri">Evlər/Villalar, Bağlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/kiraye-ofis">Ofislər</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/kiraye-qarajlar">Qarajlar</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/kiraye-torpaq">Torpaq</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="/kiraye-obyekler">Obyektlər</a>
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
                <!-- x_conten end -->
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
                                    <img src="images/logo.jpg">
                                    <h2 class="backColor">{{ $announcement->amount }} <span style="font-size: 17px; font-weight: 200;">AZN</span></h2>
                                    <h2 class="backColor2">{{ $announcement->getBuldingType() }} </h2>
                                    <div class="offer-content">
                                         <h3 class="lead text-center" style="font-size: 16px;">{{ $announcement->getAnnouncementType() }}</h3>
                                         <div class="row">
                                             <div class="col-sm-8 text-left"  style="font-weight: 700; color: red; font-size: 16px;">{{ $announcement->city->name }} / {{ $announcement->place }}</div>
                                         </div>
                                        <ul class="text-left">
                                            <li><p style="font-weight: 600;">{{ $announcement->owner }}</p></li>
                                            <li><p style="font-weight: 600;">{{ $announcement->roomCount }} otaq</p></li>
                                            <li><p style="font-weight: 600;">{{ $announcement->area }} m²</p></li>
                                        </ul>
                                        <div class="row">
                                            <p></p>
                                            <div class="col-sm-8 text-left" style="font-size: 14px;"><i class="fa fa-calendar"></i> {{ App\Library\Date::d($announcement->date,'d-m-Y') }}</div>
                                            <div class="col-sm-4 text-right"><a href="{{ $announcement->link }}"> <i class="fa fa-long-arrow-right"></i> </a> <p></p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 text-left" style="font-size: 16px; font-weight: 600; color: green;">#{{ $announcement->id }}</div>
                                            <div class="col-sm-8 text-right" style="color: #dfba49;"><p>{{ $announcement->site }}</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 text-center xetd">
                                                <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}"> <i class="fa fa-edit"></i> </a> </div>
                                            <div class="col-sm-3 text-center">
                                                <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}"> <i class="fa fa-trash"></i> </a> </div>
                                            <div class="col-sm-3 text-center">
                                                <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}" > <i class="fa fa-share-alt"></i> </a> </div>
                                            <div class="col-sm-3 text-center">
                                                <a href=""> <i class="fa fa-thumb-tack"></i> </a> </div>
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
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- select2 -->
    {!! Html::style('admin/assets/build/new/Plugins/select2.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
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

            @if($request->has('sent'))
                $(".collapse-link").click();
            @endif
        });
    </script>
@endsection

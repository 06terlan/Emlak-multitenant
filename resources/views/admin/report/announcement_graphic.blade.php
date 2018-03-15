@extends('admin.masterpage')



@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>F.Elanlar kateqoria qrafiki hesabat</h2>

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
                                        <input type="text" class="form-control daterange" name="date1" value="{{ $request->get('date1',date("01-m-Y")) }}" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="text" class="form-control daterange" name="date2" value="{{ $request->get('date2',date("d-m-Y")) }}" placeholder="Maksimum">
                                    </div>
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
                                        @foreach (\App\Library\MyClass::$metros as $key => $type)
                                            <option value="{{ $key }}" {{ $key == $request->get('metro')? 'selected':'' }}> {{ $type[0] }} </option>
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
                            </div>


                            <button type="submit" onclick="$('[name=page]').val(1);" class="btn btn btn-round btn-success" style="margin-top: 30px; width: 75%; height: 65px; font-size: 22px; font-weight: bold; margin-left: 15%;"><i class="fa fa-search"></i> Bazada Axtar</button>

                        </form>

                    </div>
                </div>

                <!-- end x-content -->

                <div class="content">

                    <div class="row">

                        <div class="col-md-12 text-center">

                            <div id="chart_line" style="height:400px"></div>

                        </div>

                        <div class="col-md-12 text-center">
                            <div class="col-md-6 text-center">
                                <div id="chart_bar" style="height:400px"></div>
                            </div>

                            <div class="col-md-6 text-center">
                                <div id="chart_bar2" style="height:400px"></div>
                            </div>
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
@endsection



@section('scripts')

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/echarts-2.2.7/build/echarts.js') !!}

    <script>
        $(function () {

            // date category
            var myChart = echarts.init(document.getElementById('chart_line'));
            var option = {
                title: {
                    text: 'Elanlar'
                },
                tooltip : {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        label: {
                            backgroundColor: '#6a7985'
                        }
                    }
                },
                legend: {
                    data: {!! json_encode(array_values(\App\Library\MyClass::$announcementTypes)) !!}
                },
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : {!! json_encode(\App\Library\Date::range($date1, $date2, 'd-m-Y')) !!}
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [@foreach(\App\Library\MyClass::$announcementTypes as $typeName)
                    @if( isset($graphLine[$typeName]) )
                {
                    name: '{{ $typeName }}',
                    type:'line',
                    areaStyle: {normal: {}},
                    data: {{ json_encode(array_values($graphLine[$typeName])) }}
                },
                    @endif
                    @endforeach
                ]
            };
            myChart.setOption(option);

            var chart_bar = echarts.init(document.getElementById('chart_bar'));
            var option = {
                title : {
                    text: 'Elanlar',
                    subtext: 'Say',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    type: 'scroll',
                    orient: 'vertical',
                    right: 10,
                    top: 20,
                    bottom: 20,
                    data: {!! json_encode(array_keys($dataChartBar)) !!},
                    //selected: data.selected
                },
                series : [
                    {
                        name: 'Kateqoria',
                        type: 'pie',
                        radius : '55%',
                        center: ['40%', '50%'],
                        data: {!! json_encode(array_values($dataChartBar)) !!},
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            chart_bar.setOption(option);

            var chart_bar2 = echarts.init(document.getElementById('chart_bar2'));
            var option = {
                title : {
                    text: 'Elanlar',
                    subtext: 'Say',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    type: 'scroll',
                    orient: 'vertical',
                    right: 10,
                    top: 20,
                    bottom: 20,
                    data: {!! json_encode(array_keys($dataChartBar2)) !!},
                    //selected: data.selected
                },
                series : [
                    {
                        name: 'Tipi',
                        type: 'pie',
                        radius : '55%',
                        center: ['40%', '50%'],
                        data: {!! json_encode(array_values($dataChartBar2)) !!},
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            chart_bar2.setOption(option);

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
    </script>
@endsection

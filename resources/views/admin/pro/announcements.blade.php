@extends('admin.masterpage_huseynzade')

@section('content')

    @include('admin.error')


    @if( \App\Library\MyHelper::has_priv("announcement_pro", \App\Library\MyClass::PRIV_CAN_ADD) )
        <a href="{{ route('announcement_insert',['announcement' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>
    @endif


    <h3>Fərdi Elanlar</h3> 
                    <!-- Elan secimi --> 
                    <div class="row" id="multi_button">
                        <div class="col-md-12">

                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" class="js-switch" id="multimpe_check">
                                      <span class="toggle"></span>
                                                  Çoxlu seçim
                                </label>
                                <a style="margin-top: 3px;display: none" class="btn btn-danger btn-link" href="javascript:multiDeletBtn()"><i class="material-icons">close</i></a>
                            </div>
                        </div>
                    </div>
<br>
<div class="row">    
@foreach ($announcements as $announcement )
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#pablo">
                    <img class="img" src="{{ count($announcement->pictures) > 0 ? asset(\App\Library\MyClass::ANN_THUMB_PIC_DIR . $announcement->pictures[0]->file_name ) : asset('admin/assets/build/huseynzade/img/card-1.jpeg') }}">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Bərpa Et!
                    </button>
                    <button type="button" class="btn btn-default btn-link" onclick="window.location.href='{{ route('announcement_pro_info',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Ətraflı">
                        <i class="material-icons">art_track</i>
                    </button>
                    <button type="button" class="btn btn-success btn-link" onclick="window.location.href='{{ route('announcement_insert',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Düzəliş Et">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" onclick="window.location.href='{{ route('announcement_pro_delete',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Sil Getsin">
                        <i class="material-icons">close</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" onclick="window.location.href='{{ route('announcement_pro_status',['announcement'=>$announcement->id]) }}'" rel="tooltip" data-original-title="{{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}">
                        <i class="material-icons" style="color: blue">check</i>
                    </button>
                </div>
                <h4 class="card-title">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-md-2">
                            <div class="form-check mr-auto">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                      <span class="check"></span>
                                  </span>
                              </label>
                            </div>
                        </div> -->
                       <!--  <div class="col-md-8"> -->
                        <div class="row">
                            <!-- <div class="col-md-2">
                                <div class="form-check" style="margin-top: -10px;">
                                    <label class="form-check-label check_div">
                                        <input class="form-check-input" type="checkbox" ann_id="{{ $announcement->id }}">
                                        <span class="form-check-sign">
                                              <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div> -->
                            <div class="col-md-12 text-center">
                                <a href="{{ $announcement->link }}"> {{ $announcement->getAnnouncementType() }}</a> <span style="font-size: 16px; color:red;">(Yeni Tikili)</span>
                            </div>
                        </div>
                           <!--  <a href="#pablo"> {{ $announcement->getAnnouncementType() }}</a> <span style="font-size: 16px; color:red;">(Yeni Tikili)</span> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <div><span class="badge {!! $announcement['owner_type'] == 1 ? 'badge-danger' : 'badge-success' !!}">{!! $announcement['owner_type'] == 1 ? 'Vasitəçi' : 'Mülkiyyətçi' !!}</span> <!-- <label class="label-control">(Sahibkar)</label> --></div>
                </h4>
                <br />
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto col-sm-6 text-center">{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</div>
                        <div class="col-md-4 ml-auto mr-auto col-sm-6 text-center"><span class="right">{!! $announcement->getStatus() !!}</span></div><br />
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
    <div></div>
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            
                            {{ $announcements->appends($request->except('page'))->links('admin.pagination', ['paginator' => $announcements]) }}
                            
                        </div>
                    </div>

</div>


@endsection



@section('css')

    {{--  jquery-confirm --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}

    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- select2 -->
    {!! Html::style('admin/assets/build/new/Plugins/select2.css') !!}
    <!-- Switchery -->
    {!! Html::style('admin/assets/vendors/switchery/switchery.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}

   <!--  <style>
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
    {{--  jquery-confirm --}}
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}

    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- select2 -->
    {!! Html::script('admin/assets/build/new/Plugins/select2.min.js') !!}
    <!-- Switchery -->
    {!! Html::script('admin/assets/vendors/switchery/switchery.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

    <script>
        function multiDeletBtn() {
            let hrefD = "{{ route('announcement_pro_delete',['announcement'=> 0]) }}?multi=true";

            let ids = [];
            $(".offer .check_div .flat:checked").each(function (n) {
                ids.push($(this).attr('ann_id'));
            });

            $.confirm({
                title: 'Təsdiq',
                content: 'Silmək istədiyinizə əminsizin?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    "Sil": function () {
                        window.location.href = hrefD + "&ids=" + JSON.stringify(ids);
                    },
                    "İmtina": function () {

                    },
                }
            });
        }

        var dateInput;
        $(function () {

            $("#multimpe_check").change(function () {
                if($(this).is(":checked"))
                {
                    $("#multi_button a.btn").show();
                    $(".offer .check_div").show();
                }
                else{
                    $("#multi_button a.btn").hide();
                    $(".offer .check_div").hide();
                }
            });

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
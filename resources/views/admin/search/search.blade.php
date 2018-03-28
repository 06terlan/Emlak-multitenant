@extends('admin.masterpage_huseynzade')

@section('content')

    @include('admin.error')
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

     
    


    <div class="col-md-12">
        

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
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                        </div>

                        <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Obyektin növü</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px" >
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-orange" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Binanın növü</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-red" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Elanın növü</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-goy" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Şəhər</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                
                                        <select class="selectpicker form-group-hm btn-select2-red" data-live-search="true" title="Select the product" name="">
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
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Rayon</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker form-group-hm btn-select2-goy" data-live-search="true" title="Select the product" name="">
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
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Metro</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker form-group-hm btn-select2-orange" data-live-search="true" title="Select the product" name="">
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
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Qəsəbə</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker form-group-hm btn-select2-badimcan" data-live-search="true" title="Select the product" name="">
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
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Nişangah</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker form-group-hm btn-select2-tundgoy" data-live-search="true" title="Select the product" name="">
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
                          </div>
            </div> <!-- ilk col-6 1ci hisse -->

            <div class="col-md-6">

                        <div class="row">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Satıcının tipi</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-tundgoy" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
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
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Otaq sayı</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                    <option disabled selected>Binanın təmiri</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Yerləşdiyi mər.</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Binanın m/s</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Dəyəri</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <select class="selectpicker" data-size="7" data-style="btn btn-hm btn-new-hm btn-new-hm-badimcan" title="Single Select">
                                    <option disabled selected>Bina ev Mənzil</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                          </div>

                          <div class="row rowHeightH ">
                            <label class="col-lg-4 col-md-4 col-sm-2 control-label text-info">
                              <h4 class="title text-right">Sahə</h4>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-3" style="margin-top: 10px">
                                <div class="row">
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <input type="text" value="" class="form-control" placeholder="min...">
                                    </div>
                                    <div class="col-md-6 col-6 col-sm-6">
                                        <input type="text" value="" class="form-control" placeholder="max...">
                                    </div>
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

    </div>
</div></div>



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

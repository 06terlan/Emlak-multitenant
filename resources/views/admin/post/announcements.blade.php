@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

        <h3>Gələn Elanlar</h3> 
                    <!-- Elan secimi -->
                    <div class="row" id="multi_button">
                        <div class="col-md-12">

                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" id="multimpe_check">
                                      <span class="toggle"></span>
                                                  Çoxlu seçim
                                </label>
                                <a style="margin-top: 3px;display: none" class="btn btn-danger btn-link" onclick=demo.showSwal('input-field')><i class="material-icons">close</i></a>
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
                        <img class="img" style="height: 200px" src="{{ $announcement->pictures != null && isset($announcement->pictures[0]) ? asset(\App\Library\MyClass::ANN_PIC_DIR . $announcement->pictures[0]->file_name) : asset('admin/assets/build/huseynzade/img/card-1.jpeg') }}">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                            <i class="material-icons">build</i> Bərpa Et!
                        </button>
                        <button type="button" class="btn btn-default btn-link" onclick="window.location.href='{{ route('announcement_info',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Ətraflı">
                            <i class="material-icons">art_track</i>
                        </button>
                        <button type="button" class="btn btn-success btn-link" onclick="window.location.href='{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="FE. Əlavə Et">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" class="btn btn-danger btn-link" onclick="window.location.href='{{ route('announcement_delete',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Sil Getsin">
                            <i class="material-icons">close</i>
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
                    <div class="form-check" style="margin-top: -15px">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" ann_id="{{ $announcement->id }}">
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                        </label>
                    </div>
                    <div class="stats">
                        <p class="category"><i class="material-icons">place</i> {{ $announcement->city() }}, AZ</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-3 ml-auto mr-auto"></div>
        <div class="col-md-1 ml-auto mr-auto">
            <div class="">
                {{ $announcements->appends($request->except('page'))->links('admin.pagination', ['paginator' => $announcements]) }}
            </div>

        </div>
    </div>
              

    @endsection

@section('scripts')
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
            let hrefD = "{{ route('announcement_delete',['announcement'=> 0]) }}?multi=true";

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

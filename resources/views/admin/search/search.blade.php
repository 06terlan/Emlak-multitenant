@extends('admin.masterpage1')



@section('content')
    @include('admin.error')

   

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Elanlar</h2>

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
                                <label class="control-label col-md-2">Elanlar</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="announcement">
                                        <option value="1" {{ $request->get('announcement', 1) == 1 ? 'selected' : '' }}>Fərdi əlavə</option>
                                        <option value="2" {{ $request->get('announcement', 1) == 2 ? 'selected' : '' }}>Saytlardan elanlar</option>
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Tarix</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input style="display: inline-block;width: 90%;" type="text" name="date" value="{{ $request->get('date', '') }}" class="form-control daterange"/>
                                        <div style="display: inline-block;padding-top: 5px;" data-toggle="tooltip" data-original-title="Tarixi nəzərə al">
                                            <input type="checkbox" name="dateChk" {{ $request->get('dateChk') ? 'checked' : '' }} class="flat" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Kategoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('type')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Agent (user)</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="user">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\User::realUsers()->get() as $type)
                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get('user')? 'selected':'' }}> {{ $type->fullname() }} </option>
                                        @endforeach
                                    </select>
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
                                    <input type="text" name="metro" data-validate-length-range="0,20" value="{{ $request->get('metro') }}" class="form-control"/>
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

                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="status">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$buttonStatus2 as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('status')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Çeşidləmə</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="sort" required="">
                                        <option value="1" {{ $request->get('announcement', 1) == 1 ? 'selected' : '' }}>Tarixə görə - yuxarıdan</option>
                                        <option value="2" {{ $request->get('announcement', 1) == 2 ? 'selected' : '' }}>Tarixə görə - aşagıdan</option>
                                        <option value="3" {{ $request->get('announcement', 1) == 3 ? 'selected' : '' }}>Dəyərə görə - yuxarıdan</option>
                                        <option value="4" {{ $request->get('announcement', 1) == 4 ? 'selected' : '' }}>Dəyərə görə - aşagıdan</option>
                                        <!--<option value="5">Sahəyə görə - yuxarıdan</option>-->
                                        <!--<option value="6">Sahəyə görə - aşagıdan</option>-->
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Content</label>
                                <div class="col-md-4">
                                    <textarea class="resizable_textarea form-control" placeholder="Content" name="content" style="border-radius: 5px; height: 200px;">{{ $request->get('content') }}</textarea>
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

                            <form class="">
                                <table class="table table-striped">

                                    <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Başlıq</th>

                                        <th>Content</th>

                                        <th>Kategoria</th>

                                        <th>Elanın Tipi</th>

                                        <th>Qiymət</th>

                                        <th>Tarix</th>

                                        <th>Sahibkar</th>

                                        <th>Əməliyyatlar</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach ($announcements as $announcement )

                                        <!-- <tr style="{{ $announcement->buldingType==2?'background-color:#9fd4ef':'background-color:red' }}"> -->

                                        <tr>

                                            <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }}</td>

                                            <td>{{ $announcement->header }}</td>

                                            <td>{{ $announcement->getShortContent() }}</td>

                                            <td>{{ $announcement->getAnnouncementType() }}</td>

                                            <td>{{ $announcement->getBuldingType() }}</td>

                                            <td>{{ $announcement->amount }}</td>

                                            <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>

                                            <td>{{ $announcement->owner }}</td>

                                            <th>
                                                <a style="width: 24px;" href="{{ $request->get('announcement', 1) == 1 ? route('announcement_pro_info',['announcement'=>$announcement->id]) : route('announcement_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
                                            </th>

                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>

                            </form>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 text-center">

                            {{ $announcements->links('admin.pagination', ['paginator' => $announcements]) }}

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
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection



@section('scripts')

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

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
    </script>
@endsection

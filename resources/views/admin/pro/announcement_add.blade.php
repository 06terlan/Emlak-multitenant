@extends('admin.masterpage')



@section('content')

    @include('admin.error')



    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <h2>Elan</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="x_content">

                    <br>

                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('announcement_insert_act',['announcement' => $id]) }}">

                        <input type="hidden" value="{{ isset($from) ? $from : 0 }}" name="from" />

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Header

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input required="" name="header" data-validate-length-range="5,200" type="text" class="form-control" placeholder="Header" value="{{ $announcement['header'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategoria

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="type" required="">

                                    @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Elanın Tipi

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="buldingType" required="">

                                    @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['buldingType']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dəyəri

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input required="" type="number" data-validate-minmax="1," name="amount" type="text" class="form-control" placeholder="Dəyəri" value="{{ $announcement['amount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sahə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1," name="area" type="text" class="form-control" placeholder="Sahə" value="{{ $announcement['area'] }}">

                            </div>

                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Metro

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input name="metro" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Metro" value="{{ $announcement['metro'] }}">

                            </div>

                        </div>





                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Şəhər

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input name="city" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Şəhər" value="{{ $announcement['city'] }}">

                            </div>

                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Otaqların sayı

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,255" name="roomCount" type="text" class="form-control" placeholder="Otaqların sayı" value="{{ $announcement['roomCount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Yerləşdiyi mərtəbə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,30000" name="locatedFloor" type="text" class="form-control" placeholder="Yerləşdiyi mərtəbə" value="{{ $announcement['locatedFloor'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mərtəbə sayı

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" data-validate-minmax="1,30000" name="floorCount" type="text" class="form-control" placeholder="Mərtəbə sayı" value="{{ $announcement['floorCount'] }}">

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sənədin tipi

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="documentType" required="">

                                    @foreach (\App\Library\MyClass::$documentTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Təmiri

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="repairing" required="">

                                    @foreach (\App\Library\MyClass::$repairingTypes as $typeK => $type)

                                        <option value="{{ $typeK }}" {{ $typeK == $announcement['type']? 'selected':'' }}> {{ $type }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>






                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sahibkar

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input name="owner" data-validate-length-range="1,40" type="text" class="form-control" placeholder="Sahibkar" value="{{ $announcement['owner'] }}">

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nömrə

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12" id="allNubers">
                                @if($announcement['numbers'] != null)
                                    @foreach ($announcement['numbers'] as $typeK => $num)
                                        <div class="numb">
                                            <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="'mask' : '(999) 999-9999'" name="mobnom[]" type="text" class="form-control" value="{{ $num['number'] }}" placeholder="Nömrə">
                                            <button type="button" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="fa fa-trash"></i></button>
                                        </div>
                                    @endforeach
                                @else
                                        <div class="numb">
                                            <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="'mask' : '(999) 999-9999'" name="mobnom[]" type="text" class="form-control" value="" placeholder="Nömrə">
                                            <button type="button" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents('.numb:eq(0)').remove()"><i class="fa fa-trash"></i></button>
                                        </div>
                                @endif
                                <button type="button" class="btn btn-success addNumber">+ Add</button>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">

                            </div>
                        </div>




                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content

                            </label>

                            <div class="col-md-9 col-sm-6 col-xs-12">

                                <textarea id="descr" style="width:100%;height:251px;" name="content">{{ strip_tags($announcement['content']) }}</textarea>

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Agent (user)

                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control" name="user" required="">

                                    @foreach ( \App\User::realUsers()->get() as $user)

                                        <option value="{{ $user['id'] }}" {{ $user['id'] == $announcement['userId']? 'selected':'' }}> {{ $user->fullname() }} </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>



                        <div class="ln_solid"></div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">

                                <button type="submit" class="btn btn-success">Save</button>

                                <a class="btn btn-default" href="{{ url()->previous() }}" type="reset"><i class="fa fa-arrow-circle-left"></i> Cancel</a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection



@section('css')

    {{--  bootstrap-wysiwyg --}}
    <style>
        .numb{
            width: 190px;
        }
    </style>
@endsection



@section('scripts')
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <script type="text/javascript">
        $(".addNumber").click(function(){
            $(this).before('<div class="numb"> <input style="width: 80%;display: inline-block;" required="" type="text" data-inputmask="\'mask\' : \'(999) 999-9999\'" name="mobnom[]" type="text" class="form-control" placeholder="Nömrə"> <button type="submit" class="btn btn-danger btn-xs deleteAction" onclick="$(this).parents(\'.numb:eq(0)\').remove()"><i class="fa fa-trash"></i></button> </div>');
            $("#allNubers .numb:last input").inputmask("mask", {"mask": "(999) 999-9999"});
        });
    </script>
@endsection
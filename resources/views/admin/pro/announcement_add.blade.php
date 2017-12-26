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
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('announcement_insert',['$announcement' => $id]) }}">
                        <input type="hidden" name="id" value="{{ $id }}" /> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Header
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" name="header" data-validate-length-range="5,200" type="text" class="form-control" placeholder="Header" value="{{ $announcement['header'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipi
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
                                <input required="" type="number" data-validate-minmax="1,255" name="area" type="text" class="form-control" placeholder="Sahə" value="{{ $announcement['area'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Otaqların sayı
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" type="number" data-validate-minmax="1,255" name="roomCount" type="text" class="form-control" placeholder="Otaqların sayı" value="{{ $announcement['roomCount'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Yerləşdiyi mərtəbə
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" type="number" data-validate-minmax="1,30000" name="locatedFloor" type="text" class="form-control" placeholder="Yerləşdiyi mərtəbə" value="{{ $announcement['locatedFloor'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mərtəbə sayı
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" type="number" data-validate-minmax="1,30000" name="floorCount" type="text" class="form-control" placeholder="Mərtəbə sayı" value="{{ $announcement['floorCount'] }}">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content
                            </label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <textarea id="descr" style="display:none;" name="content">{{ $announcement['content'] }}</textarea>
                            </div>
                        </div>
                        </div>
                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-default" href="{{ route('announcement_pro') }}" type="reset">Cancel</a>
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
    {!! Html::style('admin/assets/vendors/summernote/dist/summernote.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    
    {{--  bootstrap-wysiwyg --}}
    {!! Html::script('admin/assets/vendors/summernote/dist/summernote.js') !!}

   <script type="text/javascript">
       $('#descr').summernote({height: 300});
   </script>
@endsection
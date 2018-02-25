@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Şirkət növü</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_type_add_edit', ['type' => $id]) }}">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tip adı
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" name="type_name" data-validate-length-range="1,30" type="text" class="form-control" placeholder="Tip adı" value="{{ $type['name'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İstifadəçi sayı
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" name="user_count" data-validate-minmax="1,100" type="number" class="form-control" placeholder="İstifadəçi sayı" value="{{ $type['user_count'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modullar</label>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                @foreach (\App\Library\MyClass::$modules as $typeK => $typeD)
                                    @if( isset($typeD['child']) )
                                        <div class="col-md-12">
                                            <label class="col-md-7"><i class="{{ $typeD['icon'] }}"></i> {{ $typeD['name'] }}:</label>
                                            @foreach ($typeD['child'] as $K => $t)
                                                <div class="col-md-12" style="padding-left: 50px">
                                                    <label class="col-md-5">{{ $t['name'] }}:</label>
                                                    <div class="col-md-7">
                                                        Görmür <input type="radio" class="flat" name="available_modules[{{ $t['route'] }}]" id="{{ $t['route'] }}" value="1" {{ $id >0 && $type->getModulePriv($t['route']) == 1 ? 'checked' : '' }} />
                                                        &nbsp;&nbsp;&nbsp;&nbsp; Görür <input type="radio" class="flat" name="available_modules[{{ $t['route'] }}]" id="{{ $t['route'] }}" value="2" {{ $id >0 && $type->getModulePriv($t['route']) == 2 ? 'checked' : '' }} />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <label class="col-md-5"><i class="{{ $typeD['icon'] }}"></i> {{ $typeD['name'] }}:</label>
                                            <div class="col-md-7">
                                                Görmür <input type="radio" class="flat" name="available_modules[{{ $typeD['route'] }}]" id="{{ $typeD['route'] }}" value="1" {{ $id >0 && $type->getModulePriv($typeD['route']) == 1 ? 'checked' : '' }} />
                                                &nbsp;&nbsp;&nbsp;&nbsp; Görür <input type="radio" class="flat" name="available_modules[{{ $typeD['route'] }}]" id="{{ $typeD['route'] }}" value="2" {{ $id >0 && $type->getModulePriv($typeD['route']) == 2 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-default" href="{{ redirect()->back()->getTargetUrl() }}" type="reset">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection

@section('scripts')
    <!-- validator -->
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}
@endsection

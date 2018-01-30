@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Makler</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_group_add_edit', ['group' => $id]) }}">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Group Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Group Name" value="{{ $group['group_name'] }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Görəcəyi kategorialar</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                    <input type="checkbox" name="available_types[]" value="{{ $typeK }}" {{ $id > 0 && in_array($typeK,json_decode($group->available_types)) ? 'checked' : '' }} class="flat" /> {{ $type }} <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Görəcəyi elanın tipləri</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                    <input type="checkbox" name="available_building_types[]" value="{{ $typeK }}" {{ $id > 0 && in_array($typeK,json_decode($group->available_building_types)) ? 'checked' : '' }} class="flat" /> {{ $type }} <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modullar</label>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                @foreach (\App\Library\MyClass::$modules as $typeK => $type)
                                    @if( isset($type['child']) )
                                        <div class="col-md-12">
                                            <label class="col-md-7"><i class="{{ $type['icon'] }}"></i> {{ $typeK }}:</label>
                                            @foreach ($type['child'] as $K => $t)
                                                @if( $t['priv'] > 3 && ($id == 0 || $group->super_admin != 1) ) @continue; @endif
                                                <div class="col-md-12" style="padding-left: 50px">
                                                    <label class="col-md-5">{{ $t['name'] }}:</label>
                                                    <div class="col-md-7">
                                                        Görmür <input type="radio" class="flat" name="available_modules[{{ $t['route'] }}]" id="{{ $t['route'] }}" value="1" {{ $id >0 && $group->getModulePriv($t['route']) == 1 ? 'checked' : '' }} />
                                                        &nbsp;&nbsp;&nbsp;&nbsp; Görür <input type="radio" class="flat" name="available_modules[{{ $t['route'] }}]" id="{{ $t['route'] }}" value="2" {{ $id >0 && $group->getModulePriv($t['route']) == 2 ? 'checked' : '' }} />
                                                        &nbsp;&nbsp;&nbsp;&nbsp; Əlavə edir <input type="radio" class="flat" name="available_modules[{{ $t['route'] }}]" id="{{ $t['route'] }}" value="3" {{ $id >0 && $group->getModulePriv($t['route']) == 3 ? 'checked' : '' }} />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        @if( $type['priv'] > 3 && ($id == 0 || $group->super_admin != 1) ) @continue; @endif
                                        <div class="col-md-12">
                                            <label class="col-md-5"><i class="{{ $type['icon'] }}"></i> {{ $type['name'] }}:</label>
                                            <div class="col-md-7">
                                                Görmür <input type="radio" class="flat" name="available_modules[{{ $type['route'] }}]" id="{{ $type['route'] }}" value="1" {{ $id >0 && $group->getModulePriv($type['route']) == 1 ? 'checked' : '' }} />
                                                &nbsp;&nbsp;&nbsp;&nbsp; Görür <input type="radio" class="flat" name="available_modules[{{ $type['route'] }}]" id="{{ $type['route'] }}" value="2" {{ $id >0 && $group->getModulePriv($type['route']) == 2 ? 'checked' : '' }} />
                                                &nbsp;&nbsp;&nbsp;&nbsp; Əlavə edir <input type="radio" class="flat" name="available_modules[{{ $type['route'] }}]" id="{{ $type['route'] }}" value="3" {{ $id >0 && $group->getModulePriv($type['route']) == 3 ? 'checked' : '' }} />
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

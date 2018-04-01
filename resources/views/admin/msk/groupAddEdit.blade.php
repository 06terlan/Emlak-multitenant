@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Agent Grup</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_group_add_edit', ['group' => $id]) }}">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Grupun adı</label>

                                        <div class="col-sm-10 col-md-8 mr-auto ml-auto">
                                            <div class="form-group bmd-form-group is-filled has-success">

                                                <input required="" name="group_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Grupun adı" value="{{ $group['group_name'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <!-- kategorialar -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Görəcəyi kategorialar</label>

                                        <div class="col-sm-10 col-md-8 mr-auto ml-auto">
                                            <div class="form-group">
                                                @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="available_types[]" type="checkbox" value="{{ $typeK }}" {{ $id > 0 && in_array($typeK,json_decode($group->available_types)) ? 'checked' : '' }}>
                                                            {{ $type }}
                                                            <span class="form-check-sign"><span class="check"></span></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- kategorialar son -->

                                    <!-- Elan tipi -->
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Görəcəyi Elanın tipi</label>

                                        <div class="col-sm-10 col-md-8 mr-auto ml-auto">
                                            <div class="form-group">
                                                @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="available_building_types[]" type="checkbox" value="{{ $typeK }}" {{ $id > 0 && in_array($typeK,json_decode($group->available_building_types)) ? 'checked' : '' }}>
                                                            {{ $type }}
                                                            <span class="form-check-sign"><span class="check"></span></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Elan tipi son -->

                                    <!-- Modullar -->
                                    <div class="row modules">
                                        <label for="middle-name" class="col-sm-2 col-form-label text-right">Modullar</label>
                                        <div class="col-sm-10 col-md-8 mr-auto ml-auto" style="margin-top: 20px">
                                            @foreach (\App\Library\MyClass::$modules as $typeK => $type)
                                                @if( isset($type['child']) )
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label class="col-md-5"><i class="{{ $type['icon'] }}"></i> {{ $type['name'] }}:</label>
                                                            @foreach ($type['child'] as $K => $t)
                                                                <div class="col-md-12" style="padding-left: 50px">
                                                                    <div class="row">
                                                                        <label class="col-md-5"><i class="{{ $t['icon'] }}"></i> {{ $t['name'] }}:</label>
                                                                        <div class="col-md-7">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label" style="margin-left: -20px; color: red">
                                                                                    Görmür <input class="form-check-input" type="radio" id="mod_{{ $t['route'] }}" name="available_modules[{{ $t['route'] }}]" value="1" {{ $id >0 && $group->getModulePriv($t['route']) == 1 ? 'checked' : '' }}>
                                                                                    <span class="circle"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <div class="form-check">
                                                                                <label class="form-check-label" style="color: green">
                                                                                    Görür <input class="form-check-input" type="radio" id="mod_{{ $t['route'] }}" name="available_modules[{{ $t['route'] }}]" value="2" {{ $id >0 && $group->getModulePriv($t['route']) == 2 ? 'checked' : '' }}>
                                                                                    <span class="circle"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <div class="form-check">
                                                                                <label class="form-check-label" style="color: #1c01ff">
                                                                                    Əlavə edir <input class="form-check-input" type="radio" id="mod_{{ $t['route'] }}" name="available_modules[{{ $t['route'] }}]" value="3" {{ $id >0 && $group->getModulePriv($t['route']) == 3 ? 'checked' : '' }}>
                                                                                    <span class="circle"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    @if( $type['priv'] > 3 && ($id == 0 || $group->super_admin != 1) ) @continue; @endif
                                                    @if( $id > 0 && ( !isset($group->tenant->msk_type->getAvailableModules()[$type['route']]) || $group->tenant->msk_type->getAvailableModules()[$type['route']] < 2 ) ) @continue; @endif
                                                    @if( $id == 0 && Auth::user()->group->tenant->msk_type->getAvailableModules()[$type['route']] < 2 ) @continue; @endif
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label class="col-md-5"><i class="{{ $type['icon'] }}"></i> {{ $type['name'] }}:</label>
                                                            <div class="col-md-7">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" style="color: red">
                                                                        Görmür <input class="form-check-input" type="radio" id="mod_{{ $type['route'] }}" name="available_modules[{{ $type['route'] }}]" value="1" {{ $id >0 && $group->getModulePriv($type['route']) == 1 ? 'checked' : '' }}>
                                                                        <span class="circle"><span class="check"></span></span>
                                                                    </label>
                                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <div class="form-check">
                                                                    <label class="form-check-label" style="color: green">
                                                                        Görür <input class="form-check-input" type="radio" id="mod_{{ $type['route'] }}" name="available_modules[{{ $type['route'] }}]" value="2" {{ $id >0 && $group->getModulePriv($type['route']) == 2 ? 'checked' : '' }}>
                                                                        <span class="circle"><span class="check"></span></span>
                                                                    </label>
                                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <div class="form-check">
                                                                    <label class="form-check-label" style="color: #1c01ff">
                                                                        Əlavə edir <input class="form-check-input" type="radio" id="mod_{{ $type['route'] }}" name="available_modules[{{ $type['route'] }}]" value="3" {{ $id >0 && $group->getModulePriv($type['route']) == 3 ? 'checked' : '' }}>
                                                                        <span class="circle"><span class="check"></span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Modullar son -->

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Şirkət növü</label>

                                        <div class="col-sm-10 col-md-8 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="tenant" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan">
                                                    
                                                        @foreach (\App\Models\Tenant::realTenants()->get() as $type)
                                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $group['tenant_id']? 'selected':'' }}> {{ $type['company_name'] }} </option>
                                                        @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-2 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="submit">Saxla<div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-sm-5 col-md-6 mr-auto ml-auto">
                                            <button class="btn btn-danger" onclick="window.location.href='{{ redirect()->back()->getTargetUrl() }}'" type="reset">Geriyə<div class="ripple-container"></div></button>
                                        </div>

                                    </div>

                            </form> 
        
        </div>
  
    </div>

</div>
    
@endsection

@section('css')
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
    <style>
        .modules .form-check{
            display: inline-block;
            margin-top: 0 !important;
        }
    </style>
@endsection

@section('scripts')
    <!-- validator -->
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}
@endsection

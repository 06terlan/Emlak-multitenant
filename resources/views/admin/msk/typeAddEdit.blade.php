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
        
        
                            <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_type_add_edit', ['type' => $id]) }}">

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Şirkətin Tipi</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group has-success">

                                                <input required="" name="type_name" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Şirkətin Tipi" value="{{ $type['name'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Dəyəri</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group has-success">

                                                <input required="" name="amount" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Dəyəri" value="{{ $type['amount'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">İstifadəçi sayı</label>
                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group has-success">

                                                <input required="" name="user_count" data-validate-length-range="1,20" type="text" class="form-control" placeholder="Grupun adı" value="{{ $type['user_count'] }}">

                                            </div>
                                        </div>
                                    </div>

                                <!-- Modullar -->
                                <div class="row">
                                    <label for="middle-name" class="col-sm-2 col-form-label text-right">Modullar</label>
                                    <div class="col-sm-10 col-md-6 mr-auto ml-auto" style="margin-top: 20px">
                                        @foreach (\App\Library\MyClass::$modules as $typeK => $typeD)
                                            @if( isset($typeD['child']) )
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label class="col-md-5"><i class="{{ $typeD['icon'] }}"></i> {{ $typeD['name'] }}:</label>
                                                        @foreach ($typeD['child'] as $K => $t)
                                                            <div class="col-md-12" style="padding-left: 50px">
                                                                <div class="row">
                                                                    <label class="col-md-5"><i class="{{ $t['icon'] }}"></i> {{ $t['name'] }}:</label>
                                                                    <div class="col-md-7">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label" style="margin-left: -20px; color:red">
                                                                                Görmür <input class="form-check-input" type="radio" id="mod_{{ $t['route'] }}" name="available_modules[{{ $t['route'] }}]" value="1" {{ $id >0 && $type->getModulePriv($t['route']) == 1 ? 'checked' : '' }}>
                                                                                <span class="circle"><span class="check"></span></span>
                                                                            </label>
                                                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <div class="form-check">
                                                                            <label class="form-check-label" style="color: green">
                                                                                Görür <input style="margin-left: -20px" class="form-check-input" type="radio" id="mod_{{ $t['route'] }}" name="available_modules[{{ $t['route'] }}]" value="2" {{ $id >0 && $type->getModulePriv($t['route']) == 2 ? 'checked' : '' }}>
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
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label class="col-md-5"><i class="{{ $typeD['icon'] }}"></i> {{ $typeD['name'] }}:</label>
                                                        <div class="col-md-7">
                                                            <div class="form-check">
                                                                <label class="form-check-label" style="color: red">
                                                                    Görmür <input class="form-check-input" type="radio" id="mod_{{ $typeD['route'] }}" name="available_modules[{{ $typeD['route'] }}]" value="1" {{ $id >0 && $type->getModulePriv($typeD['route']) == 1 ? 'checked' : '' }}>
                                                                    <span class="circle"><span class="check"></span></span>
                                                                </label>
                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <div class="form-check">
                                                                <label class="form-check-label" style="color: green">
                                                                    Görür <input class="form-check-input" type="radio" id="mod_{{ $typeD['route'] }}" name="available_modules[{{ $typeD['route'] }}]" value="2" {{ $id >0 && $type->getModulePriv($typeD['route']) == 2 ? 'checked' : '' }}>
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

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
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
        .form-check{
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

@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

        <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">İstifadəçi dəyişikliyi</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" novalidate=""  method="post" action="{{ url('admin/users/addEdit/'.$id) }}" class="form-horizontal">
                                <input type="text" class="fake-autofill-fields" name="asasd"/>
                                <input type="password" class="fake-autofill-fields" name="asds"/>
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Adı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input required="" name="name" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçinin Şəxsi Adı" value="{{ $User['firstname'] }}">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Soyadı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input name="surname" data-validate-length-range="5,20" type="text" class="form-control" placeholder="İstifadəçin Soyadı" value="{{ $User['surname'] }}"><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">İstifadəçi adı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input type="text" value="{{ $User['login'] }}" name="login" required="required" class="form-control" placeholder="İstifadəçi adı" value=""><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">E-mail</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input autocomplete="off" required="" name="email" type="email" class="form-control" placeholder="E-mail" value="{{ $User['email'] }}"><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Parol</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input autocomplete="off" @if ($id == 0) {{ 'required=""' }} @endif type="password" name="password" data-validate-length="5,20" class="form-control" placeholder="Parol" value=""><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Grup</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="group_id" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    <option value="0">Grup Seç</option>
                                                    @foreach (\App\Models\Group::realData()->get() as $type)
                                                        <option tenant_id = "{{ $type['tenant_id'] }}" value="{{ $type['id'] }}" {{ $type['id'] == $User['group_id']? 'selected':'' }}> {{ $type['group_name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @if( Auth::user()->group->super_admin == 1 )
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Şirkət</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="tenant" required="" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-red">
                                                    @foreach (\App\Models\Tenant::realTenants()->get() as $type)
                                                        <option value="{{ $type['id'] }}" {{ $type['id'] == $User['tenant_id']? 'selected':'' }}> {{ $type['company_name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="ln_solid"></div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="submit">Saxla<div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-sm-5 col-md-6 mr-auto ml-auto">
                                            <button class="btn btn-danger" onclick="window.location.href='{{ url('admin/users/') }}'" type="reset">Geriyə<div class="ripple-container"></div></button>
                                        </div>

                                    </div>

                            </form> 
        
        </div>
  
    </div>

</div>

@endsection

@section('css')
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}

    <style>
        .fake-autofill-fields{
            position: absolute;
            top: -500px;
        }
    </style>
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

    <script type="text/javascript">

        @if( Auth::user()->group->super_admin == 1 )
            $("select[name=tenant]").change(function () {
                $("select[name=group_id] option").hide();
                $("select[name=group_id] option[tenant_id='"+$(this).val()+"'], select[name=group_id] option[value='0']").show();
                $("select[name=group_id]").val(0);
            }).trigger("change");

            @if( $id > 0 )
                $("select[name=group_id]").val({{ $User['group_id'] }});
            @endif
        @endif
    </script>
@endsection

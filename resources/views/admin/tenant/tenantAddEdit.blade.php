@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')


    <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Şirkət dəyişikliyi</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" method="post" action="{{ route('tenant_add_edit',['tenant'=>$id]) }}" novalidate="" class="form-horizontal">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Şirkətin adı</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <!-- <span class="input-group-text">
                                                    <i class="material-icons">email</i> -->
                                                
                                                <input name="company_name" data-validate-length-range="5,100" type="text" class="form-control" placeholder="Şirkətin adı" value="{{ $Tenant['company_name'] }}"><!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Tipi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <select class="selectpicker" name="type" required="" data-size="7" data-style="btn btn-round btn-hm btn-new-hm btn-new-hm-badimcan" title="">
                                                    @foreach (\App\Models\MskType::all() as $type)
                                                        <option value="{{ $type['id'] }}" {{ $type['id'] == $Tenant['type']? 'selected':'' }}> {{ $type['name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="hidden" name="_token" value="{{ csrf_token() }}">Success<div class="ripple-container"></div></button>
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
    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}

    <script>
        $(function () {
            $('input.daterange').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD-MM-YYYY'
                },
            });
        });
    </script>
@endsection

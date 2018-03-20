@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')
 <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Şirkət Ödənişi</h4>
                </div>
            </div>
            
        <div class="card-body ">
        
        
                            <form autocomplete="off" method="post" action="" novalidate="" class="form-horizontal">
                                    
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label text-right">Məbləğ</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <h6 style="font-weight: 700; font-size: 18px; margin-top: 15px; color: red">{{ $tenant->msk_type->amount }} 
                                                <span style="font-weight: 500; color: green">AZN</span></h6>
                                                <!-- <input name="company_name" data-validate-length-range="5,100" type="text" class="form-control" placeholder="Şirkətin adı" value=""> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" style="margin: 15px 0">Ay seçimi</label>

                                        <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                            <div class="form-group">
                                                <input  name="month_count" id="month_count" data-validate-length-range="1,10" type="number" class="form-control" placeholder="Ay sayi" value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                                        </div>
                                        <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                            <button class="btn btn-success" type="hidden" name="_token" value="{{ csrf_token() }}">&#0160; &#0160; Ödə &#0160; &#0160;<div class="ripple-container"></div></button>
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
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}

    <script>
        let amount = parseInt("{{ $tenant->msk_type->amount }}");
        $("#month_count").change(function () {
            $("#amount").text( amount * $(this).val() );
        });
    </script>
@endsection

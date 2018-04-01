@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    
    <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Şəhər</h4>
                </div>
            </div>
            
        <div class="card-body ">

            <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('msk_city_add_edit', ['metro' => $id]) }}">
                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">Şəhərin adı</label>

                            <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                <div class="form-group">
                                    <input required="" name="name" data-validate-length-range="1,50" type="text" class="form-control" placeholder="Şəhər" value="{{ $metro['name'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
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

@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- jquery.inputmask -->
    {!! Html::script('admin/assets/vendors/jquery.inputmask/jquery.inputmask.bundle.min.js') !!}
@endsection

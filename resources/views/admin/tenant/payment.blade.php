@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tenant</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ route('tenant_payment_action',['tenant'=> $tenant->id]) }}">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məbləğ
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" id="amount" style="line-height: 33px;">
                                {{ $tenant->msk_type->amount }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ay sayi
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  name="month_count" id="month_count" data-validate-length-range="1,10" type="number" class="form-control" placeholder="Ay sayi" value="1">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Ödə</button>
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

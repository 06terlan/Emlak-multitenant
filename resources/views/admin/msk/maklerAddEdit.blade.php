@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    
    <div class="col-md-12">

        <div class="card ">
            
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Agent əlavə et</h4>
                </div>
            </div>
            
        <div class="card-body ">

                    <form autocomplete="off" class="form-horizontal" novalidate=""  method="post" action="{{ route('msk_makler_add_edit', ['makler' => $id]) }}">

                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right" for="first-name">Agentin adı</label>
                            <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                <div class="form-group">
                                    <input required="" name="fullname" data-validate-length-range="5,30" type="text" class="form-control" placeholder="Agentin adı" value="{{ $makler['fullname'] }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right" for="first-name">Agentin nömrəsi</label>
                            <div class="col-sm-10 col-md-6 mr-auto ml-auto">
                                <div class="form-group">
                                    <input required="" data-inputmask="'mask' : '(999) 999-9999'" name="number" data-validate-length-range="14,15" type="text" class="form-control" placeholder="Agentin nömrəsi" value="{{ $makler['number'] }}">
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row" style="margin-top: 20px">
                            <div class="col-sm-2 col-md-4 mr-auto ml-auto">
                            </div>
                            <div class="col-sm-5 col-md-2 mr-auto ml-auto">
                                <button class="btn btn-success" type="submit">Success<div class="ripple-container"></div></button>
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

    <script>
        $('[name="number"]').inputmask({"mask": "(999) 999-9999"});
    </script>
@endsection

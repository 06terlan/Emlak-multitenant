@extends('admin.masterpage')

@section('content')
    @include('admin.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>About</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post" action="{{ url('admin/about') }}">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="descr" style="display:none;" name="content">{{ $about }}</textarea>
                            </div>
                        </div>
                        </div>
                        <div class="ln_solid"></div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/summernote/dist/summernote.css') !!}
@endsection

@section('scripts')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::script('admin/assets/vendors/summernote/dist/summernote.js') !!}

   <script type="text/javascript">
       $('#descr').summernote({height: 300});
   </script>
@endsection
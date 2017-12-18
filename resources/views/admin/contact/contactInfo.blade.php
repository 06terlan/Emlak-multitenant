@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contact</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Name:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $contact->name }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Email:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $contact->email }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $contact->phone }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Created at:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ App\Library\Date::d($contact->created_at,'d-m-Y H:i') }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Message:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $contact->message }}
                            </div>
                        </div>
                        
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-default" href="{{ url('admin/contacts/') }}" type="reset">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
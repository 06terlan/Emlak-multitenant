@extends('admin.masterpage')

@section('content')
    @include('admin.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Elan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Header:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {!! $announcement->header !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipi:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->getAnnouncementType() }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tarix:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ \App\Library\Date::d($announcement->created_date, "d-m-Y") }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dəyəri:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->amount }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sahə:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->area }} m<sup>2</sup>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Otaqların sayı:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->roomCount }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Yerləşdiyi mərtəbə:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->locatedFloor }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Mərtəbə sayı:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {{ $announcement->roomCount }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Content:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {!! $announcement->floorCount !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sənədin tipi:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {!! $announcement->getDocumentType() !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Təmiri:</label>
                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">
                                {!! $announcement->getRepairing() !!}
                            </div>
                        </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-default" href="{{ route('announcement_pro') }}" type="reset">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
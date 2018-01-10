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

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Link:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                <a href="{{ $announcement->link }}">Link</a>

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kategoria:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->getAnnouncementType() }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Elanın Tipi:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->getBuldingType() }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tarix:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ \App\Library\Date::d($announcement->date, "d-m-Y") }}

                            </div>

                        </div>

                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dəyəri:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->amount }}

                            </div>

                        </div>



                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nömrə:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                @foreach (json_decode($announcement['mobnom']) as $typeK => $num)

                                    <div class="numb">
                                        {{ $num }}
                                    </div>
                                @endforeach

                            </div>

                        </div>


                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Sahibkar:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {{ $announcement->owner }}

                            </div>

                        </div>





                        <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Content:</label>

                            <div class="col-md-6 col-sm-6 col-xs-3" style="line-height: 36px;">

                                {!! $announcement->content !!}

                            </div>

                        </div>





                </div>

                <div class="ln_solid"></div>

                <div class="form-group">

                    <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">

                        <a class="btn btn-default" href="{{ url()->previous() }}" type="reset"><i class="fa fa-arrow-circle-left"></i> Back</a>

                        @if(Auth::user()->role == App\Library\MyClass::ADMIN_ROLE)
                            <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}" class="btn btn-danger deleteAction"><i class="fa fa-trash"></i> Delete</a>
                            <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}" class="btn btn-success"><i class="fa fa-check"></i> Fərdiyə əlavə et</a>
                        @endif
                    </div>

                </div>

                </form>

            </div>

        </div>

    </div>

    </div>

@endsection
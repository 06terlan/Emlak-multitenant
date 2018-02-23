@extends('admin.masterpage1')



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
                <form autocomplete="off" class="form-horizontal form-label-left infoPage" novalidate=""  method="post">
                    <!--info melumat -->
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="headrBox effect7">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="listClassLeft">
                                            <ul class="">
                                                <li>
                                                    <a href="{{ url()->previous() }}">
                                                        <i class="fa fa-backward"> <span class="iconSpan" >Geriyə</span> </i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('announcement_pro_add_from',['announcement'=>$announcement->id]) }}">
                                                        <i class="fa fa-plus"> <span class="iconSpan" >Fərdilərə</span> </i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $announcement->link }}" target="_blank">
                                                        <i class="fa fa-link"> <span class="iconSpan" style="padding-right:15px;" >Link</span> </i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="listClass">
                                            <ul class="">
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-thumb-tack"> <span class="iconSpan" >Qeyd et</span> </i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="fa fa-print"> <span class="iconSpan">Print</span> </i>
                                                    </a>
                                                </li>
                                                {{--<li>
                                                    <a href="">
                                                        <i class="fa fa-share-alt"> <span class="iconSpan" style="padding-right:15px;" >Paylaş</span> </i>
                                                    </a>
                                                </li>--}}
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-8">

                            <div class="contentBox effect7">
                                <p style="font-size:16px; padding-left:15px; margin-top:10px; text-indent:1.5em; color: #515762;">{!! $announcement->content !!}</p>
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-4"> <!-- right panel -->
                            <div class="rightBox effect7">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="margin-top:15px; color: #23bbd2">
                                        <i class="fa fa-phone fa-2x"></i>
                                        @foreach ($announcement['numbers'] as $typeK => $num)
                                             <span style="color:#2e3238; font-size: 1.7rem; font-weight: 700;">
                                            {{ $num['number'] }} ({!! \App\Library\MyHelper::getMakler($num['pure_number']) !!})
                                        </span>
                                        @endforeach
                                        <br/>
                                        <span class="textColorSpan" style="font-size: 20px;">&#0160; 250000.00</span> <span style="font-size:12px;" >AZN</span>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <p style="margin-top:10px;">{{ $announcement->header }}</p>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Obyektin növü: <span class="textColorSpan">&#0160; {{ $announcement->getAnnouncementType() }} </span></div>
                                    </div>

                                    @if($announcement->type == 'building')
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Binanın növü: <span class="textColorSpan">&#0160; {{ $announcement->getAnnouncementType2() }} </span></div>
                                        </div>
                                    @endif

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Elanın növü: <span class="textColorSpan">&#0160; {{ $announcement->getBuldingType() }} </span></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Şəhər: <span class="textColorSpan">&#0160; {{ $announcement->city->name }} </span></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Yerləşir: <span class="textColorSpan">&#0160; {{ $announcement->place }} </span></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Sahə m<sup>2</sup>: <span class="textColorSpan">&#0160; {{ $announcement->area }} </span></div>
                                    </div>

                                    @if($announcement->type != 'land')
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="elanBox">Otaq sayı: <span class="textColorSpan">&#0160; {{ $announcement->roomCount }} </span></div>
                                        </div>
                                    @endif

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Sahibi: <span class="textColorSpan">&#0160; {{ $announcement->owner }} </span></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">Sayt: <span class="textColorSpan">&#0160; {{ $announcement->site }} </span></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">
                                            <i class="fa fa-calendar" style="color:#23bbd2"></i> Tarix: <span class="textColorSpan">&#0160; 08.05.2018 </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="elanBox">
                                            <a class="btn btn-danger deleteAction" style="width: 100%" href="{{ route('announcement_delete',['id'=>$announcement->id]) }}"><i class="fa fa-trash"></i> Elanı sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    <div class="ln_solid"></div>
                </form>
            </div>
    
        </div>
    </div>
</div>

@endsection

@section('css')
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsection
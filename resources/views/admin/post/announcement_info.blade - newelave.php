@extends('admin.masterpage_huseynzade')



@section('content')

    @include('admin.error')


    	<div class="content">
        	<div class="container-fluid">
             	<div class="row">
				    <div class="col-md-8">

				    	<!-- sekil + xerite -->


			<div class="card ">
    
			    <div class="card-header mr-auto ml-auto">
			    	<h4 class="card-title">Navigation Pills - <small class="description">Horizontal Tabs</small></h4>
			    </div>
			    
			    <div class="card-body">

			    			<div class="tab-content tab-space">
                                <!-- sekil -->
                                <div class="tab-pane active" id="link1">

	                                <div class="card-header card-header-image" data-header-animation="true">
						                <a href="#pablo">
						                    <img class="img" style="height: 400px" src="../../assets/build/huseynzade/img/card-1.jpeg">
						                </a>
						            </div>

                                	

                                </div>

                                <!-- xerite -->
                                <div class="tab-pane" id="link2">

                                	<div class="card-header card-header-image" data-header-animation="true">
						                <div class="ln_solid"></div>

				                        <input type="hidden" id="loc_lat" name="loc_lat" value="40.4242696">
				                        <input type="hidden" id="loc_lng" name="loc_lng" value="49.8522489">
						                </a>
						            </div>
                                 
                            	</div>

                            </div>
        
        
        
            				<ul class="nav nav-pills nav-pills-rose nav-pills-icons" role="tablist">
                                <li class="nav-item mr-auto ml-auto">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                       <i class="material-icons">insert_photo</i> Elanın şəkİllərİ
                                    </a>
                                </li>
                                <li class="nav-item mr-auto ml-auto">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                       <i class="material-icons">place</i> Elan Xərİtədə
                                    </a>
                                </li>
                            </ul>
        		</div>
    		</div>


				    	<!-- sekil + xerite son -->



				        <div class="card">
				            <div class="card-header card-header-icon card-header-rose">
				              <!-- <div class="card-icon">
				                <i class="material-icons">perm_identity</i>
				              </div> -->
				              <h4 class="card-title">Gələn Elan - <small class="category">Haqqında Ətraflı məlumat</small></h4>

				            </div>
				            <div class="card-body">

				                <form>
				                		<hr/>
					                		<p style="text-align: justify;">
					                			{!! $announcement->content !!}
					                		</p>
				                		<hr/>

				                		<div class="row">
				                			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				                				<button type="button" style="width: 70%" class="btn btn-info" onclick="window.location.href='{{ url()->previous() }}'" rel="tooltip" data-placement="bottom" title="Geriyə">
							                        <i class="material-icons">arrow_back</i>
							                    </button>
				                			</div>

				                			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				                				<button type="button" style="width: 70%" class="btn btn-success " onclick="window.location.href='{{ route('announcement_pro_add_from',['announcement'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="FE. Əlavə Et">
							                        <i class="material-icons">edit</i>
							                    </button>
				                			</div>

				                			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

				                				<button type="button" style="width: 70%" class="btn btn-primary pull-right" onclick="window.location.href='{{ $announcement->link }}'" rel="tooltip" data-placement="bottom" title="Web sayt">
							                        <i class="material-icons">link</i>
							                    </button>
				                			</div>

				                			<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

				                				<button type="button" style="width: 70%" class="btn btn-danger pull-right" onclick="window.location.href='{{ route('announcement_delete',['id'=>$announcement->id]) }}'" rel="tooltip" data-placement="bottom" title="Sil Getsin">
							                        <i class="material-icons">close</i>
							                    </button>

				                			</div>

				                		</div>


				                    <!-- <button type="submit" class="btn btn-rose pull-right">Update Profile</button> -->
				                    <div class="clearfix"></div>
				                </form>
				            </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				        <div class="card card-profile">
				            <!-- <div class="card-avatar">
				                <a href="#pablo">
				                    <img class="img" src="{{ asset(Auth::user()->photo()) }}" />
				                </a>
				            </div> -->

				            <div class="card-body">

				                <h4 class="card-title">{{ $announcement->owner }}</h4>
				                @foreach ($announcement['numbers'] as $typeK => $num)
				                <h4>{{ $num['number'] }}</h4>
				                <h6 class="card-category text-gray">{!! \App\Library\MyHelper::getMakler($num['pure_number']) !!}</h6>
				                @endforeach
				                <hr><p class="card-description" style="text-align: justify;">
				                    {{ $announcement->header }}
				                </p><hr>

				                <!-- <hr/>
				                	<h4><span style="" class="text-danger">{{ (int)$announcement->amount }}</span> &#0160; <img src="../../assets/build/huseynzade/img/azn.png" style="width: 15px" alt="AZN"></h4>
				                <hr/> -->
				                <h5 class="text-left" style="">Obyektin növü: <span class="pull-right text-success">{{ $announcement->getAnnouncementType() }}</span></h5>
				                @if($announcement->type == 'building')
				                <p style="margin-top: -10px; color: red">{{ $announcement->getAnnouncementType2() }}</p>
				                @endif
				                <h5 class="text-left" style="">Elanın növü: <span class="pull-right text-success">{{ $announcement->getBuldingType() }}</span></h5>
				                <h5 class="text-left">Şəhər: <span class="pull-right text-success">{{ $announcement->city->name }} AZ</span></h5>
				                <h5 class="text-left">Yerləşir: <span class="pull-right text-success">{{ $announcement->place }}</span></h5>
				                <h5 class="text-left">Metro: <span class="pull-right"></span></h5>
				                <h5 class="text-left">Nişangah: <span class="pull-right"></span></h5>
				                <h5 class="text-left">Sahə: <span class="pull-right text-success">{{ $announcement->area }} m<sup>2</sup></span></h5>
				                <h5 class="text-left">Binanın mərtəbə sayı: <span class="pull-right"></span></h5>
				                <h5 class="text-left">Yerləşdiyi mərtəbə: <span class="pull-right"></span></h5>
				                
				                @if($announcement->type != 'land')
				                <h5 class="text-left">Otaq sayı: <span class="pull-right text-success">{{ $announcement->roomCount }}</span></h5>
				                @endif
				                <h5 class="text-left">Binanın təmiri: <span class="pull-right"></span></h5>
				                <h5 class="text-left">Binanın çıxarışı: <span class="pull-right"></span></h5>
				                
				                <h5 class="text-left">Gəldiyi yer: <span class="pull-right" style="color: yellowgreen">{{ $announcement->site }}</span></h5>
				                <h5 class="text-left">Elanı tarixi: <span class="pull-right text-danger">{{ date("d-m-Y", strtotime($announcement->date)) }}</span></h5>





				                <!-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> -->
				            </div>
				        </div>
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
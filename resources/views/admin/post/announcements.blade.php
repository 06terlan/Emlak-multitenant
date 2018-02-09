@extends('admin.masterpage1')

@section('content')
    @include('admin.error')

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Elanlar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="get" action="" class="formFinder">
                        <input type="hidden" name="page" value="{{ $request->get("page",1) }}">
                        <table class="table table-striped">
 
                            
                            
<!-- elanlarin axtaris hissesi--> 
   
<!-- BEGIN CONTAINER -->

<div class="page-container">
    <div class="page-content">

        <div class="row">
            <div class="col-sm-12">
                
<!-- Lazimli -->

<script>
    function showAppFilters(){
        
        switch($('#elansecim').val()) {
            case '0':  // her ikisinde
                $("#").removeClass("hidden");
                $("").addClass("hidden");
                break;

            case '1':  // Ferdiler uzre 
                $("").removeClass("hidden");
                $("").addClass("hidden");
                break;

            case '2':  // Elanlar üzrə
                $("#agent, #statusM").removeClass("hidden");
                $("#agent, #statusM").addClass("hidden");
                break;

                
            default:
                break;
        }

        switch($('#entityType').val()) {
            case '0':  // Bina ev mənzil
                $("#roomColumn, #roomRemadeColumn, #floorColumn, #floorTypeColumn, #buildinFloorsColumn, #areaColumn, #buildingTypeColumn").removeClass("hidden");
                $("#parcelAreaColumn").addClass("hidden");
                break;

            case '1':  // Həyət evi / Villa
                $("#roomColumn, #roomRemadeColumn, #parcelAreaColumn, #areaColumn").removeClass("hidden");
                $("#floorColumn, #floorTypeColumn, #buildinFloorsColumn, #buildingTypeColumn").addClass("hidden");
                break;

            case '2':  // Qaraj
                $("#areaColumn").removeClass("hidden");
                $("#roomColumn, #roomRemadeColumn, #floorColumn, #floorTypeColumn, #buildinFloorsColumn, #parcelAreaColumn, #buildingTypeColumn").addClass("hidden");
                break;

            case '3':  // Ofis
                $("#floorColumn, #floorTypeColumn, #buildinFloorsColumn, #areaColumn").removeClass("hidden");
                $("#parcelAreaColumn, #roomColumn, #roomRemadeColumn, #buildingTypeColumn").addClass("hidden");
                break;            

            case '4':  // Torpaq sahəsi
                $("#areaColumn").removeClass("hidden");
                $("#roomColumn, #roomRemadeColumn, #floorColumn, #floorTypeColumn, #buildinFloorsColumn, #parcelAreaColumn, #buildingTypeColumn").addClass("hidden");
                break;              

            case '5':  // Obyekt
                $("#floorColumn, #floorTypeColumn, #buildinFloorsColumn, #areaColumn").removeClass("hidden");
                $("#parcelAreaColumn, #roomColumn, #roomRemadeColumn, #buildingTypeColumn").addClass("hidden");
                break;   
                
            default:
                break;
        }

        switch($('#purpose').val()) {
            case '0': //satilir
                $("#loanColumn").removeClass("hidden");
                break;
            case '1': //kiraye
                $("#loanColumn").addClass("hidden");
                break;
            case '2': //gunluk kiraye
                $("#loanColumn").addClass("hidden");
                break;

            default:
                break;
        }
        
    }
</script>
                
<form class="" role="form" action="/search#anchor">
    <!-- BEGIN PORTLET-->
    
    <div class="portlet light ">
        <div class="portlet-body">

            <div class="actions">
<input data-val="true" data-val-required="The adsDateCat field is required." id="adsDateCat" name="adsDateCat" type="hidden" value="Today" />            </div>
        </div>
        <div class="tabbable tabbable-custom nav-justified">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="#search" id="a_search" data-toggle="tab">
                        Axtarış 
                    </a>
                </li>
                <li>
                    <a href="#sell" id="a_sell" data-toggle="tab">
                        Satılır 
                    </a>
                </li>
                <li>
                    <a href="#rent" id="a_rent" data-toggle="tab">
                        Kirayə
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="search">
                    <div class="form-horizontal form-body ">
                        <div class="row">
                            <div class="col-sm-6">
         

                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4  control-label">Obyektin n&#246;v&#252;</label>
                                    <div class="col-xs-8 ">
                                        <select class="bs-select form-control select2me" data-placeholder="Obyektin növünü seçin..." id="entityType" name="entityType"><option selected="selected" value="0">Bina ev mənzil</option>
<option value="1">Həyət evi / Villa, Bağ evi</option>
<option value="2">Qaraj</option>
<option value="3">Ofis</option>
<option value="4">Torpaq sahəsi</option>
<option value="5">Obyekt</option>
</select>
                                        <!--<span class="help-block">A block of help text. </span>-->
                                    </div>
                                </div>

                                <div class="form-group col-sm-12" id="buildingTypeColumn">
                                    <label class="col-xs-4 control-label">Binanın n&#246;v&#252;</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Binanın növünü seçin..." data-val="true" data-val-required="The buildingType field is required." id="buildingType" name="buildingType"><option value="0">Yeni tikili</option>
<option value="1">K&#246;hnə tikili</option>
<option selected="selected" value="-1">Hamısı</option>
</select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Elanın n&#246;v&#252;</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Elanın növünü seçin..." data-style="btn-info" id="purpose" name="purpose"><option selected="selected" value="0">Satılır</option>
<option value="1">Kirayə</option>
<option value="2">G&#252;nl&#252;k kirayə</option>
</select>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Şəhər</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Şəhəri seçin..." data-style="btn-danger" data-val="true" data-val-number="The field city must be a number." data-val-required="The city field is required." id="city" name="city"><option value="11">Astara</option>
<option value="30">Ağstafa</option>
<option value="75">Ağsu</option>
<option selected="selected" value="1">Bakı/Abşeron</option>
<option value="76">Balakən</option>
<option value="17">Beyləqan</option>
<option value="18">Bərdə</option>
<option value="9">Cəlilabad</option>
<option value="22">G&#246;y&#231;ay</option>
<option value="2">Gəncə</option>
<option value="77">K&#252;rdəmir</option>
<option value="8">Lənkəran</option>
<option value="37">Masallı</option>
<option value="20">Mingə&#231;evir</option>
<option value="80">Nax&#231;ıvan</option>
<option value="7">Neft&#231;ala</option>
<option value="36">Oğuz</option>
<option value="33">Qax</option>
<option value="79">Qazax</option>
<option value="24">Quba</option>
<option value="25">Qusar</option>
<option value="39">Qəbələ</option>
<option value="14">Saatlı</option>
<option value="15">Sabirabad</option>
<option value="6">Salyan</option>
<option value="3">Sumqayıt</option>
<option value="29">Tovuz</option>
<option value="26">Xa&#231;maz</option>
<option value="31">Xudat</option>
<option value="34">Xırdalan</option>
<option value="41">Xızı</option>
<option value="32">Zaqatala</option>
<option value="38">İsmayıllı</option>
<option value="28">Şabran</option>
<option value="16">Şamaxı</option>
<option value="5">Şirvan</option>
<option value="19">Şəki</option>
<option value="4">Şəmkir</option>
<option value="81">Ağcəbədi</option>
<option value="82">Ağdam</option>
<option value="83">Ağdaş</option>
<option value="84">Biləsuvar</option>
<option value="85">Cəbrayıl</option>
<option value="86">Daşkəsən</option>
<option value="87">Dəliməmmədli</option>
<option value="88">Fizuli</option>
<option value="89">Gədəbəy</option>
<option value="90">Goranboy</option>
<option value="91">G&#246;yg&#246;l</option>
<option value="92">G&#246;ytəpə</option>
<option value="93">Hacıqabul</option>
<option value="94">Horadiz</option>
<option value="95">İmişli</option>
<option value="96">Kəlbəcər</option>
<option value="97">La&#231;ın</option>
<option value="98">Lerik</option>
<option value="101">Liman</option>
<option value="102">Naftalan</option>
<option value="103">Qobustan</option>
<option value="104">Qubadlı</option>
<option value="105">Samux</option>
<option value="106">Siyəzən</option>
<option value="107">Şuşa</option>
<option value="108">Tərtər</option>
<option value="109">Nabran</option>
<option value="110">Xocavənd</option>
<option value="111">Yardımlı</option>
<option value="112">Yevlax</option>
<option value="113">Zəngilan</option>
<option value="114">Zərdab</option>
</select>

<!--<span class="help-block">A block of help text. </span>-->
</div>
</div>

                             
</div>                      
<div class="col-sm-6">
<!-- tarix uzre secim -->
<div class="form-group col-sm-12">
    <label class="col-xs-4  control-label">Tarix</label>
    <div class="col-xs-8 ">   

        <input style="display: inline-block;width: 90%;" type="text" name="date" value="{{ $request->get('date', '') }}" class="form-control daterange"/> 
        <div style="display: inline-block;padding-top: 5px;" data-toggle="tooltip" data-original-title="Tarixi nəzərə al">
        <input type="checkbox" name="dateChk" {{ $request->get('dateChk') ? 'checked' : '' }} class="flat" />   
        </div>
    </div>
</div>   
    
<!-- tarix uzre son -->

                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4  control-label">Satıcının tipi</label>
                                    <div class="col-xs-8 ">
                                        <select class="bs-select form-control select2me" data-placeholder="Elan verənin tipini seçin..." id="ownerType" name="ownerType"><option value="0">Ancaq m&#252;lkiyyət&#231;i</option>
<option value="1">Ancaq vasitə&#231;i</option>
<option selected="selected" value="-1">Hamısı</option>
</select>
                                        <!--<span class="help-block">A block of help text. </span>-->
                                    </div>
                                </div>

                             

                    

    


                                <div class="form-group col-sm-12" id="floorTypeColumn">
                                    <div class="col-xs-8 col-xs-offset-4">

                                        <div class="checkbox">
                                            <input type="checkbox" id="exceptLastFloor" name="exceptLastFloor"  value="true" >
                                            <label for="exceptLastFloor">
                                                Axırıncı mərtəbə olmasın
                                            </label>
                                        </div>
                                    </div>
                                </div>

                              
                                <div class="form-group col-sm-12">
                                    <label class="col-md-4 col-xs-3 control-label">Qiymət</label>
                                    <div class="col-md-8 col-xs-9 ">
                                        <input class="form-control priceInput btn-outline-danger" data-val="true" data-val-number="The field minPrice must be a number." id="minPrice" name="minPrice" placeholder="min" type="text" value="" />

                                        <input class="form-control priceInput btn-outline-danger" data-val="true" data-val-number="The field maxPrice must be a number." id="maxPrice" name="maxPrice" placeholder="max" type="text" value="" />
                                    </div>
                                </div>
                                


                            </div>
                        </div>

                    </div>


                    <div class="form-actions noborder" id="list">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-3">
                                <div id="anchor"></div>
                                <button type="submit" onclick="$('[name=page]').val(1);" class="btn btn-lg btn-block green-sharp" id="search" name="search"><i class="fa fa-search"></i> Axtar </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="sell">
                    <div class="row">

                        <div class="col-xs-4 col-new">
                            <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                            <ul>
                                <li class="">
                                    <a href="/1-otaqli-yeni-tikili-evler-satilir">
                                        1 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/2-otaqli-yeni-tikili-evler-satilir">
                                        2 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/3-otaqli-yeni-tikili-evler-satilir">
                                        3 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/4-otaqli-yeni-tikili-evler-satilir">
                                        4 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/5-6-7-8-ve-cox-otaqli-yeni-tikili-evler-satilir">
                                        5 otaqlı və daha &#231;ox
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-old">
                            <h4 class="text-primary text-nowrap">K&#246;hnə tikililər</h4>
                            <ul>
                                <li class="">
                                    <a href="/1-otaqli-kohne-tikili-evler-satilir">
                                        1 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/2-otaqli-kohne-tikili-evler-satilir">
                                        2 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/3-otaqli-kohne-tikili-evler-satilir">
                                        3 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/4-otaqli-kohne-tikili-evler-satilir">
                                        4 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/5-6-7-8-ve-cox-otaqli-kohne-tikili-evler-satilir">
                                        5 otaqlı və daha &#231;ox
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-obj">
                            <ul>
                                <li class="">
                                    <a href="/menziller-satilir">Mənzillər</a>
                                </li>
                                <li class="">
                                    <a href="/evler-villalar-bag-satilir">Evlər/Villalar, Bağlar</a>
                                </li>
                                <li class="">
                                    <a href="/ofis-satilir">Ofislər</a>
                                </li>
                                <li class="">
                                    <a href="/qaraj-sat%C4%B1l%C4%B1r">Qarajlar</a>
                                </li>
                                <li class="">
                                    <a href="/torpaq-satilir">Torpaq</a>
                                </li>
                                <li class="">
                                    <a href="/obyekt-satilir">Obyektlər</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="rent">
                    <div class="row">

                        <div class="col-xs-4 col-new">
                            <h4 class="text-primary text-nowrap">Yeni tikililər</h4>
                            <ul>
                                <li class="">
                                    <a href="/1-otaqli-kiraye-evler-yeni-tikili">
                                        1 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/2-otaqli-kiraye-evler-yeni-tikili">
                                        2 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/3-otaqli-kiraye-evler-yeni-tikili">
                                        3 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/4-otaqli-kiraye-evler-yeni-tikili">
                                        4 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/5-6-7-8-ve-cox-otaqli-kiraye-evler-yeni-tikili">
                                        5 otaqlı və daha &#231;ox
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-old">
                            <h4 class="text-primary text-nowrap">K&#246;hnə tikililər</h4>
                            <ul>
                                <li class="">
                                    <a href="/1-otaqli-kiraye-evler-kohne-tikili">
                                        1 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/2-otaqli-kiraye-evler-kohne-tikili">
                                        2 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/3-otaqli-kiraye-evler-kohne-tikili">
                                        3 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/4-otaqli-kiraye-evler-kohne-tikili">
                                        4 otaqlı mənzillər
                                    </a>
                                </li>
                                <li class="">
                                    <a href="/5-6-7-8-ve-cox-otaqli-kiraye-evler-kohne-tikili">
                                        5 otaqlı və daha &#231;ox
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-obj">
                            <ul>
                                <li class="">
                                    <a href="/kiraye-menziller">Mənzillər</a>
                                </li>
                                <li class="">
                                    <a href="/kiraye-evler-villalar-baglar-bag-evleri">Evlər/Villalar, Bağlar</a>
                                </li>
                                <li class="">
                                    <a href="/kiraye-ofis">Ofislər</a>
                                </li>
                                <li class="">
                                    <a href="/kiraye-qarajlar">Qarajlar</a>
                                </li>
                                <li class="">
                                    <a href="/kiraye-torpaq">Torpaq</a>
                                </li>
                                <li class="">
                                    <a href="/kiraye-obyekler">Obyektlər</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

  <!--son axtariw-->      

<!-- elanlarin axtaris hissesi son-->                         
<!-- elanlarin headr hissesi--> 
   
        <div class="portlet-search">
            <div class="row searchSummary ">
                    <div class="col-sm-5">
                          
                                <h3 class="">Son sutkanın elanları 1270 .<i class="text-nowrap">Səhifə 1 / 378 </i></h3>
                        
                    </div>

                    <div class="col-sm-7">
                        <ul class='sorting'><li class='active'>Öncə yenilər</li><li><a href="">Ucuzdan-bahaya</a></li><li><a href="">Bahadan-ucuza</a></li></ul>
                    </div>
            </div>
        </div> 

<!-- elanlarin headr hissesi son-->                             
<!--Elanlar new version -->
@foreach ($announcements as $announcement ) 
<div class="items">
    <div class="item">
        <div class="item-picture">
        <a href="" target="_blank">
        <img src="images/elan/main.jpg" alt="">
        </a>
        <h3 class="item-price"><span class="price-amount">{{ $announcement->amount }}</span> <span class="currency">AZN</span></h3>
        <div class="item-credit">Kreditlə</div>
        <div class="item-certificate">Kupcali</div>
        <span class='item-owner-type agent'>{!! $announcement['is_makler'] == 1?"(Vasitəçi)":'(Mülkiyyətçi)' !!}</span>
        <div class="item-sell-rent-property sell">{{ $announcement->getBuldingType() }}</div>
        <!--<div class="item-sell-rent-property rent">Kirayə</div> Kirayeler ucun reng-->
        <!--<div class="item-sell-rent-property rent">Günlük kirayə</div> Buda gunluk kiraye -->
        <div class="item-secim-property cerge">{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }} </div>
        </div>
        <div class="item-properities">
        <h1 class="item-category">
        <b class="text-primary  ">{{ $announcement->getAnnouncementType() }}</b>
        </h1>
        <h1 class="text-nowrap">
        <span class="text-nowrap"><b>2</b> otaq<span class="remade"> (düzəlmə)</span></span>
        <span class="text-nowrap"><b>45 {{ $announcement->area }}</b> m&#178; </span>
        <span class="text-nowrap"><b>7 / 9</b> Mərtəbə </span>
        <!-- nastroyka bolmesi -->
            @if( \App\Library\MyHelper::has_priv("announcement_pro", \App\Library\MyClass::PRIV_CAN_ADD) )
        <span class="text-nowrap"> <a class="emeliyyat-bolumu-icon" href=""></a> </span>
        <span class="text-nowrap"><a class="emeliyyat-icon" href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Edit (Ferdilere)"><i class="fa fa-edit"></i></a></span>
        <span class="text-nowrap"><a class="emeliyyat-icon" href="{{ route('announcement_delete',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash"></i></a> </span>
        <span class="text-nowrap"><a class="emeliyyat-icon" href="" data-toggle="tooltip" data-original-title="Elan ver"><i class="fa fa-share-alt"></i></a> </span>
        <span class="text-nowrap"><a class="emeliyyat-icon" style="width: 24px;" href="{{ route('announcement_pro_status',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="{{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}"><i class="fa fa-thumb-tack"></i></a> </span>
            @endif
        <!-- nastroyka bolmesi son -->
        </h1>

        </div>
        <div class="details" >
        <span class="text-nowrap"><i class="fa fa-circle "></i><b>Bakı/Abşeron</b></span>
        <span class="text-nowrap"><i class="fa fa-circle "></i><b>Sabun&#231;u r.</b></span>
        <span class="text-nowrap"><i class="fa fa-circle "></i><b>Maştağa</b></span>
        <span class="text-nowrap"><i class="fa fa-circle "></i><img src="images/elan/m.png" class="hidden mPng"><b>Xalqlar Dostluğu m.</b></span>
        <p class="item-address">
        Bakı şəhəri, Afiyəddin Cəlilov 27A
        </p>
        <p class="description">
        {{ $announcement->getShortContent() }}
        </p>
           
         <a class="more-details" href="{{ route('announcement_info',['announcement'=>$announcement->id]) }}" target="_blank" data-toggle="tooltip" data-original-title="İnfo">Ətraflı <i class="fa fa-caret-right"></i></a>
        <span class="item-date"><i class="fa fa-calendar"></i> {{ App\Library\Date::d($announcement->date,'d-m-Y') }}</span>
        @foreach ($announcement['numbers'] as $typeK => $num)   
        <span class="item-nom"><i class="fa fa-mobile-phone" style="font-size:20px; color:red;"></i> {{ $num['number'] }}</span>
        @endforeach    
        <span class="item-source"> tap.az </span>
        </div>
    </div>
</div>
 @endforeach
<!--Elanlar new version SON -->                            
                            
                            
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Başlıq</th>
                                    <th>Content</th>
                                    <th>Tipi</th>
                                    <th>Qiymət</th>
                                    <th>Tarix</th>
                                    <th>Link</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>

                            <thead>
                                <tr>
                                    <th data-toggle="tooltip" data-original-title="Maklersiz elanlar">
                                        <input type="checkbox" name="no_makler" {{ $request->get("no_makler") ? 'checked' : '' }} class="flat formFind" />
                                    </th>
                                    <th><input class="form-control formFind" name="header" value="{{ $request->get("header") }}" placeholder="Başlıq"></th>
                                    <th><input class="form-control formFind" name="content" value="{{ $request->get("content") }}" placeholder="Content"></th>
                                    <th>
                                        <select class="form-control formFind" name="type">
                                            <option></option>
                                            @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get("type") ? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th><input class="form-control formFind" name="amount" value="{{ $request->get("amount") }}" placeholder="Qiymət"></th>
                                    <th><input class="form-control formFind" name="date" value="{{ $request->get("date") }}" placeholder="Tarix"></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement )
                                    <tr>
                                        <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }} {!! $announcement['is_makler']==1?"<i style='color:red;font-size:20px' class='fa fa-child' data-toggle='tooltip' data-original-title='Makler'></i>":'' !!}</td>
                                        <td>{{ $announcement->header }}</td>
                                        <td>{{ $announcement->getShortContent() }}</td>
                                        <td>{{ $announcement->getAnnouncementType() }}</td>
                                        <td>{{ $announcement->amount }}</td>
                                        <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>
                                        <td><a target="_blank" href="{{ $announcement->link }}"> Link </a> </td>
                                        <th>
                                            <a href="{{ route('announcement_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>

                                            @if( \App\Library\MyHelper::has_priv("announcement", \App\Library\MyClass::PRIV_CAN_ADD) )
                                                <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                                <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Fərdiyə əlavə et" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $announcements->links('admin.pagination', ['paginator' => $announcements]) }}
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
    {{--  iCheck --}}
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
    {{--  iCheck --}}
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

    <script>
        $(function () {
            $("input.flat.formFind").on('ifChanged', function (e) {
                $(this).parents("form:eq(0)").submit();
            });
        });
    </script>
@endsection
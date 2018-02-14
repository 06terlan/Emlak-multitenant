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
<style>
.shape{    
    border-style: solid; border-width: 0 91px 52px 0; 
    float:right; 
    height: 0px; 
    width: 0px;
    -ms-transform:rotate(360deg); /* IE 9 */
    -o-transform: rotate(360deg);  /* Opera 10.5 */
    -webkit-transform:rotate(360deg); /* Safari and Chrome */
    transform:rotate(360deg);
}
.offer{
    background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    }
.shape {
    border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
    border-radius:7px;
}
.offer-danger { border-color: #d9534f; }
.offer-danger .shape{
    border-color: transparent #d9534f transparent transparent;
}
.offer-success {    border-color: #5cb85c; }
.offer-success .shape{
    border-color: transparent #5cb85c transparent transparent;
}
.offer-default {    border-color: #999999; }
.offer-default .shape{
    border-color: transparent #999999 transparent transparent;
}
.offer-primary {    border-color: #428bca; }
.offer-primary .shape{
    border-color: transparent #428bca transparent transparent;
}
.offer-info {   border-color: #5bc0de; }
.offer-info .shape{
    border-color: transparent #5bc0de transparent transparent;
}
.offer-warning {    border-color: #f0ad4e; }
.offer-warning .shape{
    border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
    color:#fff;
    font-size:11px;
    font-weight:bold;
    position:relative;
    right:-31px;
    top:-2px;
    white-space: nowrap;
    -ms-transform:rotate(30deg); /* IE 9 */
    -o-transform: rotate(360deg);  /* Opera 10.5 */
    -webkit-transform:rotate(30deg); /* Safari and Chrome */
    transform:rotate(30deg);
}   
.offer-content{
    padding:0 20px 10px;
}


.offer-content img {
    width: 220px;
    height: 190px;
    margin: -50px -17.5px;
    /* left: 9px; */
    border-radius: 7px;
    margin-bottom: 10px;
}

.backColor {
    position: absolute;
    top: 10px;
    left: 17px;
    border-radius: 6px;
    background-color: rgba(238, 106, 96, 0.9);
    padding: 2px 5px;
    color: #ffffff;
    font-size: 18px;
    font-weight: 600;
}


.offer:hover h2 {
    top: 1px;
    left: 8px;
    }

.shape p {
    font-size: 14px;
}

.offer-content h3 {
    color: #428bca;
    font-weight: 600;
}

.row .fa-long-arrow-right {
    font-size: 22px !important;
    color: red;
}

.fa {
    margin-top: 6px;
    font-size: 18px !important;
}

.fa.fa-edit{
    color: rgb(101, 188, 125);
}

.fa.fa-trash {
    color: rgb(255, 0, 0);
}

.fa.fa-share-alt {
    color: rgb(35, 187, 210);
}

.fa.fa-thumb-tack {
    color: rgb(58, 146, 235);
}

.fa.fa-calendar {
    color: rgb(255, 0, 0);
}

.xetd:before {
    content: '';
    position: absolute;
    top: -4px;
    left: 9px;
    width: 190px;
    height: 2px;
    background-color: rgb(35, 187, 210);
}
</style>


<div class="container">
    <div class="row">


@foreach ($announcements as $announcement ) 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        {!! $announcement['is_makler'] == 1?"(Vasitəçi)":'Mülkiyyətçi' !!}                             
                    </div>
                </div>
                <div class="offer-content">
                    <img src="images/logo.jpg">
                    <h2 class="backColor">{{ $announcement->amount }} <span style="font-size: 17; font-weight: 200;">AZN</span></h2>
                    <h3 class="lead text-center" style="font-size: 16px;">{{ $announcement->getAnnouncementType() }}</h3>   
                <!--     <p class="text-center" style="font-size: 14px; color: red; margin-top: -10px;">Yeni tikili</p>    -->                 


                    <div class="row">
                        <div class="col-sm-8 text-left"  style="font-weight: 700; color: red; font-size: 16px;""><p>Baki / Abseron</p></div>    
                        <div class="col-sm-4 text-right"  style="font-weight: 600; color: rgb(58, 146, 235); font-size: 16px;"><p>{{ $announcement->getBuldingType() }}</p></div>      
                    </div>

                    <!-- <h4>Xususiyyetler</h4> -->
                    <ul class="text-left">
                        <li><p style="font-weight: 600;">2 otaq</p></li>
                        <li><p style="font-weight: 600;">45 m²</p></li>
                        <li><p style="font-weight: 600;">7 / 9 Mərtəbə</p></li>
                    </ul>

                    <div class="row">
                        <p></p>
                        <div class="col-sm-8 text-left" style="font-size: 14px;"><i class="fa fa-calendar"></i> {{ App\Library\Date::d($announcement->date,'d-m-Y') }}</div>    
                        <!-- <div class="col-sm-4 text-left" style="font-size: 11px;">yeniemlak.az</div>  -->   
                        <div class="col-sm-4 text-right"><a href="{{ route('announcement_info',['announcement'=>$announcement->id]) }}"> <i class="fa fa-long-arrow-right"></i> </a> <p></p></div>    
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-left" style="font-size: 16px; font-weight: 600; color: green;"># {{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }}</div>    
                        <div class="col-sm-8 text-right" style="color: #dfba49;"><p>yeniemlak.az</p></div>       
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-center xetd"> 
                            <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}"> <i class="fa fa-edit"></i> </a> </div>
                        <div class="col-sm-3 text-center"> 
                            <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}"> <i class="fa fa-trash"></i> </a> </div>
                        <div class="col-sm-3 text-center"> 
                            <a href=""> <i class="fa fa-share-alt"></i> </a> </div>
                        <div class="col-sm-3 text-center"> 
                            <a href=""> <i class="fa fa-thumb-tack"></i> </a> </div>      
                    </div>

                </div>
            </div>
        </div>
@endforeach

    </div>
</div>
<!--Elanlar new version end-->

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

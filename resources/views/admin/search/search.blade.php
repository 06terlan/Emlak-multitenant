@extends('admin.masterpage1')



@section('content')
    @include('admin.error')

   

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <h2>Elanlar</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link" data-toggle="tooltip" data-original-title="Gizlət/Göstər">Filtirlər <i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>
            
<!-- BEGIN CONTAINER -->

<div class="page-container">
    <div class="page-content">

        <div class="row">
            <div class="col-sm-12">
                
<!-- Lazimli -->

<script>
    function showAppFilters(){

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
<!-- axtarish uzre secim -->
<div class="form-group col-sm-12">
<label class="col-xs-4  control-label">Elanın n&#246;v&#252;</label>
<div class="col-xs-8 ">
<select class="bs-select form-control select2me" data-placeholder="Elanin növünü seçin..." id="huseynzadeM" name="huseynzadeM">  
<option selected="selected" value="1" {{ $request->get('announcement', 1) == 1 ? 'selected' : '' }}>Fərdilər üzrə</option>
<option value="2" {{ $request->get('announcement', 1) == 2 ? 'selected' : '' }}>Elanlar üzrə</option>
</select>
                                        <!--<span class="help-block">A block of help text. </span>-->
                                    </div>
                                </div>
<!--burda bitir -->
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
<div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Rayon</label>
                                    <div class="col-xs-8">

                                        <select class="bs-select form-control select2me" data-placeholder="Rayonları seçin..." data-style="btn-danger" id="region" multiple="multiple" name="region"><option value="10">Nərimanov r.</option>
<option value="11">Nizami r.</option>
<option value="12">Səbail r.</option>
<option value="13">Sabun&#231;u r.</option>
<option value="14">Suraxanı r.</option>
<option value="15">Xəzər r.</option>
<option value="16">Xətai r.</option>
<option value="56">Yasamal r.</option>
<option value="57">Qaradağ r.</option>
<option value="58">Binəqədi r.</option>
<option value="190">Nəsimi r.</option>
<option value="197">Abşeron r.</option>
<option value="235">Babək r.</option>
<option value="236">Şahbuz r.</option>
<option value="237">Ordubad r.</option>
<option value="238">Culfa r.</option>
<option value="240">Sədərək r.</option>
<option value="249">Pirallahı r.</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Metro</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Metroları seçin..." data-style="purple" id="subwayStation" multiple="multiple" name="subwayStation"><option value="1">Nəriman Nərimanov m.</option>
<option value="2">Gənclik m.</option>
<option value="3">Ulduz m.</option>
<option value="33">Həzi Aslanov m.</option>
<option value="34">Elmlər Akademiyası m.</option>
<option value="35">Nizami m.</option>
<option value="36">Şah İsmayıl Xətai m.</option>
<option value="37">İ&#231;əri Şəhər m.</option>
<option value="38">Sahil m.</option>
<option value="4">Koroğlu m.</option>
<option value="5">20 Yanvar m.</option>
<option value="51">Əhmədli m.</option>
<option value="52">Qara Qarayev m.</option>
<option value="53">Neft&#231;ilər m.</option>
<option value="54">Xalqlar Dostluğu m.</option>
<option value="59">Memar Əcəmi m.</option>
<option value="6">Azadlıq Prospekti m.</option>
<option value="60">Nəsimi m.</option>
<option value="61">Dərnəg&#252;l m.</option>
<option value="62">Cəfər Cabbarlı m.</option>
<option value="63">Bakmil m.</option>
<option value="7">İnşaat&#231;ılar m.</option>
<option value="8">28 May m.</option>
<option value="24">Avtovağzal m.</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Qəsəbə</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Qəsəbələri seçin..." data-style="purple" id="district" multiple="multiple" name="district"><option value="274">&#220;mid</option>
<option value="273">Şonqar</option>
<option value="272">Şıxlar </option>
<option value="271">Qızıldaş</option>
<option value="270">Qarakosa</option>
<option value="269">Qaradağ</option>
<option value="268">Pirsaat</option>
<option value="267">Montin</option>
<option value="266">Kotal</option>
<option value="265">Korg&#246;z</option>
<option value="264">İ&#231;əri şəhər</option>
<option value="263">Heybət</option>
<option value="262">Dədə Qorqud</option>
<option value="261">Ceyildağ</option>
<option value="260">Bahar</option>
<option value="258">Qobu</option>
<option value="257">Məhəmmədli</option>
<option value="256">Goradil</option>
<option value="255">Digah</option>
<option value="254">Ceyranbatan</option>
<option value="2530">G&#252;zdək</option>
<option value="253">G&#252;zdək</option>
<option value="50">H&#246;kməli</option>
<option value="252">G&#252;rgən</option>
<option value="91">G&#252;nəşli</option>
<option value="194">G&#246;rədil</option>
<option value="116">Fatmayı</option>
<option value="97">D&#252;bəndi</option>
<option value="244">B&#252;lb&#252;lə</option>
<option value="68">B&#246;y&#252;kşor</option>
<option value="117">Buzovna</option>
<option value="18">Binəqədi</option>
<option value="79">Binə</option>
<option value="17">Biləcəri</option>
<option value="118">Bilgəh</option>
<option value="47">Bibi Heybət</option>
<option value="49">Bayıl</option>
<option value="243">Balaxanı</option>
<option value="69">Bakıxanov</option>
<option value="46">Badamdar</option>
<option value="131">9-cu mikrorayon</option>
<option value="130">8-ci mikrorayon</option>
<option value="74">8-ci kilometr</option>
<option value="129">7-ci mikrorayon</option>
<option value="128">6-cı mikrorayon</option>
<option value="127">5-ci mikrorayon</option>
<option value="126">4-c&#252; mikrorayon</option>
<option value="125">3-c&#252; mikrorayon</option>
<option value="48">20-ci sahə</option>
<option value="124">2-ci mikrorayon</option>
<option value="73">Alatava</option>
<option value="123">1-ci mikrorayon</option>
<option value="93">H&#246;vsan</option>
<option value="99">Həzi Aslanov</option>
<option value="105">Keşlə</option>
<option value="66">Kirov</option>
<option value="70">Kubinka</option>
<option value="115">K&#246;hnə Corat</option>
<option value="200">K&#246;hnə G&#252;nəşli</option>
<option value="120">K&#252;rdəxanı</option>
<option value="20">L&#246;kbatan</option>
<option value="19">M.Ə.Rəsulzadə</option>
<option value="198">Masazır</option>
<option value="81">Massiv A</option>
<option value="82">Massiv B</option>
<option value="85">Massiv D</option>
<option value="84">Massiv G</option>
<option value="83">Massiv V</option>
<option value="122">Maştağa</option>
<option value="112">Mehdiabad</option>
<option value="98">M&#252;şviqabad</option>
<option value="109">Mərdəkan</option>
<option value="233">NZS</option>
<option value="119">Nardaran</option>
<option value="250">Neft Daşları</option>
<option value="113">Novxanı</option>
<option value="121">Pirşağı</option>
<option value="241">Pirəkəşk&#252;l</option>
<option value="22">Puta</option>
<option value="95">Qala</option>
<option value="75">Qara&#231;uxur</option>
<option value="45">Qobustan</option>
<option value="76">Ramana</option>
<option value="86">Sabun&#231;u</option>
<option value="21">Sahil</option>
<option value="111">Saray</option>
<option value="234">Savalan</option>
<option value="64">Sulutəpə</option>
<option value="87">Suraxanı</option>
<option value="23">Səngə&#231;al</option>
<option value="94">T&#252;rkən</option>
<option value="9">Xocəsən</option>
<option value="104">Xutor</option>
<option value="103">Yasamal</option>
<option value="242">Yeni Balaxanı</option>
<option value="114">Yeni Corat</option>
<option value="92">Yeni G&#252;nəşli</option>
<option value="77">Yeni Ramana</option>
<option value="88">Yeni Suraxanı</option>
<option value="102">Yeni Yasamal</option>
<option value="78">Zabrat</option>
<option value="106">Zağulba</option>
<option value="96">Zirə</option>
<option value="89">Zığ</option>
<option value="251">&#199;ilov</option>
<option value="65">&#199;i&#231;ək</option>
<option value="108">Şağan</option>
<option value="107">Şimal DRES</option>
<option value="71">Şubani</option>
<option value="110">Ş&#252;vəlan</option>
<option value="80">Şərq</option>
<option value="100">Əhmədli</option>
<option value="24">Ələt</option>
<option value="72">Əmircan</option>
<option value="301">Qara şəhər</option>
<option value="302">Şıxov</option>
<option value="303">Şuşa</option>
<option value="304">Xaşaxuna</option>
<option value="305">Pirallahı</option>
<option value="306">Papanin</option>
<option value="307">N&#252;bar</option>
<option value="308">Ağ şəhər</option>
<option value="309">28 may</option>
<option value="310">Albalı</option>
<option value="311">Atyalı</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-xs-4 control-label">Nişangah</label>
                                    <div class="col-xs-8">
                                        <select class="bs-select form-control select2me" data-placeholder="Nişangahı seçin..." data-style="purple" id="orientmark" multiple="multiple" name="orientmark"><option value="30">Axundov bağı  </option>
<option value="31">Ayna Sultanova heykəli </option>
<option value="182">Azadlıq meydanı  </option>
<option value="174">Azneft meydanı  </option>
<option value="159">Azərbaycan Dillər Universiteti </option>
<option value="173">Azərbaycan kinoteatrı  </option>
<option value="162">Azərbaycan turizm institutu </option>
<option value="246">Ağ şəhər  </option>
<option value="166">Bakı Asiya Universiteti </option>
<option value="164">Bakı D&#246;vlət Universiteti </option>
<option value="163">Bakı Musiqi Akademiyası </option>
<option value="165">Bakı Slavyan Universiteti </option>
<option value="156">Bayıl parkı  </option>
<option value="168">Beşmərtəbə   </option>
<option value="157">Botanika bağı  </option>
<option value="180">Cavanşir k&#246;rp&#252;s&#252;  </option>
<option value="153">Dağ&#252;st&#252; parkı  </option>
<option value="176">Dostluq kinoteatrı  </option>
<option value="170">D&#246;vlət Statistika Komitəsi </option>
<option value="247">D&#246;vlət Statistika Komitəsini </option>
<option value="146">D&#246;vlət İdarə&#231;ilik Akademiyası </option>
<option value="151">Fontanlar bağı  </option>
<option value="29">H&#252;seyn Cavid parkı </option>
<option value="196">Keşlə bazarı  </option>
<option value="25">Koala parkı  </option>
<option value="137">M.H&#252;seynzadə parkı  </option>
<option value="27">M.Ə.Sabir parkı  </option>
<option value="155">Malokan bağı  </option>
<option value="141">Memarlıq və İnşaat Universiteti</option>
<option value="161">Milli Konservatoriya  </option>
<option value="132">Montin bazarı  </option>
<option value="167">Mərkəzi Univermaq  </option>
<option value="178">Neapol dairəsi  </option>
<option value="139">Neft Akademiyası  </option>
<option value="187">Neft&#231;i bazası  </option>
<option value="175">Nizami kinoteatrı  </option>
<option value="26">Nəriman Nərimanov parkı </option>
<option value="32">Nərimanov heykəli  </option>
<option value="189">Nəsimi bazarı  </option>
<option value="133">Park Zorge  </option>
<option value="145">Pedaqoji Universiteti  </option>
<option value="148">Prezident parkı  </option>
<option value="150">Qubernator parkı  </option>
<option value="152">Qış parkı  </option>
<option value="191">Respublika stadionu  </option>
<option value="177">Rusiya səfirliyi  </option>
<option value="160">Rəssamlıq Akademiyası  </option>
<option value="154">Sahil bağı  </option>
<option value="134">Sevil Qazıyeva parkı </option>
<option value="183">Sirk   </option>
<option value="169">Sovetski   </option>
<option value="181">Space TV  </option>
<option value="28">Səməd Vurğun parkı </option>
<option value="186">TQDK   </option>
<option value="140">Texniki Universiteti  </option>
<option value="142">Tibb Universiteti  </option>
<option value="192">Təhsil Nazirliyi  </option>
<option value="179">Ukrayna dairəsi  </option>
<option value="193">Xal&#231;a Muzeyi  </option>
<option value="188">Yasamal bazarı  </option>
<option value="135">Zabitlər parkı  </option>
<option value="136">Zoopark   </option>
<option value="158">Zərifə Əliyeva adına park</option>
<option value="171">İdman kompleksi  </option>
<option value="144">İncəsənət və Mədəniyyət Un.</option>
<option value="143">İqsadiyyat Universiteti  </option>
<option value="138">İzmir parkı  </option>
<option value="172">İ&#231;əri Şəhər  </option>
<option value="185">Şəfa stadionu  </option>
<option value="184">Şəhidlər xiyabanı  </option>
<option value="147">Şəlalə parkı  </option>
<option value="301">28 Mall</option>
<option value="302">Puşkin parkı</option>
<option value="303">ABŞ səfirliyi</option>
<option value="304">Absheron Marriott otel</option>
<option value="305">ADA universiteti</option>
<option value="306">AF Business House</option>
<option value="307">AGA Business Center</option>
<option value="308">AMAY</option>
<option value="309">Ambassador otel</option>
<option value="310">ANS</option>
<option value="311">Araz kinoteatrı</option>
<option value="312">ATV</option>
<option value="313">Aviasiya Akademiyası</option>
<option value="314">Avropa otel</option>
<option value="315">Aygun City</option>
<option value="316">AZTV</option>
<option value="317">Babək Plaza</option>
<option value="318">Bakı univermağı</option>
<option value="319">Binə ticarət mərkəzi</option>
<option value="320">Bridge Plaza</option>
<option value="321">C.Cabbarlı heykəli</option>
<option value="322">Caspian Plaza</option>
<option value="323">Caspian Shopping Center</option>
<option value="324">&#199;ıraq Plaza</option>
<option value="325">Crystal Plaza</option>
<option value="326">Dalğa Plaza</option>
<option value="327">Daxili İşlər Nazirliyi</option>
<option value="328">Dədə Qorqud parkı</option>
<option value="329">Dəmir&#231;i Plaza</option>
<option value="330">Dənizkənarı Milli park</option>
<option value="331">Ekologiya və Təbii Sərvətlər Nazirliyi</option>
<option value="332">Elit ticarət mərkəzi</option>
<option value="333">Energetika Nazirliyi</option>
<option value="334">Fairmont otel</option>
<option value="335">Four Seasons otel</option>
<option value="336">F&#246;vqəladə Hallar Nazirliyi</option>
<option value="337">Fəvvarələr meydanı</option>
<option value="338">Gənclər və İdman Nazirliyi</option>
<option value="339">Heydər Əliyev Sarayı</option>
<option value="340">Heydər Əliyev Mərkəzi</option>
<option value="341">Hilton otel</option>
<option value="342">Hyatt Regency</option>
<option value="343">Hərbi Hospital</option>
<option value="344">İctimai tv</option>
<option value="345">İnşaat Universiteti</option>
<option value="346">İqtisadi İnkişaf Nazirliyi</option>
<option value="347">ISR Plaza</option>
<option value="348">Kooperasiya Universiteti</option>
<option value="349">Landmark</option>
<option value="350">Lider tv</option>
<option value="351">Maliyyə Nazirliyi</option>
<option value="352">Metropark</option>
<option value="353">Montin adına park</option>
<option value="354">Moskva univermağı</option>
<option value="355">M&#252;dafiə Sənayesi Nazirliyi</option>
<option value="357">Musabəyov parkı</option>
<option value="358">Nargiz ticarət mərkəzi</option>
<option value="359">Nəqliyyat Nazirliyi</option>
<option value="360">Nəsimi heykəli</option>
<option value="361">Odlar Yurdu Universiteti</option>
<option value="362">Olimpia Stadionu</option>
<option value="363">Park Bulvar</option>
<option value="364">Park Inn</option>
<option value="365">Port Baku</option>
<option value="366">Qafqaz Resort otel</option>
<option value="367">Qafqaz Universiteti</option>
<option value="368">Qələbə dairəsi</option>
<option value="369">Qərb Universiteti</option>
<option value="370">Rabitə və Y&#252;ksək Texnologiyalar Nazirliyi</option>
<option value="371">Sevinc kinoteatrı</option>
<option value="372">Ş&#252;vəlan ticarət mərkəzi</option>
<option value="373">Sədərək ticarət mərkəzi</option>
<option value="374">Səhiyyə Nazirliyi</option>
<option value="375">Şərq Bazarı</option>
<option value="376">Tofiq Bəhramov stadionu</option>
<option value="377">T&#252;rkiyə səfirliyi</option>
<option value="378">Təfəkk&#252;r Universiteti</option>
<option value="379">Təzə bazar</option>
<option value="380">Vergilər Nazirliyi</option>
<option value="381">Vətən kinoteatrı</option>
<option value="382">World Business Center</option>
<option value="383">Xarici İşlər Nazirliyi</option>
<option value="384">Xəqani ticarət mərkəzi</option>
<option value="385">Xəzər Universiteti</option>
<option value="386">Yasamal parkı</option>
<option value="387">Yaşıl bazar</option>
<option value="388">Ədliyyə Nazirliyi</option>
<option value="389">Əmək və Əhalinin Sosial M&#252;dafiəsi Nazirliyi</option>
<option value="390">Megafun</option>
</select>

                                    </div>
                                </div>
                            
                            
<!-- nomre uzre axtaris -->
<div class="form-group col-sm-12">
<label class="col-md-4 col-xs-3 control-label">Mob. Nömrə</label>
<div class="col-md-8 col-xs-9 ">
<input class="form-control priceInput btn-outline-danger mobHm" data-val="true" data-val-number="Mobil nomre uzre." id="mobHm" name="minPrice" placeholder="Mob. nömrəsi" type="text" value="" />
</div>
</div>
<!--son-->
 <!-- sahibkar uzre axtaris -->
<div class="form-group col-sm-12">
<label class="col-md-4 col-xs-3 control-label">Sahibkar</label>
<div class="col-md-8 col-xs-9">
<input class="form-control priceInput btn-outline-info makHm" data-val="true" data-val-number="The field minArea must be a number." id="" name="minArea" placeholder="Sahibkarın adı" type="text" value="" />
</div>
</div>                                
<!--son-->
</div>                      
                            <div class="col-sm-6">
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

                                <div class="form-group col-sm-12" id="certificateColumn">
                                    <label class="col-xs-4  control-label">Sənəd</label>
                                    <div class="col-xs-8 ">
                                        <select class="bs-select form-control  documnetSelect" data-placeholder="Kupçalı olub olmadığını seçin..." id="documentType" name="documentType"><option value="0">Kup&#231;alı</option>
<option value="1">Kup&#231;asız</option>
<option selected="selected" value="-1">Hamısı</option>
</select>
                                        <!--<span class="help-block">A block of help text. </span>-->
                                    </div>
                                </div>


                                <div class="form-group col-sm-12" id="loanColumn">
                                    <label class="col-xs-4  control-label">Kredit şərti</label>
                                    <div class="col-xs-8 ">
                                        <select class="bs-select form-control  loanSelect" data-placeholder="Kredit şərtini seçin..." id="loanType" name="loanType"><option value="0">Kreditlə</option>
<option value="1">Kreditsiz</option>
<option selected="selected" value="-1">Hamısı</option>
</select>
<!--<span class="help-block">A block of help text. </span>-->
</div>
</div>    
                                
<div class="form-group col-sm-12" id="roomColumn">
                                    <label class="col-xs-4 control-label">Otaq sayı</label>
                                    <div class="col-xs-8">
                                        <div class="btn-group rooms" data-toggle="buttons">
                                            <label class="btn btn-default   ">
                                                <input autocomplete="off" data-val="true" data-val-required="The oneRoom field is required." id="oneRoom" name="oneRoom" type="checkbox" value="true" /><input name="oneRoom" type="hidden" value="false" /> 1
                                            </label>
                                            <label class="btn btn-default   ">
                                                <input autocomplete="off" data-val="true" data-val-required="The twoRoom field is required." id="twoRoom" name="twoRoom" type="checkbox" value="true" /><input name="twoRoom" type="hidden" value="false" /> 2
                                            </label>
                                            <label class="btn btn-default   ">
                                                <input autocomplete="off" data-val="true" data-val-required="The threeRoom field is required." id="threeRoom" name="threeRoom" type="checkbox" value="true" /><input name="threeRoom" type="hidden" value="false" /> 3
                                            </label>
                                            <label class="btn btn-default   ">
                                                <input autocomplete="off" data-val="true" data-val-required="The fourRoom field is required." id="fourRoom" name="fourRoom" type="checkbox" value="true" /><input name="fourRoom" type="hidden" value="false" /> 4
                                            </label>
                                            <label class="btn btn-default   ">
                                                <input autocomplete="off" data-val="true" data-val-required="The fiveMoreRoom field is required." id="fiveMoreRoom" name="fiveMoreRoom" type="checkbox" value="true" /><input name="fiveMoreRoom" type="hidden" value="false" /> 5 və artıq
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12" id="roomRemadeColumn">
                                    <label class="col-xs-4  control-label">D&#252;zəlmə</label>
                                    <div class="col-xs-8 ">
                                        <select class="bs-select form-control remakeType" data-placeholder="Düzəlmə olub olmadığını seçin..." id="remakeType" name="remakeType"><option value="0">D&#252;zəlməsiz</option>
<option value="1">Ancaq d&#252;zəlmə</option>
<option selected="selected" value="-1">Hamısı</option>
</select>
                                        <!--<span class="help-block">A block of help text. </span>-->
                                    </div>
                                </div>


                                <div class="form-group col-sm-12" id="floorColumn">
                                    <label class="col-md-4  control-label" id="floorLabelForNonTouch">Mərtəbə</label>
                                    <div class="col-md-8" id="floorContentForNonTouch">
                                        <div id="slider-range" class="slider bg-blue">
                                        </div>
                                        <div>
                                            <label id="slider-range-amount"></label>
                                        </div>
                                    </div>
                                    <label class="col-md-4 col-xs-3 control-label" id="floorLabelForTouch">Mərtəbə</label>
                                    <div class="col-md-8 col-xs-9 " id="floorContentForTouch">
                                        <select id="minFloor" name="minFloor" class="bs-select form-control input-xsmall select2" data-style="btn-default btn-outline-success">
                                            
                                            <option selected>1</option>
                                            
                                            <option >2</option>
                                            
                                            <option >3</option>
                                            
                                            <option >4</option>
                                            
                                            <option >5</option>
                                            
                                            <option >6</option>
                                            
                                            <option >7</option>
                                            
                                            <option >8</option>
                                            
                                            <option >9</option>
                                            
                                            <option >10</option>
                                            
                                            <option >11</option>
                                            
                                            <option >12</option>
                                            
                                            <option >13</option>
                                            
                                            <option >14</option>
                                            
                                            <option >15</option>
                                            
                                            <option >16</option>
                                            
                                            <option >17</option>
                                            
                                            <option >18</option>
                                            
                                            <option >19</option>
                                            
                                            <option >20</option>
                                            
                                            <option >21</option>
                                            
                                            <option >22</option>
                                            
                                            <option >23</option>
                                            
                                            <option >24</option>
                                            
                                            <option >25</option>
                                            
                                            <option >26</option>
                                            
                                            <option >27</option>
                                            
                                            <option >28</option>
                                            
                                            <option >29</option>
                                            
                                            <option >30</option>
                                            
                                            <option >31</option>
                                        </select>

                                        <select id="maxFloor" name="maxFloor" class="bs-select form-control input-xsmall select2" data-style="btn-default btn-outline-success">
                                            
                                            <option >1</option>
                                            
                                            <option >2</option>
                                            
                                            <option >3</option>
                                            
                                            <option >4</option>
                                            
                                            <option >5</option>
                                            
                                            <option >6</option>
                                            
                                            <option >7</option>
                                            
                                            <option >8</option>
                                            
                                            <option >9</option>
                                            
                                            <option >10</option>
                                            
                                            <option >11</option>
                                            
                                            <option >12</option>
                                            
                                            <option >13</option>
                                            
                                            <option >14</option>
                                            
                                            <option >15</option>
                                            
                                            <option >16</option>
                                            
                                            <option >17</option>
                                            
                                            <option >18</option>
                                            
                                            <option >19</option>
                                            
                                            <option >20</option>
                                            
                                            <option >21</option>
                                            
                                            <option >22</option>
                                            
                                            <option >23</option>
                                            
                                            <option >24</option>
                                            
                                            <option >25</option>
                                            
                                            <option >26</option>
                                            
                                            <option >27</option>
                                            
                                            <option >28</option>
                                            
                                            <option >29</option>
                                            
                                            <option >30</option>
                                            
                                            <option selected>31</option>
                                        </select>
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

                                <div class="form-group col-sm-12" id="buildinFloorsColumn">
                                    <label class="col-md-4 col-xs-3 control-label">Binanın mərtəbə sayı</label>
                                    <div class="col-md-8 col-xs-9 ">
                                        <select id="minBuildingFloors" name="minBuildingFloors" class="bs-select form-control input-xsmall select2" data-style="btn-default ">
                                                
                                                <option selected>1</option>
                                                
                                                <option >2</option>
                                                
                                                <option >3</option>
                                                
                                                <option >4</option>
                                                
                                                <option >5</option>
                                                
                                                <option >6</option>
                                                
                                                <option >7</option>
                                                
                                                <option >8</option>
                                                
                                                <option >9</option>
                                                
                                                <option >10</option>
                                                
                                                <option >11</option>
                                                
                                                <option >12</option>
                                                
                                                <option >13</option>
                                                
                                                <option >14</option>
                                                
                                                <option >15</option>
                                                
                                                <option >16</option>
                                                
                                                <option >17</option>
                                                
                                                <option >18</option>
                                                
                                                <option >19</option>
                                                
                                                <option >20</option>
                                                
                                                <option >21</option>
                                                
                                                <option >22</option>
                                                
                                                <option >23</option>
                                                
                                                <option >24</option>
                                                
                                                <option >25</option>
                                                
                                                <option >26</option>
                                                
                                                <option >27</option>
                                                
                                                <option >28</option>
                                                
                                                <option >29</option>
                                                
                                                <option >30</option>
                                                
                                                <option >31</option>
                                        </select>

                                        <select id="maxBuildingFloors" name="maxBuildingFloors" class="bs-select form-control input-xsmall select2" data-style="btn-default ">
                                                
                                                <option >1</option>
                                                
                                                <option >2</option>
                                                
                                                <option >3</option>
                                                
                                                <option >4</option>
                                                
                                                <option >5</option>
                                                
                                                <option >6</option>
                                                
                                                <option >7</option>
                                                
                                                <option >8</option>
                                                
                                                <option >9</option>
                                                
                                                <option >10</option>
                                                
                                                <option >11</option>
                                                
                                                <option >12</option>
                                                
                                                <option >13</option>
                                                
                                                <option >14</option>
                                                
                                                <option >15</option>
                                                
                                                <option >16</option>
                                                
                                                <option >17</option>
                                                
                                                <option >18</option>
                                                
                                                <option >19</option>
                                                
                                                <option >20</option>
                                                
                                                <option >21</option>
                                                
                                                <option >22</option>
                                                
                                                <option >23</option>
                                                
                                                <option >24</option>
                                                
                                                <option >25</option>
                                                
                                                <option >26</option>
                                                
                                                <option >27</option>
                                                
                                                <option >28</option>
                                                
                                                <option >29</option>
                                                
                                                <option >30</option>
                                                
                                                <option selected>31</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="col-md-4 col-xs-3 control-label">Qiymət</label>
                                    <div class="col-md-8 col-xs-9 ">
                                        <input class="form-control priceInput btn-outline-danger" data-val="true" data-val-number="The field minPrice must be a number." id="minPrice" name="minPrice" placeholder="min" type="text" value="" />

                                        <input class="form-control priceInput btn-outline-danger" data-val="true" data-val-number="The field maxPrice must be a number." id="maxPrice" name="maxPrice" placeholder="max" type="text" value="" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" id="areaColumn">
                                    <label class="col-md-4 col-xs-3 control-label">Sahəsi (m2)</label>
                                    <div class="col-md-8 col-xs-9">
                                        <input class="form-control priceInput btn-outline-info" data-val="true" data-val-number="The field minArea must be a number." id="minArea" name="minArea" placeholder="min" type="text" value="" />

                                        <input class="form-control priceInput btn-outline-info" data-val="true" data-val-number="The field maxArea must be a number." id="maxArea" name="maxArea" placeholder="max" type="text" value="" />
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 hidden" id="parcelAreaColumn">
                                    <label class="col-md-4 col-xs-3 control-label">Torpaq sahəsi (sot)</label>
                                    <div class="col-md-8 col-xs-9">
                                        <input class="form-control priceInput btn-outline-primary" data-val="true" data-val-number="The field minParcelArea must be a number." id="minParcelArea" name="minParcelArea" placeholder="min" type="text" value="" />

                                        <input class="form-control priceInput btn-outline-primary" data-val="true" data-val-number="The field maxParcelArea must be a number." id="maxParcelArea" name="maxParcelArea" placeholder="max" type="text" value="" />
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>


                    <div class="form-actions noborder" id="list">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-3">
                                <div id="anchor"></div>
                                <button type="submit" onclick="$('#adsDateCat').val('All');" class="btn btn-lg btn-block green-sharp" id="search" name="search"><i class="fa fa-search"></i> Axtar </button>
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
        
        

                        
                        <br/><br/><br/><br/><br/><br/>
                        
                        
                        
                        
                        
                        
                        
                        
<div class="x_content">
    <div class="row">
                        
                        
                        <form class="form-horizontal form-label-left formFinder" novalidate="" method="get">

                            <input type="hidden" name="page" value="{{ $request->get("page",1) }}">
                            <div class="form-group">
                                <label class="control-label col-md-2">Elanlar</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="announcement">
                                        <option value="1" {{ $request->get('announcement', 1) == 1 ? 'selected' : '' }}>Fərdi əlavə</option>
                                        <option value="2" {{ $request->get('announcement', 1) == 2 ? 'selected' : '' }}>Saytlardan elanlar</option>
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Tarix</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input style="display: inline-block;width: 90%;" type="text" name="date" value="{{ $request->get('date', '') }}" class="form-control daterange"/>
                                        <div style="display: inline-block;padding-top: 5px;" data-toggle="tooltip" data-original-title="Tarixi nəzərə al">
                                            <input type="checkbox" name="dateChk" {{ $request->get('dateChk') ? 'checked' : '' }} class="flat" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Kategoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('type')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Agent (user)</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="user">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\User::realUsers()->get() as $type)
                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get('user')? 'selected':'' }}> {{ $type->fullname() }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Elanın Tipi</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="buldingType">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$buldingType as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('buldingType')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Təmiri</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="repairing">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$repairingTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('repairing')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sənədin Tipi</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="documentType">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$documentTypes as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('documentType')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Şəhər</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,20" name="city" class="form-control" value="{{ $request->get('city') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Dəyəri</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="amount1" value="{{ $request->get('amount1') }}" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" class="form-control" name="amount2" value="{{ $request->get('amount2') }}" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Header</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,200" name="header" {{ $request->get('header') }} class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sahə</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" name="area1" value="{{ $request->get('area1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" name="area2" value="{{ $request->get('area2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Sahibkar</label>
                                <div class="col-md-4">
                                    <input type="text" data-validate-length-range="0,40" name="owner" value="{{ $request->get('owner') }}" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Otaq</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" data-validate-minmax=",255" name="roomCount1" value="{{ $request->get('roomCount1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" data-validate-minmax=",255" name="roomCount2" value="{{ $request->get('roomCount2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Nömrə</label>
                                <div class="col-md-4">
                                    <input type="text" name="mobnom" value="{{ $request->get('mobnom') }}" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mərtəbə</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" data-validate-minmax=",30000" name="floorCount1" value="{{ $request->get('floorCount1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" data-validate-minmax=",30000" name="floorCount2" value="{{ $request->get('floorCount2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Metro</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="metro">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Models\MskMetro::all() as $type)
                                            <option value="{{ $type['id'] }}" {{ $type['id'] == $request->get('metro')? 'selected':'' }}> {{ $type['name'] }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Yer m.</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="number" name="locatedFloor1" value="{{ $request->get('locatedFloor1') }}" class="form-control" placeholder="Minimum">
                                        <span class="input-group-addon">-</span>
                                        <input type="number" name="locatedFloor2" value="{{ $request->get('locatedFloor2') }}" class="form-control" placeholder="Maksimum">
                                    </div>
                                </div>

                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="status">
                                        <option value="">Hamısı</option>
                                        @foreach (\App\Library\MyClass::$buttonStatus2 as $typeK => $type)
                                            <option value="{{ $typeK }}" {{ $typeK == $request->get('status')? 'selected':'' }}> {{ $type }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Çeşidləmə</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="sort" required="">
                                        <option value="1" {{ $request->get('announcement', 1) == 1 ? 'selected' : '' }}>Tarixə görə - yuxarıdan</option>
                                        <option value="2" {{ $request->get('announcement', 1) == 2 ? 'selected' : '' }}>Tarixə görə - aşagıdan</option>
                                        <option value="3" {{ $request->get('announcement', 1) == 3 ? 'selected' : '' }}>Dəyərə görə - yuxarıdan</option>
                                        <option value="4" {{ $request->get('announcement', 1) == 4 ? 'selected' : '' }}>Dəyərə görə - aşagıdan</option>
                                        <!--<option value="5">Sahəyə görə - yuxarıdan</option>-->
                                        <!--<option value="6">Sahəyə görə - aşagıdan</option>-->
                                    </select>
                                </div>

                                <label class="control-label col-md-2">Content</label>
                                <div class="col-md-4">
                                    <textarea class="resizable_textarea form-control" placeholder="Content" name="content" style="border-radius: 5px; height: 200px;">{{ $request->get('content') }}</textarea>
                                </div>
                            </div>

                            <button type="submit" onclick="$('[name=page]').val(1);" class="btn btn btn-round btn-success" style="margin-top: 30px; width: 75%; height: 65px; font-size: 22px; font-weight: bold; margin-left: 15%;"><i class="fa fa-search"></i> Bazada Axtar</button>

                        </form>

                    </div>
                </div>

                <!-- end x-content -->

                <div class="content">

                    <div class="row">

                        <div class="col-md-12 text-center">

                            <form class="">
                                <table class="table table-striped">

                                    <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Başlıq</th>

                                        <th>Content</th>

                                        <th>Kategoria</th>

                                        <th>Elanın Tipi</th>

                                        <th>Qiymət</th>

                                        <th>Tarix</th>

                                        <th>Sahibkar</th>

                                        <th>Əməliyyatlar</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach ($announcements as $announcement )

                                        <!-- <tr style="{{ $announcement->buldingType==2?'background-color:#9fd4ef':'background-color:red' }}"> -->

                                        <tr>

                                            <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }}</td>

                                            <td>{{ $announcement->header }}</td>

                                            <td>{{ $announcement->getShortContent() }}</td>

                                            <td>{{ $announcement->getAnnouncementType() }}</td>

                                            <td>{{ $announcement->getBuldingType() }}</td>

                                            <td>{{ $announcement->amount }}</td>

                                            <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>

                                            <td>{{ $announcement->owner }}</td>

                                            <th>
                                                <a style="width: 24px;" href="{{ $request->get('announcement', 1) == 1 ? route('announcement_pro_info',['announcement'=>$announcement->id]) : route('announcement_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
                                            </th>

                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>

                            </form>

                        </div>

                    </div>

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

    <!-- bootstrap-daterangepicker -->
    {!! Html::style('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- iCheck -->
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection



@section('scripts')

    

    {!! Html::script('admin/assets/vendors/validator/validator.js') !!}
    <!-- bootstrap-daterangepicker -->
    {!! Html::script('admin/assets/vendors/moment/moment.min.js') !!}
    {!! Html::script('admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- iCheck -->
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

    <script>
        $(function () {
            $('input.daterange').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD-MM-YYYY'
                },
            });

            if( "{{ $request->get('page','') }}" != "" )
            {
                $(".collapse-link").click();
            }
        });
    </script>
@endsection

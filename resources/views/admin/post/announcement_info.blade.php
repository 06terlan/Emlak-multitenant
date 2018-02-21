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
    <form autocomplete="off" class="form-horizontal form-label-left" novalidate=""  method="post">
        <!-- css -->
        <style>
        /* Effect 7 */
            
            .headrBox {
                height: 50px !important;
                padding: 0rem 10px !important;
                background-color: #fff !important;
                border: 1px solid #23bbd2 !important;
            }
            
            .leftBox {
                height: 350px !important;
                padding: 0rem 10px !important;
                margin-top: 15px;
                background-color: #fff !important;
                border: 1px solid #23bbd2 !important;
            }
            
            .rightBox {
                height: 530px !important;
                padding: 0rem 10px !important;
                margin-top: 15px;
                background-color: #fff !important;
                border: 1px solid #23bbd2 !important;
            }
            
            .footerBox {
                height: 50px !important;
                padding: 0rem 10px !important;
                margin-top: 15px;
                background-color: #fff !important;
                border: 1px solid #23bbd2 !important;
            }

            .effect7 {
              position: relative;
              /*-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
              -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
              box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;*/
              /*-webkit-box-shadow: 0px 1px 5px 0.5px #99e4da;
              -moz-box-shadow: 0px 1px 5px 0.5px #99e4da;
              box-shadow: 0px 1px 5px 0.5px #99e4da;
              -o-box-shadow: 0px 1px 5px 0.5px #99e4da;*/
            }

            .effect7:before,
            .effect7:after {
              content: "";
              position: absolute;
              z-index: -1;
              -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
              -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
              box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
              top: 0;
              bottom: 0;
              left: 10px;
              right: 10px;
              -moz-border-radius: 100px / 10px;
              border-radius: 100px / 10px;
            }

            .effect7:after {
              right: 10px;
              left: auto;
              -webkit-transform: skew(8deg) rotate(3deg);
              -moz-transform: skew(8deg) rotate(3deg);
              -ms-transform: skew(8deg) rotate(3deg);
              -o-transform: skew(8deg) rotate(3deg);
              transform: skew(8deg) rotate(3deg);
            }
            
            .listClass ul {
                list-style: none;
            }
            
            .listClass ul li {
                display: inline;
                padding: 8px 18px;
                padding: .5rem 1.5rem;
                cursor: pointer;
            }
            .listClass {
                margin: 12.5px 0;
                float: right;
            }
            
            .listClassLeft ul {
                list-style: none;
            }
            
            .listClassLeft ul li {
                display: inline;
                padding: 8px 18px;
                padding: .5rem 1.5rem;
                cursor: pointer;
            }
            
            .listClassLeft {
                margin: 12.5px -35px;
                float: left;
            }
            
            .iconSpan {
                color: #515762;
                font-size: 14px;
                font-weight: 300;
            }
            
            .listClass .fa {
                color: #23bbd2;
                font-size: 18px;
                padding-left: 2px;
            }
            
            .listClassLeft .fa {
                color: #23bbd2;
                font-size: 18px;
                padding-left: 2px;
            }
            
            .headrBox h3 {
                color: #515762;
                padding-left: 15px;
            }
            
            .leftButton {
                width: 100%;
                background: none;
                border: none;
                height: 48px;
            }
            
            .leftButton:hover {
                border-bottom: 3px solid #88c940;
                color: #88c940;
            }
            
            .rightButton {
                width: 100%;
                background: none;
                border: none;
                height: 48px;
                
            }
            
            .rightButton:hover {
                border-bottom: 3px solid #88c940;
                color: #88c940;
            }
            
            .footerBox {
                font-size: 18px;
                color: #23bbd2;
            }
            
            .contentBox {
                height: 100px !important;
                padding: 0rem 10px !important;
                margin-top: 15px;
                background-color: #fff !important;
                border: 1px solid #23bbd2 !important;
            }
            
            .infoPhoto {
                background: url("../../../../public/admin/images/bina.jpg");
                background-size: cover;
                background-color: #eee;
                overflow: hidden;
                height: 345px;
                margin-top: 2px;
            }
            
            .rightBox h4 {
                margin-top: 45px;
                font-size: 1.6rem;
                font-weight: 700;
            }
            
            .imgProfile {
                border: 1px solid none;
                margin-top: 20px;
                width: 90px;
                height: 67.5px;
                background: url("../../../../public/admin/images/logoprof.jpg") no-repeat;
                background-size: cover;
                
            }
            
            .elanBox {
                border: 1px solid none;
                width: 100%;
                height: 30px;
                box-sizing: border-box;
                padding: .5rem 10px;
                font-size: 2rem;
                font-weight: 700;
                border-radius: 3px;
                margin-bottom: 5px;
            }
            
            .elanBoxBig {
                border: 1px solid none;
                width: 100%;
                height: 120px;
                box-sizing: border-box;
                padding: .5rem 10px;
                font-size: 2rem;
                font-weight: 700;
                border-radius: 3px;
                margin-bottom: 5px;
            }
            
            .btnRemove {
                width: 100%;
                text-align: center;
                line-height: 1;
                cursor: pointer;
                -webkit-appearance: none;
                transition: background-color .25s ease-out,color .25s ease-out;
                vertical-align: middle;
                border: 1px solid transparent;
                border-radius: 3px;
                padding: .85em 1em;
                margin: 0 0 16px;
                font-size: 16px;
                font-weight: 500;
                background-color: #ff5a59;
                color: #fff;
            }
            
            .textColorSpan {
                color: #88c940;
            } 
        </style>
        <!-- css end -->
        <!--info melumat -->
        <div class="row">
            
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="headrBox effect7">
                    <!--<h3>Effect 7</h3>-->
                    
                    <div class="row">
                        
                        <div class="col-md-8">
<!--                            <h3>Həyət evi / Villa</h3>-->
                            
                            <div class="listClassLeft">
                                <ul class="">
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-backward"> <span class="iconSpan" >Geriyə</span> </i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-plus"> <span class="iconSpan" >Fərdilərə</span> </i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-link"> <span class="iconSpan" style="padding-right:15px;" >Link</span> </i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                            <span style="font-size:20px; color: #88c940; font-weight: 700;">Həyət evi villa</span>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-4">
                            <div class="listClass">
                                <ul class="">
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-heart-o"> <span class="iconSpan" >Qeyd et</span> </i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-print"> <span class="iconSpan" >Print</span> </i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="">
                                            <i class="fa fa-share-alt"> <span class="iconSpan" style="padding-right:15px;" >Paylaş</span> </i>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <div class="col-sm-12 col-md-8"> <!-- left panel -->
                <div class="leftBox effect7">
                    
                    <!--section #phto-->
                    <div id="photo" class="infoPhoto huseynzade">
                      <h2></h2>
                      <p></p>
                    </div>
                     <!--section #phto end-->
                    
                     <!--section #map-->
                    <div id="map" class="huseynzade" style="display:none">
                      <h2></h2>
                      <p></p> 
                    </div>
                    <!--section #map end-->
                    
                </div>
                
                <div class="footerBox effect7">
                    
                    <div class="col-md-6">
                       <!-- <button style="width:100%">a</button>-->
                        <button class="leftButton" onclick="openHuseynzade('photo')">
                            <i class="fa fa-camera">
                                <span style="color:#515762;">&#0160; Şəkillər </span>
                            </i>
                        </button>
                    </div>
                     
                    <div class="col-md-6">
                            <button class="rightButton" onclick="openHuseynzade('map')">
                                <i class="fa fa-map">
                                    <span style="color:#515762;">&#0160; Xəritə </span>
                                </i>
                            </button>
                    </div>
                    
                </div>
                
                <div class="contentBox effect7">
                    <p style="font-size:16px; padding-left:15px; margin-top:10px; text-indent:1.5em; color: #515762;">Merkezi trasdan 200 metir arali mehemmedi tablosunun yaninan tam yaxinliqinda (qaz isiq su telefon xetti var). Yasayis sahesinin tam ortasidir.Butun alqi satqi senedleri var</p>
                </div>
                
            </div>
            
            <div class="col-sm-12 col-md-4"> <!-- right panel -->
                <div class="rightBox effect7">
                    
                    <div class="col-sm-4 col-md-4 col-xs-12 text-center">
                        <!--<img src="" alt="profilPhoto">-->
                        <div class="imgProfile profile_img"></div>
                    </div>
                    
                    <div class="col-sm-8 col-md-8 col-xs-12">
                        <h4>Huseynzade Mehemmed</h4>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="margin-top:15px; color: #23bbd2">
                        <i class="fa fa-phone fa-2x">
                            <span style="color:#2e3238; font-size: 1.7rem; font-weight: 700;">055 500 00 00</span>
                            <span class="textColorSpan">&#0160; 250000.00</span> <span style="font-size:12px;" >AZN</span>
                        </i>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <p style="margin-top:10px;">5 sot torpaq sahəsi, Məhəmmədli qəs.</p>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">Elanın növü: <span class="textColorSpan">&#0160; Satılır </span></div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">Binanın təmiri: <span class="textColorSpan">&#0160; Orta təmir </span></div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">Metro: <span class="textColorSpan">&#0160; Həzi Aslanov </span></div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">Sənəd: <span class="textColorSpan">&#0160; Kupça </span></div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBoxBig">
                            Sahə ㎡: <span class="textColorSpan">&#0160; 45 </span> <br>
                            Mərtəbə sayı: <span class="textColorSpan">&#0160; 18 </span> <br>
                            Mərtəbə: <span class="textColorSpan">&#0160; 5 </span> <br>
                            Otaq: <span class="textColorSpan">&#0160; 3 </span>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">
                            <i class="fa fa-calendar" style="color:#23bbd2"></i> Tarix: <span class="textColorSpan">&#0160; 08.05.2018 </span>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                        <div class="elanBox">
                            <button class="btnRemove">Elanı sil</button>
                        </div>
                    </div>

                </div>
            </div>
            
            </div>
        
        <script>
            function openHuseynzade(huseynzadeName) {
                var i;
                var x = document.getElementsByClassName("huseynzade");
                for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";  
                }
                document.getElementById(huseynzadeName).style.display = "block";  
            }
        </script>
            
        <!--info melumat end -->
        
        <div class="ln_solid"></div>
    </form>
</div>
    
        </div>
    </div>
</div>

@endsection
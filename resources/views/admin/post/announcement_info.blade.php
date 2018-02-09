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
                        
<!--new info version -->
    <div class="lot-layout"><div class="photos">
    <div class="l-center">
    <div class="advanced-view">
    <div class="large olcuweb">
    <a title="Böyüt" class="large-photo" href="../../assets/build/img/logo.jpg">
    <img alt="" src="../../assets/build/img/logo.jpg" /></a></div>
    <div class="largeweb olcuweb">
    <div class="thumbnails" data-count="9"><a href=""><img alt="Bizim website" src="../../assets/build/img/logo.jpg" /></a></div>
    </div></div></div></div>
    
    <div class="lot-header fixed-product-info"><div class="l-center">
        
    <div class="price-container"><div class="price"><div class="middle">
        
    <span class="price-val">{{ $announcement->amount }}</span>
        
    <span class="price-cur">AZN</span></div></div></div>
    
    <div class="title-container">
        
    <h1>{!! $announcement->header !!}</h1>
        
    <div class="services-container">
    
    <ul class="services">
    
    <li class="services-i-container action bump"><a id="set_bumped" class="services-i geriye" href="{{ url()->previous() }}">Geriyə</a></li>
    <li class="services-i-container action bump"><a id="set_bumped" class="services-i linkde" href="{{ $announcement->link }}">Link</a></li>
        
    <li class="services-i-container action vip">
        
    <a id="set_vipped" class="services-i mapX services-i_activated" href="#">Xəritədə bax</a></li>
        
    <li class="services-i-container action feature">
        
    <a id="set_featured" class="services-i paylash" href="#">Elan ver<div class="services-i-price">
        
    <span class="price-val">website.az</span>
        
    <span class="price-cur">da</span></div></a></li></ul></div></div></div></div>
    
    <div class="lot-body l-center">
    
    <div class="aside-page fixed-product-info">
    
    <ul class="actions">
    
    <li class="action edit">
        <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}">Fərdilərə əlavə et</a>
    </li>
    <li class="action delete">
    
    <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}">Elanı sil</a></li></ul><div class="author">
    
    <div class="contact contact-phone"></div>
     @foreach ($announcement['numbers'] as $typeK => $num)
    <a class="phone" data-register-call="true" href="{{ $num['number'] }}">
        <div class="numb">
        {{ $num['number'] }}
        </div>
    @endforeach    
    </a>
    
    <div class="name">{{ $announcement->owner }}</div>
    
    <div class="contact all-lots">
        <a href="">{!! \App\Library\MyHelper::getMakler($num['pure_number']) !!}</a>
    </div>
    
    </div>
    
    <div class="lot-info">
        <p>Elanın nömrəsi: 10 </p><p>Baxışların sayı: 607</p><p>Tarix:  {{ \App\Library\Date::d($announcement->date, "d-m-Y") }}</p>
    </div>
    
    <div class="bookmarking"><i class="fa fa-thumb-tack"></i> 
        <a class="add_bookmark" data-remote="true" rel="nofollow" data-method="put" href=""> <span> Seçilmişlərə əlavə et</span></a>
    </div>
    
    </div>
    
    <div class="lot-right"><div class="lot-text">
        
    <table class="properties"><tr class="property"><td class="property-name">Şəhər</td><td class="property-value">Bakı</td></tr>
        
    <tr class="property"><td class="property-name">Obyektin növü</td><td class="property-value">Satılır</td></tr>
        
    <tr class="property"><td class="property-name">Binanın tipi</td><td class="property-value">Yeni tikili</td></tr>   
         
    <tr class="property"><td class="property-name">Elanın növü</td><td class="property-value">{{ $announcement->getBuldingType() }}</td></tr>     
    <tr class="property"><td class="property-name">Rayon</td><td class="property-value">Satılır</td></tr>
        
    <tr class="property"><td class="property-name">Metro</td><td class="property-value">Satılır</td></tr>
        
    <tr class="property"><td class="property-name">Qəsəbə</td><td class="property-value">Satılır</td></tr>
        
    <tr class="property"><td class="property-name">Nişangah</td><td class="property-value">Satılır</td></tr>

    <tr class="property"><td class="property-name">Satıcının tipi</td><td class="property-value">Satılır</td></tr>
    
    <tr class="property"><td class="property-name">Binanın təmiri</td><td class="property-value">4</td></tr>
        
    <tr class="property"><td class="property-name">Sahə, m²</td><td class="property-value">190</td></tr>
        
    <tr class="property"><td class="property-name">Mərtəbə sayı</td><td class="property-value">4</td></tr>    
    <tr class="property"><td class="property-name">Mərtəbə</td><td class="property-value">4</td></tr>
    <tr class="property"><td class="property-name">Otaq sayı</td><td class="property-value">4</td></tr>
        
    <tr class="property"><td class="property-name">Kredit şərti</td><td class="property-value">Həsən Əliyev küç.</td>
        
    </tr></table><p>{!! $announcement->content !!}</p></div>
        
        

<!--new info version SON -->




                </div>

                <div class="ln_solid"></div>


                </form>

            </div>

        </div>

    </div>

    </div>

@endsection
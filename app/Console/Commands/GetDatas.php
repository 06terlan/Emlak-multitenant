<?php

namespace App\Console\Commands;

use App\Library\SiteComp\SiteComp;
use Illuminate\Console\Command;

//ini
set_time_limit(60 * 45);

class GetDatas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getData:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gettin data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(31);

        #region emlak.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=1',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $this->info(" emlak.az [new_bulding] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=2',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'old_building'
        ]))->getObjectData();
        $this->info(" emlak.az [old_building] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=3',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'house'
        ]))->getObjectData();
        $this->info(" emlak.az [house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //villa
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=10',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'villa'
        ]))->getObjectData();
        $this->info(" emlak.az [villa] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garden_house
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=4',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'garden_house'
        ]))->getObjectData();
        $this->info(" emlak.az [garden_house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //office
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=5',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'office'
        ]))->getObjectData();
        $this->info(" emlak.az [office] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garage
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=6',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'garage'
        ]))->getObjectData();
        $this->info(" emlak.az [garage] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //land
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=7',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'land'
        ]))->getObjectData();
        $this->info(" emlak.az [land] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //object
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=8',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => ['.title a', 0],
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'owner'         => ['.left-bar .seller-data .name-seller', 0],
            'mobnom'        => ['.left-bar .seller-data .phone', 0],
            'type'          => 'object'
        ]))->getObjectData();
        $this->info(" emlak.az [object] count: ".$count." \n");
        $bar->advance();
        unset($count);
        #endregion
        #region vipemlak.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/yeni-tikili',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $this->info(" vipemlak.az [new_bulding] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //old_building
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/kohne-tikili',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'old_building'
        ]))->getObjectData();
        $this->info(" vipemlak.az [old_building] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //house
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/heyet-evi-villa',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'house'
        ]))->getObjectData();
        $this->info(" vipemlak.az [house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //object
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/obyekt-ofis',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'object'
        ]))->getObjectData();
        $this->info(" vipemlak.az [object] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //land
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/torpaq',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'land'
        ]))->getObjectData();
        $this->info(" vipemlak.az [land] count: ".$count." \n");
        $bar->advance();
        unset($count);
        #endregion
        #region bina.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/menziller/yeni-tikili',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $this->info(" vipemlak.az [new_bulding] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //old_building
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/menziller/kohne-tikili',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'old_building'
        ]))->getObjectData();
        $this->info(" vipemlak.az [old_building] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //house
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/evler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'house'
        ]))->getObjectData();
        $this->info(" vipemlak.az [house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //office
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/ofisler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'office'
        ]))->getObjectData();
        $this->info(" vipemlak.az [office] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garden_house
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/baglar',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'garden_house'
        ]))->getObjectData();
        $this->info(" vipemlak.az [garden_house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garage
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/qarajlar',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'garage'
        ]))->getObjectData();
        $this->info(" vipemlak.az [garage] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //land
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/torpaq',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'land'
        ]))->getObjectData();
        $this->info(" vipemlak.az [land] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //object
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/obyektler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'object'
        ]))->getObjectData();
        $this->info(" vipemlak.az [object] count: ".$count." \n");
        $bar->advance();
        unset($count);
        #endregion
        #region tap.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?utf8=%E2%9C%93&keywords=&p[747]=3849',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $this->info(" tap.az [new_bulding] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //old_building
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?utf8=%E2%9C%93&keywords=&p[747]=3850',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'old_building'
        ]))->getObjectData();
        $this->info(" tap.az [old_building] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garden_house
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?utf8=%E2%9C%93&keywords=&q[region_id]=&p[835]=7432',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'garden_house'
        ]))->getObjectData();
        $this->info(" tap.az [garden_house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //house
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?utf8=%E2%9C%93&keywords=&q[region_id]=&p[835]=7431',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'house'
        ]))->getObjectData();
        $this->info(" tap.az [house] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //villa
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?utf8=%E2%9C%93&keywords=&q[region_id]=&p[835]=7433',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'villa'
        ]))->getObjectData();
        $this->info(" tap.az [villa] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //office
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?utf8=%E2%9C%93&keywords=&p[820]=4165',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'office'
        ]))->getObjectData();
        $this->info(" tap.az [office] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //object
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?utf8=%E2%9C%93&keywords=&p[820]=4166',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'object'
        ]))->getObjectData();
        $this->info(" tap.az [object] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //land
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/land',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'land'
        ]))->getObjectData();
        $this->info(" tap.az [land] count: ".$count." \n");
        $bar->advance();
        unset($count);

        //garage
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/garages',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'garage'
        ]))->getObjectData();
        $this->info(" tap.az [garage] count: ".$count." \n");
        $bar->advance();
        unset($count);
        #endregion

    }
}

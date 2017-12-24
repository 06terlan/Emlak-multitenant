<?php

namespace App\Console\Commands;

use App\Library\SiteComp\SiteComp;
use Illuminate\Console\Command;

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
        $bar = $this->output->createProgressBar(3);

        #region emlak.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=1',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [new_bulding] count: ".$count." \n");

        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=2',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'old_building'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [old_building] count: ".$count." \n");

        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=3',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'house'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [house] count: ".$count." \n");

        //villa
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=10',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'villa'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [villa] count: ".$count." \n");

        //garden_house
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=4',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'garden_house'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [garden_house] count: ".$count." \n");

        //office
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=5',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'office'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [office] count: ".$count." \n");

        //garage
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=6',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'garage'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [garage] count: ".$count." \n");

        //land
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=7',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'land'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [land] count: ".$count." \n");

        //object
        $count = (new SiteComp([
            'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=8',
            'objectsDom'    => 'div.ticket-list .ticket',
            'linkDom'       => '.title a',
            'location'      => 'http://emlak.az',
            'headerDom'     => '.panel .title',
            'contentDom'    => '.left-bar .desc',
            'amountDom'     => '.left-bar .price .m',
            'dateDom'       => '.box-panel .date strong',
            'type'          => 'object'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" emlak.az [object] count: ".$count." \n");
        #endregion
        #region vipemlak.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/yeni-tikili',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => 'a',
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [new_bulding] count: ".$count." \n");

        //old_building
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/kohne-tikili',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => 'a',
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'type'          => 'old_building'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [old_building] count: ".$count." \n");

        //house
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/heyet-evi-villa',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => 'a',
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'type'          => 'house'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [house] count: ".$count." \n");

        //object
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/obyekt-ofis',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => 'a',
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'type'          => 'object'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [object] count: ".$count." \n");

        //land
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/torpaq',
            'objectsDom'    => '.indexhold .pranto',
            'linkDom'       => 'a',
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'type'          => 'land'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [land] count: ".$count." \n");
        #endregion
        #region bina.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/menziller/yeni-tikili',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'new_bulding'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [new_bulding] count: ".$count." \n");

        //old_building
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/menziller/kohne-tikili',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'old_building'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [old_building] count: ".$count." \n");

        //house
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/evler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'house'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [house] count: ".$count." \n");

        //office
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/ofisler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'office'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [office] count: ".$count." \n");

        //garden_house
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/baglar',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'garden_house'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [garden_house] count: ".$count." \n");

        //garage
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/qarajlar',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'garage'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [garage] count: ".$count." \n");

        //land
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/torpaq',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'land'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [land] count: ".$count." \n");

        //object
        $count = (new SiteComp([
            'link'          => 'https://bina.az/alqi-satqi/obyektler',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => 'a.item_link',
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'type'          => 'object'
        ]))->getObjectData();
        $bar->advance();
        $this->info(" vipemlak.az [object] count: ".$count." \n");
        #endregion

    }
}

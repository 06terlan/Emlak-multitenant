<?php

namespace App\Console\Commands;

use App\Library\SiteComp\SiteComp;
use Illuminate\Console\Command;

//ini
set_time_limit(60 * 45);

class GetDatas extends Command
{
    const TYPE_ICARE = 1;
    const TYPE_SATISH = 2;

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
        $bar = $this->output->createProgressBar(36);

        #region emlak.az dont
        //new_bulding
        /*$count = (new SiteComp([
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
        $this->info(" \nemlak.az [new_bulding] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [old_building] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [house] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [villa] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [garden_house] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [office] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [garage] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [land] count: ".$count." \n");
        $bar->advance();


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
        $this->info(" \nemlak.az [object] count: ".$count." \n");
        $bar->advance();
       */
        #endregion dont dont

        //----------------------------------------------------------------------------------

        #region vipemlak.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/yeni-tikili-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'new',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [new_bulding TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/yeni-tikili-kiraye',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'new',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [new_bulding TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        //old_building
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/kohne-tikili-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'old',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [old_building TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/kohne-tikili-kiraye',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'old',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [old_building TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        //house
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/heyet-evi-villa-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 .pricecolor',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'house',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [house TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/heyet-evi-villa-kiraye',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'house',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [house TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        //object
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/obyekt-ofis-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 3],
            'mobnom'        => ['#openhalf .infotd2', 4],
            'type'          => 'object',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [object TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/obyekt-ofis-kiraye',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 4],
            'mobnom'        => ['#openhalf .infotd2', 5],
            'type'          => 'object',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => ['#openhalf .infotd2', 1],
            'areaDom'       => ['#openhalf .infotd2', 2],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['#openhalf .infotd100', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['#openhalf .infotd100', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [object TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        //land
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/torpaq-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 3],
            'mobnom'        => ['#openhalf .infotd2', 4],
            'type'          => 'land',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => ['#openhalf .infotd2', 1],
            'placeDom'      => ['#openhalf .infotd100', 1],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['#picsopen a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [land TYPE_SATISH] count: ".$count." \n");
        $bar->advance();
        #endregion

        //----------------------------------------------------------------------------------

        #region bina.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=2&q[leased]=true',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'new',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 2], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.parameters', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.parameters', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [new_bulding TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=2&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'new',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 2], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.parameters', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.parameters', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [new_bulding TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //old_building
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=3&q[leased]=true',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'old',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 2], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.parameters', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.parameters', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [old_building TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=3&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'old',
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 2], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.parameters', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.parameters', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [old_building TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //land
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=9&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'land',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nbina.az [land TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //object
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=10&q[leased]=true',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'object',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.side article', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.side article', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [object TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=10&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'object',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.side article', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.side article', 0]], //
        ]))->getObjectData();
        $this->info(" \nvipemlak.az [object TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //office
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=7&q[leased]=true',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'office',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.side article', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.side article', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [office TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=7&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'office',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => [['.parameters tr', 3], ['td', 1]],
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.side article', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.side article', 0]], //
        ]))->getObjectData();
        $this->info(" \nbina.az [office TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //garden_house
        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=6&q[leased]=true',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'garden_house',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nbina.az [garden_house TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'https://bina.az/items?q[city_id]=&q[category_id]=6&q[leased]=false',
            'objectsDom'    => [['.items_list', 1] , ['.items-i']],
            'linkDom'       => ['a.item_link', 0],
            'location'      => 'https://bina.az',
            'headerDom'     => '.price_header .services-container h1',
            'contentDom'    => '.side article',
            'amountDom'     => '.price .price-val',
            'dateDom'       => '.info .item_info',
            'owner'         => ['.contacts .name', 0],
            'mobnom'        => ['.contacts .phone-container', 0],
            'type'          => 'garden_house',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.parameters tr', 1], ['td', 1]],
            'placeDom'      => ['.badges_block .locations', 0],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.photos .thumbnail'], 'data-mfp-src'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \nbina.az [garden_house TYPE_SATISH] count: ".$count." \n");
        $bar->advance();
        #endregion

        //----------------------------------------------------------------------------------

        #region tap.az
        //new_bulding
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3724&p[747]=3849',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'new',
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => [['.property', 4], ['.property-value', 0]],
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 5], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [new_bulding TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3722&p[747]=3849',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'new',
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => [['.property', 4], ['.property-value', 0]],
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 5], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [new_bulding TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //old_building
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3724&p[747]=3850',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'old',
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => [['.property', 4], ['.property-value', 0]],
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 5], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [old_building TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3722&p[747]=3850',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => 'old',
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => [['.property', 4], ['.property-value', 0]],
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 5], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [old_building TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //garden_house
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7432&p[750]=3870',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'garden_house',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], ////
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [garden_house TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7432&p[750]=3869',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'garden_house',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [garden_house TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //house
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7431&p[750]=3870',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'house',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [house TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7431&p[750]=3869',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'house',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [house TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //villa
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7433&p[750]=3870',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'villa',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [villa TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/houses-villas-cottages?p[835]=7433&p[750]=3869',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'villa',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 4], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [villa TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //office
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?p[820]=4165&p[818]=4163',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'office',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => null,
            'placeDom'      => [['.property', 3], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [office TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?p[820]=4165&p[818]=4162',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'office',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => null,
            'placeDom'      => [['.property', 3], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [office TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

        //object
        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?p[820]=4166&p[818]=4163',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'object',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => null,
            'placeDom'      => [['.property', 3], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [object TYPE_ICARE] count: ".$count." \n");
        $bar->advance();

        $count = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/commercial-real-estate?p[820]=4166&p[818]=4162',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'object',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => null,
            'placeDom'      => [['.property', 3], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => ['function', 'getlocatedFloorTapaz', ['.lot-body .lot-text', 0]], //
            'floorCountDom'     => ['function', 'getFloorCountTapaz', ['.lot-body .lot-text', 0]], //
        ]))->getObjectData();
        $this->info(" \ntap.az [object TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

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
            'type'          => 'land',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => [['.property', 1], ['.property-value', 0]],
            'placeDom'      => [['.property', 2], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [land TYPE_SATISH] count: ".$count." \n");
        $bar->advance();

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
            'type'          => 'garage',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null,
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => null,
            'areaDom'       => null,
            'placeDom'      => null,
            'metroDom'      => ['function', 'getMetroTapaz'],
            'sightDom'       => ['function', 'getSightTapaz'], //
            'imageDom'      => ['function', 'getImagesVipemlak', [['.thumbnails a'], 'href'] ], //
            'districtDom'    => ['function', 'getDistrictTapaz'], //
            'locatedFloorDom'   => null, //
            'floorCountDom'     => null, //
        ]))->getObjectData();
        $this->info(" \ntap.az [garage TYPE_SATISH] count: ".$count." \n");
        $bar->advance();
        #endregion

    }
}

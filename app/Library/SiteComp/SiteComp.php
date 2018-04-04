<?php

namespace App\Library\SiteComp;

use App\Library\DataFunctions\Functions;
use App\Library\Dom\Dom;
use App\Library\ErrorLog;
use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\Announcement;
use App\Models\MskCity;
use App\Models\MskMakler;
use App\Models\Number;
use App\Models\Photo;
use Intervention\Image\Facades\Image;

class SiteComp
{
	private $linkListHtml = null;
	private $errorLog = null;
	private $dom = null;
	public $location = null;
	private $dataArr = null;
	public $pageData = [];

    public function __construct( $dataArr, $debug = false )//$link, $objectsDom, $linkDom, $location, $headerDom, $contentDom, $amountDom, $dateDom)
    {
    	$this->dom = new Dom();
    	$this->errorLog = new ErrorLog("logs/pageErrors.log",500, $debug);
    	$this->location  = $dataArr['location'];
    	$this->dataArr   = $dataArr;

        $this->linkListHtml = $this->dom->file_get_html($dataArr['link']);

        if($this->linkListHtml === false) $this->errorLog->error("[" . $this->location . "] Seife acilmir -> [" . $dataArr['link'] . "]");

        return $this;
    }

    public function __destruct()
    {
        unset($this->dom);
        unset($this->errorLog);
        unset($this->location);
        unset($this->dataArr);
        unset($this->linkListHtml);
    }

    public function getObjectData( $toDay = true )
    {
        $count = 0;
    	$objects = @$this->findEr( $this->linkListHtml, $this->dataArr['objectsDom'] );
        if($objects === null){ $this->errorLog->error("[" . $this->location . "] Obyektler tapilmadi"); return 0; }

    	foreach ($objects as $object)
        {
            $link = @$this->findEr($object, $this->dataArr['linkDom'])->href; //for link
            if($link === null){ $this->errorLog->error("[" . $this->location.$link . "] Link tapilmadi -> [" . $link . "]"); continue; }

            if( Announcement::isLinkExist($this->location.$link) ) break;

            $htmlAlt = $this->dom->file_get_html($this->location.$link);
            if($htmlAlt === null || $htmlAlt === false){ $this->errorLog->error("[" . $this->location.$link . "] Obyek acilmir -> [" . $this->location.$link . "]"); continue; }

            $header     = @$htmlAlt->find( $this->dataArr['headerDom'] )[0]->innertext;
            if($header === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi [headerDom]"); continue; }
            $this->pageData['headerDom'] = $header;

            $content    = @$htmlAlt->find( $this->dataArr['contentDom'] )[0]->innertext;
            if($content === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [contentDom]"); continue; }
            $this->pageData['contentDom'] = $content;

            $amount     = @$htmlAlt->find( $this->dataArr['amountDom'] )[0]->plaintext;
            if($amount === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [amountDom]"); continue; }

            $owner     = @$this->findEr($htmlAlt, $this->dataArr['owner'])->plaintext;
            if($owner === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [owner]"); continue; }

            $mobnom     = @$this->findEr($htmlAlt, $this->dataArr['mobnom'])->plaintext;
            if($mobnom === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [mobnom]"); continue; }

            #region location
            if( $this->dataArr['placeDom'] !== null )
            {
                $placeDom     = @$this->findEr($htmlAlt, $this->dataArr['placeDom'])->plaintext;
                if($placeDom === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [placeDom]"); continue; }
                $this->pageData['placeDom'] = $placeDom;
            }else{
                $placeDom = null;
            }

            $metro = @$this->findEr($htmlAlt, $this->dataArr['metroDom'])['plaintext'];

            $sight = @$this->findEr($htmlAlt, $this->dataArr['sightDom'])['plaintext'];

            $district = ( $metro != null ?  MyClass::$metros[$metro][2]['district'] : @$this->findEr($htmlAlt, $this->dataArr['districtDom'])['plaintext'] );

            $city     = ( $metro!=null ? MyClass::$metros[$metro][2]['city'] : ( $district != null ? MyClass::$district[$district][2]['city'] : @$this->findEr($htmlAlt, $this->dataArr['cityDom'])['plaintext'] ) );
            if($city === null || $city == 0){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [cityDom]"); continue; }
            #endregion

            if( $this->dataArr['imageDom'] !== null )
            {
                $imageDom     = @$this->findEr($htmlAlt, $this->dataArr['imageDom']);
                if($imageDom === []){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [imageDom]"); continue; }
            }else{
                $imageDom = [];
            }

            if( $this->dataArr['roomCountDom'] !== null )
            {
                $roomCountDom     = @$this->findEr($htmlAlt, $this->dataArr['roomCountDom'])->plaintext;
                if($roomCountDom === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [roomCountDom]"); continue; }
            }else{
                $roomCountDom = null;
            }

            if( $this->dataArr['areaDom'] !== null )
            {
                $areaDom     = @$this->findEr($htmlAlt, $this->dataArr['areaDom'])->plaintext;
                if($areaDom === null){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [areaDom]"); continue; }
            }else{
                $areaDom = null;
            }

            if( $this->dataArr['locatedFloorDom'] !== null ) {
                $locatedFloorDom = @$this->findEr($htmlAlt, $this->dataArr['locatedFloorDom'])['plaintext'];
                //if($locatedFloorDom === null){ $this->errorLog->error("[" . $this->location.$link . "] Yerlsdiyi metebe tapilmadi -> [locatedFloorDom]"); continue; }
            }
            else{
                $locatedFloorDom = null;
            }

            if( $this->dataArr['floorCountDom'] !== null ) {
                $floorCountDom = @$this->findEr($htmlAlt, $this->dataArr['floorCountDom'])['plaintext'];
                //if($floorCountDom === null){ $this->errorLog->error("[" . $this->location.$link . "] Yerlsdiyi metebe tapilmadi -> [floorCountDom]"); continue; }
            }
            else{
                $floorCountDom = null;
            }

            $date       = @$htmlAlt->find( $this->dataArr['dateDom'] )[0]->plaintext;
            $realDate	= $this->createDate($date);
            if($date === null || $realDate === false ){ $this->errorLog->error("[" . $this->location.$link . "] Info tapilmadi -> [dateDom]"); continue; }

            if(!$this->InsetCheck( $this->location.$link, $header, $content, $amount, $realDate, $owner, $mobnom, $toDay, $city, $roomCountDom, $areaDom, $placeDom, $metro, $locatedFloorDom, $floorCountDom, $district, $imageDom, $sight ))
            {
            	break;
            }

            $count++; break;//sadasdasd
        }

        return $count;
    }

    private function createDate( $date )
    {
    	if(preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])\.(0[1-9]|1[0-2])\.[0-9]{4}/",$date,$reg)) return date("Y-m-d",strtotime($reg[0]));
        else if(preg_match("/Bugün/",$date)) return date("Y-m-d");
        else if(preg_match("/Dünən/",$date)) return date("Y-m-d",strtotime("-1 days"));
        else if(preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])[ ]+(Yanvar|Fevral|Mart|Aprel|May|İyun|İyul|Avqust|Sentyabr|Oktyabr|Noyabr|Dekabr)[ ]+([0-9]{4})/",$date,$reg))
        {
            $months = ['Yanvar' => '01','Fevral' => '02','Mart' => '03','Aprel' => '04','May' => '05','İyun' => '06','İyul' => '07','Avqust' => '08','Sentyabr' => '09','Oktyabr' => '10','Noyabr' => '11','Dekabr' => '12'];
            $reg[2] = str_replace(array_keys($months),array_values($months),$reg[2]);

            return date("Y-m-d",strtotime($reg[1].".".$reg[2].'.'.$reg[3]));
        }

    	return false;
    }

    private function createMob( $mobnom )
    {
        preg_match_all("/[\(0]+(70|55|50|77|51)[\)\- ]{0,}\d{3}[\- ]{0,}\d{2}[\- ]{0,}\d{2}/", $mobnom, $match);

        return $match[0];
    }

    private function InsetCheck( $link, $header, $content, $amount, $realDate, $owner, $mobnom, $toDay, $city, $roomCountDom, $areaDom, $placeDom, $metro, $locatedFloorDom, $floorCountDom, $district, $imageDom, $sight )
    {
        if( $toDay === true && date("Y-m-d") != $realDate ) return false;

    	$announcement = new Announcement();
    	$announcement->link = $link;
    	$announcement->header = $header;
    	$announcement->amount = (float)str_replace([' '], '', $amount);
    	$announcement->content = $content;
    	$announcement->date = $realDate;
    	$announcement->type = $this->dataArr['type'];
        $announcement->site = $this->dataArr['location'];
        $announcement->buldingType = $this->dataArr['buldingType'];
        $announcement->type2 = $this->dataArr['type2'];
        $announcement->city_id = $city;
        $announcement->roomCount = $roomCountDom == null || $roomCountDom > 100 ? null : $roomCountDom;
        $announcement->area = (int)$areaDom;
        $announcement->place = str_limit(trim($placeDom),255,"");
        $announcement->owner = str_limit(trim($owner), 40, "");
        $announcement->metro_id = $metro;
        $announcement->locatedFloor = $locatedFloorDom;
        $announcement->floorCount = $floorCountDom;
        $announcement->district_id = $district;
        $announcement->sight_id = $sight;
        $announcement->save();

        //numbers
    	$numbers = [];
        foreach ($this->createMob($mobnom) as $number)
        {
            $numberC = new Number();
            $numberC->number = $number;
            $numberC->pure_number = MyHelper::pureNumber($number);

            $numbers[] = $numberC->pure_number;
            $announcement->numbers()->save($numberC);
        }
        //images
        foreach ($imageDom as $image)
        {
            $ext = explode('.', $image);
            $ext =  end($ext);
            $newName = uniqid() . "." . $ext;

            $imageC = new Photo();
            $imageC->file_name = $newName;
            $announcement->pictures()->save($imageC);

            Image::make($image)->resize(400, 400)->save( public_path( MyClass::ANN_PIC_DIR . $newName ) );
        }
        //is makler
        if( count($numbers) > 0 && MskMakler::whereIn('pure_number', $numbers)->count() > 0 )
        {
            $announcement->owner_type = 1;
            $announcement->save();
        }

    	usleep(1000 * 100);

    	return true;
    }

    public function findEr($where, $find, $index = false)
    {
        if($where === null || $where === false) return null;
        else if(isset($find[0]) && $find[0] == 'function')
        {
            $func = "App\Library\DataFunctions\Functions::" . $find[1];
            $data = isset($find[2]) ? $find[2] : null;
            return $func($this, $where, $data);
        }

        if( is_array($find) )
        {
            if( is_array($find[0]) )
            {
                foreach ($find as $ff)
                {
                    $where = $this->findEr($where, $ff);
                }

                return $where;
            }
            else return $this->findEr($where, $find[0], (isset($find[1])?$find[1]:false) );
        }

        if($index === false)
        {
            if( $find === '$this' ) return $where;
            else return @$where->find( $find );
        }
        else
        {
            if( $find === '$this' ) return $where[$index];
            return @$where->find($find)[$index];
        }
    }
}

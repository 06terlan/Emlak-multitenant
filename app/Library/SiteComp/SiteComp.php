<?php

namespace App\Library\SiteComp;

use App\Library\Dom\Dom;
use App\Library\ErrorLog;
use App\Models\Announcement;

class SiteComp
{
	private $linkListHtml = null;
	private $errorLog = null;
	private $dom = null;
	private $location = null;
	private $dataArr = null;

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
            if($link === null){ $this->errorLog->error("[" . $this->location . "] Link tapilmadi -> [" . $link . "]"); continue; }

            if( Announcement::isLinkExist($this->location.$link) ) break;

            $htmlAlt = $this->dom->file_get_html($this->location.$link);
            if($htmlAlt === null || $htmlAlt === false){ $this->errorLog->error("[" . $this->location . "] Obyek acilmir -> [" . $this->location.$link . "]"); continue; }

            $header     = @$htmlAlt->find( $this->dataArr['headerDom'] )[0]->innertext;
            if($header === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi [headerDom]"); continue; }

            $content    = @$htmlAlt->find( $this->dataArr['contentDom'] )[0]->innertext;
            if($content === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [contentDom]"); continue; }

            $amount     = @$htmlAlt->find( $this->dataArr['amountDom'] )[0]->plaintext;
            if($amount === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [amountDom]"); continue; }

            $owner     = @$this->findEr($htmlAlt, $this->dataArr['owner'])->plaintext;
            if($owner === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [owner]"); continue; }

            $mobnom     = @$this->findEr($htmlAlt, $this->dataArr['mobnom'])->plaintext;
            if($mobnom === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [mobnom]"); continue; }

            $date       = @$htmlAlt->find( $this->dataArr['dateDom'] )[0]->plaintext;
            $realDate	= $this->createDate($date);
            if($date === null || $realDate === false ){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [dateDom]"); continue; }

            if(!$this->InsetCheck( $this->location.$link, $header, $content, $amount, $realDate, $owner, $mobnom, $toDay ))
            {
            	break;
            }

            $count++;
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

    private function InsetCheck( $link, $header, $content, $amount, $realDate, $owner, $mobnom, $toDay )
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
        $announcement->owner = mb_strimwidth(trim($owner), 0, 40);
        $announcement->mobnom = json_encode($this->createMob($mobnom));
    	$announcement->save();

    	usleep(1000 * 100);

    	return true;
    }

    private function findEr($where, $find, $index = false)
    {
        if($where === null || $where === false) return null;

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

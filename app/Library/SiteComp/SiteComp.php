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

    public function __construct( $dataArr )//$link, $objectsDom, $linkDom, $location, $headerDom, $contentDom, $amountDom, $dateDom)
    {
    	$this->dom = new Dom();
    	$this->errorLog = new ErrorLog("logs/pageErrors.log",500);
    	$this->location  = $dataArr['location'];

        $this->linkListHtml = $this->dom->file_get_html($dataArr['link']);

        if($this->linkListHtml === false) $this->errorLog->error("[" . $this->location . "] Seife acilmir -> [" . $link . "]");
        else $this->getObjectData( $dataArr );
    }

    private function getObjectData( $dataArr )
    {
    	$objects = $this->linkListHtml->find( $dataArr['objectsDom'] );
    	foreach ($objects as $object)
        {
            $link = @$object->find( $dataArr['linkDom'] )[0]->href;//for link
            if($link === null){ $this->errorLog->error("[" . $this->location . "] Link tapilmadi -> [" . $link . "]"); continue; }
            
            $htmlAlt = $this->dom->file_get_html($this->location.$link);
            if($htmlAlt === null){ $this->errorLog->error("[" . $this->location . "] Obyek acilmir -> [" . $this->location.$link . "]"); continue; }

            $header     = @$htmlAlt->find( $dataArr['headerDom'] )[0]->innertext;
            if($htmlAlt === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi [headerDom]"); continue; }

            $content    = @$htmlAlt->find( $dataArr['contentDom'] )[0]->innertext;
            if($htmlAlt === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [contentDom]"); continue; }

            $amount     = @$htmlAlt->find( $dataArr['amountDom'] )[0]->plaintext;
            if($htmlAlt === null){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [amountDom]"); continue; }

            $date       = @$htmlAlt->find( $dataArr['dateDom'] )[0]->plaintext;
            $realDate	= $this->createDate($date);
            if($htmlAlt === null || $realDate === false ){ $this->errorLog->error("[" . $this->location . "] Info tapilmadi -> [dateDom]"); continue; }

            if(!$this->InsetCheck( $link, $header, $content, $amount, $realDate ))
            {
            	break;
            }
        }
    }

    private function createDate( $date )
    {
    	if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])\.(0[1-9]|1[0-2])\.[0-9]{4}$/",$date)) return date("Y-m-d",strtotime($date));

    	return false;
    }

    private function InsetCheck( $link, $header, $content, $amount, $realDate )
    {
    	if( $realDate == date("Y-m-d") && !Announcement::isLinkExist($link) )
    	{
    		$announcement = new Announcement();
    		$announcement->link = $link;
    		$announcement->header = $header;
    		$announcement->amount = (float)str_replace([' '], '', $amount);
    		$announcement->content = $content;
    		$announcement->date = $realDate;
    		$announcement->save();
    		return true;
    	}

    	return false;
    }


}

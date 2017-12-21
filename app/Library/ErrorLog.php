<?php

namespace App\Library;

use Illuminate\Support\Facades\Storage;

/**
* ErrorLog
*/
class ErrorLog
{
	private $fileName 		= null;
	private $maxErrorCount 	= 0; 

	public $errorCount 		= 0;

	public $AllError   		= [];


	function __construct($fileName, $maxErrorCount = 300)
	{
		$this->fileName = $fileName;
		$this->maxErrorCount = $maxErrorCount;

		$this->checkFile();
		$this->getAllError();
	}

	private function checkFile()
	{
		dump(Storage::exists($this->fileName));
		!Storage::exists($this->fileName) ? Storage::put($this->fileName," ") : "";
	}

	private function getAllError()
	{
		$this->AllError = explode("\n", Storage::get($this->fileName) );

		$this->errorCount = count($this->AllError);
	}

	private function checkCount()
	{
		if( $this->errorCount > $this->maxErrorCount )
		{
			$this->AllError = array_slice($this->AllError, 0, $this->maxErrorCount);

			dump($this->AllError);
		}
	}

	public function error($error)
	{	
		array_unshift($this->AllError, $error);
		$this->errorCount++;

		$this->checkCount();
		Storage::put($this->fileName, implode("\n", $this->AllError));
	}
}
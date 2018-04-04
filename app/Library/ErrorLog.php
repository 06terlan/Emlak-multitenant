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
	private $debug          = null;


	function __construct($fileName, $maxErrorCount = 300, $debug = false)
	{
		$this->fileName = $fileName;
		$this->maxErrorCount = $maxErrorCount;
		$this->debug = $debug;

		$this->checkFile();
		$this->getAllError();
	}

	private function checkFile()
	{
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
        $error = "(" . date("d-m-Y H:i") . ")" . $error;

		array_unshift($this->AllError, $error);
		$this->errorCount++;

		$this->checkCount();
		Storage::put($this->fileName, implode("\n", $this->AllError));

		if( $this->debug === true )
		{
            //var_dump($error);
            exit();
        }
	}
}
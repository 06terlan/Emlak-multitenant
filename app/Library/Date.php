<?php

namespace App\Library;

class Date
{
	public static function lastDayOfMonth( $date = null )
	{
		return self::d($date , 'm/t/Y');
	}

    public static function firstDayOfMonth( $date = null )
    {
        return self::d($date , 'm/01/Y');
    }

	public static function timestamp( $time )
	{
		return is_numeric($time) ? $time : strtotime($time);
	}

	public static function d( $time = null , $format = null )
	{
		$strDate = is_null( $time ) ? time( ) : (is_numeric($time) ? $time : self::timestamp($time));

		$format = is_null( $format ) ? 'd-m-Y' : $format ;

		return date( $format , $strDate );
	}

	public static function addHour( $time , $num , $format = null )
	{
		return self::addDate( $time , $num , 'hour' , $format );
	}

    public static function addMonth( $time , $num , $format = null )
    {
        return self::addDate( $time , $num , 'month' , $format );
    }

	public static function range( $date1 , $date2 , $format = false , $step = "+1 day" )
	{
		$result   = array ();

		$date1 = is_numeric($date1) ? $date1 : self::timestamp( $date1 );
		$date2 = is_numeric($date2) ? $date2 : self::timestamp( $date2 );

		while ( $date1 <= $date2 )
		{
			$result[] = $format !== false ? date( $format , $date1 ) : $date1;
			$date1 = strtotime( $step , $date1 );
		}

		return $result;
	}

	public static function year( $time = null )
	{
		$time = is_null($time) ? time() : ( is_numeric($time) ? $time : strtotime($time) );
		return date('Y' , $time);
	}

	public static function month( $time = null )
	{
		$time = is_null($time) ? time() : ( is_numeric($time) ? $time : strtotime($time) );
		return date('m' , $time);
	}

	public static function weekDay( $time = null )
	{
		$time = is_null($time) ? time() : ( is_numeric($time) ? $time : strtotime($time) );
		$weekDay = date('w' , $time);

		return $weekDay == 0 ? 7 : $weekDay;
	}

	public static function weekType( $time = null )
	{
		return (self::week( $time ) % 2) == 0 ? 2 : 1;
	}

	public static function week( $time = null )
	{
		$time = is_null($time) ? time() : ( is_numeric($time) ? $time : strtotime($time) );
		return date('W' , $time);
	}

	public static function day( $time = null )
	{
		$time = is_null($time) ? time() : ( is_numeric($time) ? $time : strtotime($time) );
		return date('d' , $time);
	}

	public static function diffForHumans( $time1 , $time2 = false )
	{
		if( $time2 === false) $time2 = time();
		
		foreach ( ['Y' => 'year' , 'm' => 'month' , 'd' => 'day' , 'H' => 'hour' , 'i' => 'minute' , 's' => 'second'] as $key => $name )
		{
			$data = self::diff( $time1 , $time2 , $key );
			if( $data > 0 )
			{
				return ( $data == 1 ? 'a' : $data ) . " " . $name . ( $data == 1 ? '' : 's' );
			} 
		}
	}

	public static function diff( $time1 , $time2 , $type = 'd' )
	{
		$time1 = self::timestamp($time1);
		$time2 = self::timestamp($time2);

		$dif = $time2 - $time1;

		if( $type == 's' )
			return $dif ;
		else if( $type == 'i' )
			return (int)($dif / 60) ;
		else if( $type == 'H' )
			return (int)($dif / 60 / 60) ;
		else if( $type == 'd' )
			return (int)($dif / 60 / 60 / 24) ;
		else if( $type == 'm' )
			return ( self::year($time2)*12 + self::month($time2) - self::year($time1)*12 - self::month($time1) - ( self::day($time1) > self::day($time2) ? 1 : 0 ) ) ;
		else if( $type == 'Y' )
			return self::year($time2) - self::year($time1) ;
		else return 0;
	}

	public static function getIntervalsIntersection( $interval1Start , $interval1End , $interval2Start , $interval2End )
	{
		$interval1Start	=	self::timestamp($interval1Start);
		$interval1End	=	self::timestamp($interval1End);

		if( self::isTime($interval2Start) )
		{
			$interval2Start = self::d($interval1Start , 'm/d/Y') . ' ' . self::t($interval2Start);
			$interval2End = self::d($interval1Start ,'m/d/Y') . ' ' . self::t($interval2End);

			$interval2Start	=	self::timestamp($interval2Start);
			$interval2End	=	self::timestamp($interval2End);

			$interval2End = $interval2End < $interval2Start ? Date::addDay($interval2End , 1) : $interval2End;

			if( !self::isIntervalsOverlap( $interval1Start , $interval1End , $interval2Start , $interval2End ) )
			{
			    if( $interval1End > $interval2End )
			    {
                    $interval2Start = Date::addDay($interval2Start , 1);
                    $interval2End = Date::addDay($interval2End , 1);
                }
				else
				{
                    $interval1Start = Date::addDay($interval1Start , 1);
                    $interval1End = Date::addDay($interval1End , 1);
                }
			}
		}
		else
		{
			$interval2Start	=	self::timestamp($interval2Start);
			$interval2End	=	self::timestamp($interval2End);
		}

		if( !self::isIntervalsOverlap( $interval1Start , $interval1End , $interval2Start , $interval2End ) )
		{
			return [
				'isOverlap'	=>	false,
				'start' 	=>	null ,
				'end' 		=>	null,
				'second'	=>	0
			];
		}

		$intersectionStart	=	$interval1Start > $interval2Start	? $interval1Start	:	$interval2Start;
		$intersectionEnd	=	$interval1End	> $interval2End		? $interval2End		:	$interval1End;

		return [
			'isOverlap'	=>	true,
			'start' 	=>	$intersectionStart ,
			'end' 		=>	$intersectionEnd ,
			'second'	=>	$intersectionEnd - $intersectionStart
		];
	}

	public static function isTime( $str )
	{
		return preg_match('/^[0-9]{1,2}\:[0-9]{1,2}\:?[0-9]{1,2}?\.?[0-9]*?$/' , $str ) == 1;
	}

	public static function t( $time )
	{
		$strDate = is_numeric($time) ? $time : self::timestamp($time);

		$format = "H:i";

		return date( $format , $strDate );
	}

	public static function isIntervalsOverlap( $interval1Start , $interval1End , $interval2Start , $interval2End )
	{
		$interval1Start		=	self::timestamp($interval1Start);
		$interval2Start		=	self::timestamp($interval2Start);
		$interval1End		=	self::timestamp($interval1End);
		$interval2End		=	self::timestamp($interval2End);

		return (
			self::isIntervalsTrue($interval1Start , $interval1End)
			&& self::isIntervalsTrue($interval2Start , $interval2End)
			&&  (
				($interval1Start	>=	 $interval2Start	&&	$interval1Start	<=	$interval2End)
				|| ($interval1End	>=	$interval2Start		&&	$interval1End	<=	$interval2End)
				|| ($interval1Start	<	$interval2Start		&&	$interval1End	>	$interval2End)
				|| ($interval1Start	>	$interval2Start		&&	$interval1End	<	$interval2End)
			)
		);
	}

	public static function isIntervalsTrue( $intervalStart , $intervalEnd )
	{
		$intervalStart		=	self::timestamp($intervalStart);
		$intervalEnd		=	self::timestamp($intervalEnd);

		return ($intervalStart <= $intervalEnd);
	}

	public static function addDay( $time , $num , $format = null )
	{
		return self::addDate( $time , $num , 'day' , $format );
	}

	private static function addDate( $time , $num , $type , $format )
	{
		$time = is_numeric( $time ) ? $time : self::timestamp( $time );

		$time = strtotime('+'.$num.' '.$type , $time );

		if( is_null( $format ) )
			return $time ;
		else
			return self::d( $time , $format ) ;
	}

	public static function splitDateTimeInterval($startInterval , $endInterval , $separator)
	{
		$isTimeFormat	= (preg_match( '/^[0-9\:\.]+$/' , $startInterval ) || preg_match( '/^[0-9\:\.]+$/' , $endInterval));

		$startInterval	=	is_numeric( $startInterval ) ? $startInterval : Date::timestamp($startInterval);
		$endInterval	=	is_numeric( $endInterval ) ? $endInterval : Date::timestamp($endInterval);
		$separator		=	is_numeric( $separator ) ? $separator : Date::timestamp($separator);

		if( $isTimeFormat )
		{
			$startInterval	=	Date::timestamp('01/01/2017 ' . Date::t($startInterval));
			$endInterval	=	Date::timestamp('01/01/2017 ' . Date::t($endInterval));
			$separator		=	Date::timestamp('01/01/2017 ' . Date::t($separator));

			if( $endInterval < $startInterval )
			{
				$endInterval = Date::addDay($endInterval , 1);
			}

			if( ($separator >= $startInterval && $separator <= $endInterval) === false )
			{
				$separator = Date::addDay($separator , 1);
			}
		}
		$isTrue = false;

		if( $separator <= $startInterval )
		{
			$part1			=	[null , null];
			$part2			=	[$startInterval , $endInterval];
			$part1Seconds	=	0;
			$part2Seconds	=	$endInterval - $startInterval ;
		}
		else if( $separator >= $endInterval )
		{
			$part1			=	[$startInterval , $endInterval];
			$part2			=	[null , null];
			$part1Seconds	=	$endInterval - $startInterval;
			$part2Seconds	=	0;
		}
		else
		{
			$part1			=	[$startInterval , $separator];
			$part2			=	[$separator , $endInterval];
			$part1Seconds	=	$separator - $startInterval;
			$part2Seconds	=	$endInterval - $separator;
		}

		return [
			'part1'			=>	$part1,
			'part2'			=>	$part2,
			'part1Seconds'	=>	$part1Seconds,
			'part2Seconds'	=>	$part2Seconds
		];
	}
}


?>
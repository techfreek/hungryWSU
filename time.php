<?php

function isOpen($hour, $min, $openHour, $openMin, $closeHour, $closeMin)
{
	$lateClosing = false;
	$closeHourTemp = $closeHour;
	$closeMinTemp = $closeMin;
	if($closeHour < $openHour)
	{ //Needs to recognize if it "closes" before it opens according to the clock
		$lateClosing = true;
		$closeHourTemp += 24;
	}
	
	if($lateClosing and lessThanTime($hour, $min, $closeHour, $closeMin) and greaterThanTime($hour, $min, 0, 0))
	{ //needs to adjust how the time looks if it is after midnight so it does not auto think it is closed. 
		//First checks if it closes late, is before closing, and after midnight
		$hour += 24;
	}
	
	if(greaterThanTime($hour, $min, $openHour, $openMin) and lessThanTime($hour, $min, $closeHourTemp, $closeMinTemp))
	{
		return true;
	}
	return false;
}

function lessThanTime($hour1, $min1, $hour2, $min2)
{
	if(($hour1 < $hour2) or (($hour1 == $hour2) and ($min1 < $min2)))
	{
		return true;
	}
	return false;
}

function equalTime($hour1, $min1, $hour2, $min2)
{
	if(($hour1 == $hour2) && ($min1 == $min2))
	{
		return true;
	}
	return false;
}

function greaterThanTime($hour1, $min1, $hour2, $min2)
{
	if(($hour1 > $hour2) or (($hour1 == $hour2) and ($min1 > $min2)))
	{
		return true;
	}
	return false;
}

?>

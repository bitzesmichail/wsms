<?php

 class Validator
 {
 	//check if the given AFM is a valid AFM
 	public static function isValid_SSN($afm='')
 	{
 		if(strlen($afm) != 9 || !is_numeric($afm))
 			return false;

 		$last = $afm[8];

 		$sum = $afm[0]*256 + $afm[1]*128 + $afm[2]*64 + $afm[3]*32 + 
 		       $afm[4]*16  + $afm[5]*8   + $afm[6]*4  + $afm[7]*2;

 		return (($sum % 11) % 10) == $last;
 	}
 }
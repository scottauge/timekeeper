<?php

class clsUtil {

  public function RandomString ($Width) {

	   $Alphabet = "qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ1234567890";
	   $CurStrLen = 0;
		 $Result = time ();
		 while (strlen($Result) < $Width) $Result .= substr($Alphabet, rand(1,strlen($Alphabet)), 1);

		 return $Result;

	}

	public function SQL2USTime ($SQLTime) {

		$DateTime = explode (" ", $SQLTime);
		$YearMonthDay = explode("-", $DateTime[0]);
		$HourMinSec = explode(":", $DateTime[1]);

		$TheUSDateTime = $YearMonthDay[1] . "-" . $YearMonthDay[2] . "-" . $YearMonthDay[0] . " ";

		if ($HourMinSec[0] > 12) {

			$HourMinSec[0] = $HourMinSec[0] - 12;
			$AMPM = "pm";

		} else {

			$AMPM = "am";

		}

		if ($HourMinSec[0] == 12) $AMPM = "pm";


		$TheUSDateTime .= $HourMinSec[0] . ":" . $HourMinSec[1] . ":" . $HourMinSec[2] . " " . $AMPM;

		return $TheUSDateTime;

	}

	public function SQL2XMLRPC($Time) {

		$DateTime = explode (" ", $Time);
		$YearMonthDay = explode("-", $DateTime[0]);
		$HourMinSec = explode(":", $DateTime[1]);

		$XMLTime = $YearMonthDay[0] . $YearMonthDay[1] . $YearMonthDay[2] . "T" . $HourMinSec[0] . $HourMinSec[1] . $HourMinSec[2];
		// echo "XMLTime : " . $XMLTime . "<BR>";
		// echo "strtotime(): " . strtotime($XMLTime) . "<BR>";
		return $XMLTime;

	}

}
?>

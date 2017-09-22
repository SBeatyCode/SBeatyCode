<?php
/*
*******************************
*	verification.php
*	Stephen Beaty
*******************************
*/

//Various
	function notEmptyOrNull($value) {
		$valid = TRUE;
		if (empty ($value) || $value == '' || $value == NULL) {
			$valid = FALSE;
		}
		return $valid;
	}

	function isValidEmail($value) {
		$valid = FALSE;
		$value = trim($value);
		//E-mail Pattern obtained from emailregex.com
		$pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

		if(preg_match($pattern, $value) && strlen($value) <= 20 && strlen($value) > 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isValidPhone($value) {
		$valid = FALSE;
		$value = trim($value);
		$pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
		if(preg_match($pattern, $value)) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isDateTime($value) {
		$valid = FALSE;
		if(date_create($value)) {
			$valid = TRUE;
		}
		return $valid;
	}

//Int	
	
	function isInt3($value) {
		$valid = FALSE;
		$value = trim($value);
		if (intval($value) != 0 && strlen($value) <= 3 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	//For Year, must be 4
	function isInt4($value) {
		$valid = FALSE;
		$value = trim($value);
		if (intval($value) != 0 && strlen($value) == 4) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isInt5($value) {
		$valid = FALSE;
		$value = trim($value);
		if (intval($value) != 0 && strlen($value) <= 5 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isInt7($value) {
		$valid = FALSE;
		$value = trim($value);
		if (intval($value) != 0 && strlen($value) <= 7 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	//for the Vin, needs to be exactly 17
	function isInt17($value) {
		$valid = FALSE;
		$value = trim($value);
		if (intval($value) != 0 && strlen($value) == 17) {
			$valid = TRUE;
		}
		return $valid;
	}

//Decimal
	function isDecimal6($value) {
		$valid = FALSE;
		$value = trim($value);
		if(floatval($value) != 0 && strlen($value) <= 6 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isDecimal7($value) {
		$valid = FALSE;
		$value = trim($value);
		if(floatval($value) != 0 && strlen($value) <= 7 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

//isLength - used for VarChar
	function isLength2($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) < 3 && strlen($value) > 1) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength5($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 5 && strlen($value) > 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength7($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 7 && strlen($value) > 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength10($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 10 && strlen($value) > 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength12($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 12 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength15($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 15 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}

	function isLength20($value) {
		$valid = FALSE;
		$value = trim($value);
		if (strlen($value) <= 20 && strlen($value) >= 0) {
			$valid = TRUE;
		}
		return $valid;
	}
?>
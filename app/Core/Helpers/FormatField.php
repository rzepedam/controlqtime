<?php

namespace Controlqtime\Core\Helpers;

class FormatField
{
	/**
	 * @param $rut (12345678-9)
	 *
	 * @return string (12.345.678-9)
	 */
	public static function rut($rut)
	{
		$rutTmp = explode("-", $rut);
		
		return number_format($rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}
	
	/**
	 * @param $field (20000)
	 *
	 * @return string (20.000)
	 */
	public static function decimalNumber($field)
	{
		return number_format($field, 0, ',', '.');
	}
	
}

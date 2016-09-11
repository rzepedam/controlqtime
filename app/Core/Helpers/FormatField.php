<?php

namespace Controlqtime\Core\Helpers;

class FormatField
{
	// Agrega puntos a rut
	public static function rut($rut)
	{
		$rutTmp = explode("-", $rut);

		return number_format($rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}

	// Agrega puntos campos que contienen dinero, distancia, peso, etc.
	public static function decimalNumber($field)
	{
		return number_format($field, 0, ',', '.');
	}
}

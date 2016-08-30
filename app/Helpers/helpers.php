<?php

namespace Controlqtime\Helpers;

class Helper
{
	// Agrega puntos a rut. Usado para rut entregado por Biometry al momento de entregar url con imagen del empleado.
	public static function formatedRut($rut)
	{
		$rutTmp = explode("-", $rut);

		return number_format($rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
	}

	// Agrega puntos y $ a campos que contienen dinero
	public static function formatedMoney($field)
	{
		return "$ " . number_format($field, 0, ',', '.');
	}
}

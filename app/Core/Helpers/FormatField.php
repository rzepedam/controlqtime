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
            $rutTmp = explode('-', $rut);

            return number_format($rutTmp[0], 0, '', '.').'-'.$rutTmp[1];
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

        /**
         * @param $string (Raúl Elías)
         *
         * @return mixed (Raul Elias)
         */
        public static function removeAccents($string)
        {
            $not_permitted = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'À', 'Ã', 'Ì', 'Ò', 'Ù', 'Ã™', 'Ã ', 'Ã¨', 'Ã¬', 'Ã²', 'Ã¹', 'ç', 'Ç', 'Ã¢', 'ê', 'Ã®', 'Ã´', 'Ã»', 'Ã‚', 'ÃŠ', 'ÃŽ', 'Ã”', 'Ã›', 'ü', 'Ã¶', 'Ã–', 'Ã¯', 'Ã¤', '«', 'Ò', 'Ã', 'Ã„', 'Ã‹'];
            $permitted = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N', 'A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u', 'c', 'C', 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'u', 'o', 'O', 'i', 'a', 'e', 'U', 'I', 'A', 'E'];
            $text = str_replace($not_permitted, $permitted, $string);

            return $text;
        }
}

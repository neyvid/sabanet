<?php


namespace App\Services\CodeMeliCheck;


class CodeMeliCheck
{
    public static $codeMeli;
    public static $codeMeliArray = [];

    public static function isTrueCodeMeli($code)
    {
        self::$codeMeli = $code;
        $result = self::checkCode($code);
        if ($result['status']) {
            if (($result['baghimande'] >= 2 && self::$codeMeliArray[9] == 11 - $result['baghimande']) || ($result['baghimande'] < 2 && self::$codeMeliArray[9] == $result['baghimande'])) {
                return true;
            } else {
                return false;
            }
        }
        return false;


    }

    public static function checkCode($code)
    {

        if (self::checkIsTrueFormat($code)) {
            for ($i = 0; $i < 10; $i++) {
                $codeMeliChar = substr($code, $i, 1);
                array_push(self::$codeMeliArray, $codeMeliChar);
            }
            $sum = '';
            for ($i = 0; $i < 10; $i++) {
                @$sum += self::$codeMeliArray[$i] * (10 - $i);
            }
            $sum -= self::$codeMeliArray[9];
            $baghiMande = $sum % 11;
            return [
                'baghimande' => $baghiMande, 'status' => 1
            ];
        }
        return [
            'status' => 0
        ];

    }

    public static function checkIsTrueFormat($code)
    {
        if (preg_match('/^[0-9]{10}$/', $code) && is_numeric($code)) {
            return true;
        }
        return false;
    }
}

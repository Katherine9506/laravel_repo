<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019\3\2 0002
 * Time: 3:39
 */

namespace App\models;

class Fibonacci
{
    private $array = [];

    public static function generateN(int $num)
    {
        if ($num <= 0) return 0;
        if ($num == 1 || $num == 2) return 1;
        return self::generate($num - 1) + self::generate($num - 2);
    }

    public static function generate(int $num)
    {
        if ($num <= 0) {
            return [];
        }

        $arr[0] = $arr[1] = 1;

        for ($i = 2; $i < $num; $i++) {
            $arr[$i] = $arr[$i - 1] + $arr[$i - 2];
        }

        return $arr;
    }
}

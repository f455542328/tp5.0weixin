<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 23:16
 */

namespace app\api\service;


class Token
{
    public static function generateToken()
    {
        $randChars = getRandchars(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $salt = config('secure.token_salt');

        return md5($randChars . $timestamp . $salt);
    }
}
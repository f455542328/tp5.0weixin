<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 23:16
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use app\lib\exception\ForbiddenException;
use think\Request;
use app\lib\enum\ScopeEnum;

class Token
{
    public static function generateToken()
    {
        $randChars = getRandchars(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $salt = config('secure.token_salt');

        return md5($randChars . $timestamp . $salt);
    }

    /*
     * 根据传入参数获取对应的uid,openid,session_key
     */
    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()->header('token');
        $var = Cache::get($token);
        if (!$var) {
            throw new TokenException();
        } else {
            if (!is_array(!$var)) {
                $var = json_decode($var, true);
            }
            if (array_key_exists($key, $var)) {
                return $var[$key];
            } else {
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    /*
     * 获取uid
     */
    public static function getCurrentUid()
    {
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    /*
     * 用户和管理员访问权限前置校验
     */
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope >= ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }

    /*
     * 仅用户访问权限前置校验
     */
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope == ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }
}
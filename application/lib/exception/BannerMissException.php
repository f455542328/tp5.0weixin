<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 14:05
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}
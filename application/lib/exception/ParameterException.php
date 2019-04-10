<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 17:12
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}
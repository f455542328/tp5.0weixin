<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/19 0019
 * Time: 14:48
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}
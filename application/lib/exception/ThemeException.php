<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 18:18
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在,请检查主题';
    public $errorCode = 30000;
}
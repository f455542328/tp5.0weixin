<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/24 0024
 * Time: 11:38
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在,请检查ID';
    public $errorCode = 80000;
}
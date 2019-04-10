<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 22:57
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = '指定的商品不存在,请检查参数';
    public $errorCode = 20000;
}
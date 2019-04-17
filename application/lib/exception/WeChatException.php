<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 17:20
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信服务器接口调用失败';
    public $errorCode = 999;
}
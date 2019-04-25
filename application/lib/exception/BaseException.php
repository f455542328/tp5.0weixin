<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 13:55
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;

    //定义一个构造函数,在初始化对象的时候改写返回的错误码
    public function __construct($params = [])
    {
        if (!is_array($params)) {
            //return ;
            throw new Exception('参数必须是数组');
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }
        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }
}
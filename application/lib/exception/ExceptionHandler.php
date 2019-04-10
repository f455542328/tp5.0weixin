<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 13:52
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    //返回错误请求路径'request_url' => $request->url()

    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if (config('app_debug')) {
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = '服务器内部错误';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        };
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result, $this->code);
//        return json('sdfsfdssdssdsd');
    }

    //错误日志记录
    private function recordErrorLog(Exception $e)
    {
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type' => 'File',
            // 日志保存目录
            'path' => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);
        Log::record($e->getMessage(), 'error');
    }
}
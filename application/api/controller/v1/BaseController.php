<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/23 0023
 * Time: 9:16
 */

namespace app\api\controller\v1;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    /*
     * 用户和管理员访问权限前置校验
     */
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    /*
    * 仅用户访问权限前置校验
    */
    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }
}
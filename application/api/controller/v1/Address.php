<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/18 0018
 * Time: 17:37
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];


    public function createOrUpdateAddress()
    {
        $validate = new AddressNew();
        $validate->gocheck();
        //  根据token来获取uid
        //  根据uid来查找用户数据,判断用户是否存在,如果不存在抛出异常
        //  获取用户从客户端提交来的地址信息
        //  根据用户地址信息是否存在,从而判断是添加地址还是更新地址
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if (!$user) {
            throw new UserException();
        }

        $dataArray = $validate->getDataByRule(input('post.'));

        $userAddress = $user->address;

        //采用模型关联进行更新
        if (!$userAddress) {
            $user->address()->save($dataArray);
        } else {
            $user->address->save($dataArray);
        }

        return json(new SuccessMessage(), 201);
    }
}
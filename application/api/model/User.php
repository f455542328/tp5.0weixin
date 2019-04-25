<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 16:25
 */

namespace app\api\model;


class User extends BaseModel
{
    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }
    public static function getByOpenID($openid)
    {
        $user = self::where('openid', '=', $openid)->find();
        return $user;
    }
}
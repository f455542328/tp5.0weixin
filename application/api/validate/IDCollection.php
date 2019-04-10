<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 17:01
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须为以逗号分隔的多个正整数'
    ];

    //自定义验证规则
    protected function checkIDs($values)
    {
        $values = explode(',', $values);
        if (empty($values)) {
            return false;
        };
        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        };
        return true;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 22:35
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}
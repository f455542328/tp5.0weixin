<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 9:17
 */

namespace app\api\validate;

use app\api\validate\BaseValidate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];
    protected $message = [
        'id' => 'id必须是正整数'
    ];

}
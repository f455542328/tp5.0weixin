<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/18 0018
 * Time: 11:37
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id', 'id', 'create_time', 'update_time', 'delete_time'];
}
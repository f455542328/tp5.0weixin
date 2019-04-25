<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/18 0018
 * Time: 11:33
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id', 'product_id', 'create_time', 'update_time', 'delete_time'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}
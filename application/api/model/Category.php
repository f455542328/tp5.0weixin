<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 8:34
 */

namespace app\api\model;


class Category extends BaseModel
{
    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public static function getAllCategories()
    {
        $AllCategories = self::with(['img'])->select();
        //等同于下面的查询方法
//        $AllCategories = self::all([],'img');
        return $AllCategories;
    }
}
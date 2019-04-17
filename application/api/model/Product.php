<?php

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['pivot', 'from', 'create_time', 'update_time', 'delete_time'];

    //进行图片路径的拼合
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    //获取最新商品
    public static function getMostRecent($count)
    {
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }

    //获取分类商品信息
    public static function getCategoryByID($categoryID)
    {
        $categoryInfo = self::where('category_id', '=', $categoryID)->select();
        return $categoryInfo;
    }
}

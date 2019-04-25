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
    /*
     * 获取商品详情
     */
    //关联商品图片表
    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    //关联商品详情表
    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    public static function getProductDetail($id)
    {
//        $product = self::with(['imgs.imgUrl,properties'])->find($id);
        $product = self::with([
            'imgs' => function ($query) {
                $query->with(['imgUrl'])
                    ->order('order', 'asc');
            }
        ])
            ->with(['properties'])
            ->find($id);
        return $product;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 22:30
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    /*
     * @url /product/recent?count=10
     * @return 产品按照最新条书进行返回
     * $count设置默认条数10
     */
    public function getRecent($count = 10)
    {
        //验证传入参数
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        $products = $products->hidden(['summary']);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        return $products;
    }

    /*
     * @category $id 分类id
     * API 获取分类商品信息
     */
    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $res = ProductModel::getCategoryByID($id);
        $res = $res->hidden(['summary']);
        if ($res->isEmpty()) {
            throw new ProductException();
        }
        return $res;
    }
}
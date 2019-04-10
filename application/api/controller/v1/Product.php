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
        if (!$products) {
            throw new ProductException();
        }
        return $products;
    }
}
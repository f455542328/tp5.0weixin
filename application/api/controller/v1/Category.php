<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/17 0017
 * Time: 8:33
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories()
    {
        $res = CategoryModel::getAllCategories();

        if ($res->isEmpty()) {
            throw new CategoryException();
        }
        return $res;
    }
}
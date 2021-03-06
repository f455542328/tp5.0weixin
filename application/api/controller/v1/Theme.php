<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/10 0010
 * Time: 16:13
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /*
     * @url /theme?ids = id1,id2,id3
     * @return 一组theme模型
     */
    public function getSimpleList($ids = '')
    {
        (new IDCollection())->goCheck();
        $res = ThemeModel::getThemeListByIDs($ids);
        if ($res->isEmpty()) {
            throw new ThemeException();
        };
        return $res;
    }

    /*
     * @url /theme/:id
     * @return 根据查询id返回的产品
     */
    public function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if ($theme->isEmpty()) {
            throw new ThemeException();
        };
        return $theme;
    }
}
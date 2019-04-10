<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/8 0008
 * Time: 17:33
 */

namespace app\api\controller\v2;


use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;
use app\api\model\Banner as BannerModel;

class Banner
{
    /**
     * 获取指定的id的banner信息
     * @url /banner/:id
     * @http GET
     * @id bannerde的id号
     */

    public function getBanner($id)
    {
        //自己封装的独立验证层
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        //利用模型进行查询

        if (!$banner) {
            throw new BannerMissException();
//            测试log日志
//            throw new Exception('内部错误');
        }
        return $banner;
//        利用TP5校验插件进行的验证
//        $data = [
//            'name' => 'vendor',
//            'email' => 'vendor@qq.com'
//        ];
//        $validate = new Validate([
//            'name' =>'require|max:10',
//            'email' => 'email'
//        ]);
//        $result = $validate->check($data);


//        return json($banner);

    }
}
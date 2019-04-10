<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/9 0009
 * Time: 13:21
 */

namespace app\api\model;


class Banner extends BaseModel
{
    //设置隐藏的字段
    protected $hidden = ['update_time', 'delete_time'];

    //建立一对多关联模型
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id)
    {
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
//        $res = Db::query('select * from banner_item where banner_id=?',[$id]);
//        $res = Db::table('banner_item')->where('banner_id','=',$id)->select();
//        $res = Db::table('banner_item')->where('banner_id','=',$id)->select();
//        return $res;
    }
}
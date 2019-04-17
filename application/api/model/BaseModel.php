<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    protected $hidden = ['create_time', 'update_time', 'delete_time'];
    //进行图片路径的拼合
    protected function prefixImgUrl($value, $data)
    {
        $finalUrl = $value;
        if ($data['from'] == 1) {
            $finalUrl = config('setting.img_prefix') . $value;
        }
        return $finalUrl;
    }
}

<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
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

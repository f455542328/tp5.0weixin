<?php

namespace app\api\model;


class Image extends BaseModel
{
    //设置隐藏的字段
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    //进行图片路径的拼合
    public function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

}

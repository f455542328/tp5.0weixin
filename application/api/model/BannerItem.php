<?php

namespace app\api\model;


class BannerItem extends BaseModel
{
    //设置隐藏的字段
    protected $hidden = ['img_id', 'banner_id', 'update_time', 'delete_time'];

    //关联image表
    public function img()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}

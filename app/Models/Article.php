<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    指定表名
    protected $table = 'article';
//    设置时间戳
    public $timestamps = true;
    protected $dateFormat = 'U';
//    批量赋值 黑名单
    protected $guarded = [];

//    取出时间戳
    


}
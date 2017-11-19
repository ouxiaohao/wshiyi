<?php
/**
 * description 评论
 * Created by ouhao@ouxiaohao.com
 * Date: 2017/5/19
 * User: ouhao
 */


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    指定表名
    protected $table = 'comment';
//    关闭时间戳
    public $timestamps = false;
//    指定批量赋值字段
    protected $fillable = ['name','content','pid','sort'];

    static public function addData($add_data)
    {
        if ($add_data['comment_id']) {// 评论

        }else{// 回复

        }
        $result = true;

        return $result;
    }

    static public function list_page($map,$pluck,$limit)
    {
        $data = [];

        return $data;
    }

    /*
     * 软删除 评论/回复
     */
    static public function soft_delete($object_id, $type)
    {
        $result = true;
        return $result;
    }















}
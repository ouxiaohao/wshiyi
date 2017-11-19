<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * 添加评论
     * @param integer $xinxi_id 帖子ID
     */
    public function add_comment(Request $request)
    {
//        获取请求数据
        $post = $request->input('comment');
//        输入数据库
        $result = Comment::addData($post);

        if ($result) {
            ajax_return('','成功',1);
        }else{
            ajax_return('','失败',0);
        }
    }
    /**
     * 评论列表
     * @param integer $xinxi_id 帖子ID
     */
    public function comment_list(Request $request)
    {
        $map = ['article_id'=>$request->input('article_id')];
        $pluck = 'mu.id as user_id,mu.headpic,mu.nickname,pl.id as comment_id,pl.createtime,pl.content';
        $limit = 10;
        $data = Comment::list_page($map,$pluck,$limit);
//        是否还有下一页
        $next_page = $data['next_page'];
        unset($data['next_page']);
        ajax_return($data,'评论列表',1,$next_page);
    }
    /**
     * 删除评论
     * @param integer $object_id 评论/回复 ID
     * @param integer $type [1 评论 2 一级回复 3 二级回复]
     */
    public function del_comment(Request $request)
    {
        $post = $request->input();
        $result = Comment::soft_delete($post['object_id'],$post['type']);

        if ($result) {
            ajax_return('','成功',1);
        }else{
            ajax_return('','失败',0);
        }
    }











}
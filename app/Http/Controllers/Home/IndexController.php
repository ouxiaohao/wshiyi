<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Data;
use App\Models\Search;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @param $param  路由绑定的参数 可查询分类、标签、文章内容,可搜索
     * @return $categories 分类模型
     * @return $tags 标签模型
     * @return $articles 文章模型
     */
    public function index($param = null)
    {

        $articles = Article::getArticleList();

        return view('home.index.index',[
            'articles' => $articles,
        ]);
    }

    public function cate($cate_id)
    {
        $map = [
            ['article.release','=',1],
            ['category.id','=',$cate_id]
        ];
        $articles = Article::getArticleList($map);

        return view('home.index.index',[
            'articles' => $articles,
        ]);

    }

    public function tag($tag_id)
    {
        $map = [
            ['article.release','=',1],
            ['article_tag.tag_id','=',$tag_id]
        ];
        $articles = Article::getArticleList($map);

        return view('home.index.index',[
            'articles' => $articles,
        ]);
    }

    /**
     * @param Request $request
     * @return $search 用户请求的搜索
     * @url 跳转至index方法
     */
    public function search(Request $request)
    {
        if ($request->isMethod('post'))
        {
//            获取用户请求
            $search = $request->all();
//            存储到一次性session
            $request->flash();

            return $this->index($search);
        }
        return back();

    }

    public function sidebar()
    {
//        标签
        $tags = Tag::orderBy('sort')
            ->select('id','name','color')
            ->get();
//        推荐文章
        $hot_list = Article::orderBy('browse','desc')
            ->where('release',1)
            ->select('id','title')
            ->limit(9)
            ->get();

        $data = [
            'tags'=>$tags,
            'hot_list'=>$hot_list,
        ];

        echo json_encode($data);
    }

    public function cate_list()
    {
//        获取分类模型
        $categories = Category::orderBy('sort')
            ->get()
            ->toArray();
        $categories = Data::tree($categories,'name');
        $data = [
            'categories'=>$categories,
            'now_cate'=>'linux',
        ];

        echo json_encode($data);
    }









}
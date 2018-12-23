<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTag;
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
        switch (true) {
            // null时显示首页
            case is_null($param):
                $id = null;
                $whereName = null;
                $search = null;
                break;
            //为数组时即搜索
            case is_array($param):
                $search = $param['search'];
                $id = null;
                $whereName = null;
                break;
            //转整小等1000大于0显示标签文章
            case (int)$param <= 1000 && (int)$param > 0:
                $id = $param;
                $whereName = 'tag_id';
                $search = null;
                break;
            // 转整大于1000跳转到Article控制器
            case (int)$param > 1000:
                $article = new ArticleController();
                return $article->index($param-1000);
                break;
            //为字符串显示分类文章
            default:
                $id = Category::where('title', $param)->value('id');
                $whereName = 'cate_id';
                $search = null;
                break;
        }

//        获取分类模型
        $categories = Category::orderBy('sort')
            ->get()
            ->toArray();
        $categories = Data::tree($categories,'name');
//        获取标签模型
        $tags = Tag::orderBy('sort')->get();
//        获取文章模型 (包括首页、分类、标签)
        $articles = Article::join('category','article.cate_id','=','category.id')
            ->join('article_tag','article.id','=','article_tag.article_id')
            ->orderBy('article.updated_at','desc')
            ->when($id ,function ($query) use($id,$whereName){
                return $query->where($whereName,$id);
            })
            ->when($search,function ($query) use($search){
                return $query->where('article.title', 'like' ,"%{$search}%");
            })
            ->select('article.id','article.title','article.digest','article.thumb','article.updated_at',
                'category.title as category_title','category.name as category_name'
                )
            ->distinct()
            ->paginate(8);
//        追加文章的标签
        foreach ($articles as $article) {
            $article->tags = ArticleTag::join('tag','article_tag.tag_id','=','tag.id')
            ->where('article_id',$article->id)
            ->pluck('name','id');
        }

        return view('home.index.index',[
            'categories' => $categories,
            'tags' => $tags,
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









}
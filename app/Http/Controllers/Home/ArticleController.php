<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/11/4
 * Time: 3:17
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Data;
use App\Models\Tag;
use YuanChao\Editor\EndaEditor;

class ArticleController extends Controller
{
    public function index($id)
    {
//        获取分类模型
        $categories = Category::orderBy('sort')
            ->get()
            ->toArray();
//        转化为树形结构
        $categories = Data::tree($categories,'name');
//        获取标签模型
        $tags = Tag::orderBy('sort')->get();
//        获取文章模型
        $article = Article::join('category','article.cate_id','=','category.id')
            ->where('article.id',$id)
            ->select('keywords','digest','article.title','updated_at','content',
                'category.title as category_title','category.name as category_name'
            )
            ->first()
            ->toArray();
        $article['content'] = EndaEditor::MarkDecode($article['content']);
        $article['tag'] = ArticleTag::join('tag','article_tag.tag_id','=','tag.id')
            ->where('article_id',$id)
            ->pluck('name','id')
            ->toArray();

        return view('home.article.index',[
            'categories' => $categories,
            'tags' => $tags,
            'article' => $article,
        ]);
    }







}
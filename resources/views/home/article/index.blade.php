@extends('home.layout')

@section('title',$article['title'])
@section('keywords',$article['keywords'])
@section('description',$article['digest'])

@section('article')
    <div class="article">
        <div class="title-name">{{ $article['title'] }}</div>
        <div class="detail">
            <div class="author">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#iconfontyonghu"></use>
                </svg>
                欧浩
            </div>
            <div class="belong">
                <p class="cate" title="分类">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-fenlei"></use>
                    </svg>
                    <a href="{{ url('/',['param'=>$article['category_title']]) }}">{{ $article['category_name'] }}</a>
                </p>
                <p class="tag" title="标签">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-biaoqian"></use>
                    </svg>
                    @foreach($article['tag'] as $k => $v)
                        <a href="{{ url('/',['param'=>$k]) }}">{{ $v }}</a>
                    @endforeach
                </p>
            </div>
        </div>
        <div class="article-content">{!! $article['content'] !!}</div>
        <div class="sign">
            <p class="updated">发布于 {{ date('Y-m-d H:i:s',$article['created_at']) }}</p>
        </div>
    </div>
@endsection
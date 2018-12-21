@extends('home.layout')

@section('title','首页')
@section('keywords','未十一，博客，个人博客，laravel,laravel框架')
@section('description','未十一博客是未十一基于laravel框架独立开发的个人技术博客')

@section('article')
    @forelse($articles as $article)
        <section>
            <div class="section">
                <div class="title"><a href="{{ url('/',['param'=>$article->id +1000]) }}">{{ $article->title }}</a>
                </div>
                <div class="belong">
                    <p class="cate" title="分类">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-fenlei"></use>
                        </svg>
                        <a href="{{ url('/',['param'=>$article->category_title]) }}">{{ $article->category_name }}</a>
                    </p>
                    <p class="tag" title="标签">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-biaoqian"></use>
                        </svg>
                        @foreach($article->tags as $k => $tag)
                            <a href="{{ url('/',['param'=>$k]) }}" style="padding-right: 0.04rem;">{{ $tag }}</a>
                        @endforeach
                    </p>
                </div>
                <div class="detail">
                    <div class="image"><img src="{{ FILE_HOST. $article->thumb }}"></div>
                    <div class="content">{{ $article->digest }}</div>
                    <div class="show">
                        <p>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-rili-copy-copy"></use>
                            </svg> {{ $article->updated_at }}</p>
                        <a href="{{ url('/',['param'=>$article->id +1000]) }}">
                            <button class="btn btn-info btn-xs">查看全文>></button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @empty
        <div class="empty">抱歉，当前查询暂无数据！</div>
    @endforelse

    <div class="oh-page">
        @if($articles->links() != '')
            {{ $articles->links() }}
        @else
            <ul class="pagination">
                <li class="disabled"><span>&laquo;</span></li>
                <li class="active"><a href="">1</a></li>
                <li class="disabled"><span>&raquo;</span></li>
            </ul>
        @endif
    </div>
@endsection
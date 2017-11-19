<!-- 侧边栏 -->
<aside>
    <div class="image">
        <img src="{{ asset('img/code.png') }}">
    </div>
    <div class="tag">
        @foreach($tags as $tag)
        <a href="{{ url('/',['param'=>$tag->id]) }}" class="label label-{{ $tag->color }}">{{ $tag->name }}</a>
        @endforeach
    </div>
    <div class="intro">
        <script type="text/javascript">
            $(function(){

                $('div.intro div').eq(1).hide();
                $('div.intro ul li a').click(function(){
                    num = $(this).parent('li').index();
                    $('div.intro div').eq(num).show().siblings('div').hide();
                })

            })
        </script>
        <ul class="intro-choose">
            <li><a href="javascript:;">热门推荐</a></li>
            <li><a href="javascript:;">点击排行</a></li>
        </ul>
        <div class="hot">
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>说法是否
            </a>
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>24*7 支持
            </a>
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>图像的数量
            </a>
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>0的说法是否
            </a>
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>图像的数量
            </a>
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-tuijian"></use>
                </svg>免费 Window 空间托管
            </a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
        </div>
        <div class="top">
            <a href="#" class="list-group-item">
                <svg class="icon font-tuijan" aria-hidden="true">
                    <use xlink:href="#icon-paixingbang"></use>
                </svg> 1的说法是否
            </a>
            <a href="#" class="list-group-item">24*7 支持</a>
            <a href="#" class="list-group-item">免费 Window 空间托管</a>
            <a href="#" class="list-group-item">图像的数量</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
            <a href="#" class="list-group-item">每年更新成本</a>
        </div>
    </div>
</aside>
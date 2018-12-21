<header>
    <div>
        <div class="menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/') }}">Wshiyi</a>
                    </div>
                    <div class="collapse navbar-collapse" id="example-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="index"><a href="{{ url('/') }}">首页</a></li>
                            @foreach($categories as $category)
                            <li class="{{ Request::is($category['title']) ? 'active' : '' }}">
                                <a href="{{ url('/',['param'=>$category['title']]) }}">{{ $category['_name'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search">
            <script type="text/javascript">
                function change_color(){
                    myform = document.getElementById('myform');
                    myform.search.style.color = 'black';
                    myform.search.style.fontFamily = '微软雅黑';
                }
            </script>
            <form action="{{ url('search') }}" method="post" id="myform">
                {{ csrf_field() }}
                <input type="text" placeholder="Search" name="search"
                       value="{{ old('search') }}" onfocus="return change_color()">
                <button type="submit">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-sousuo"></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>

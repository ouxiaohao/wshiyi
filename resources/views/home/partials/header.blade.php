<header id="header">
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
                            <li :class="{'active': (nowCate==cate.id)}" v-for="cate in todos.categories">
                                <a :href="'{{ url('cate') }}/' + cate.id ">@{{ cate._name }}</a>
                            </li>
                            <li>
                                <a href="https://github.com/wshiyi/wshiyi" target="_blank">源码</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search">
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
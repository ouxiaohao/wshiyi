<header>
    <div>
        <div class="menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#example-navbar-collapse">
                            <span class="sr-only">切换导航</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">OuHao</a>
                    </div>
                    <div class="collapse navbar-collapse" id="example-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="index"><a href="<?php echo e(url('/')); ?>">首页</a></li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li class="<?php echo e(Request::is($category['title']) ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('/',['param'=>$category['title']])); ?>"><?php echo e($category['_name']); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
            <form action="<?php echo e(url('search')); ?>" method="post" id="myform">
                <?php echo e(csrf_field()); ?>

                <input type="text" placeholder="Search" name="search"
                       value="<?php echo e(old('search')); ?>" onfocus="return change_color()">
                <button type="submit">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-sousuo"></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>

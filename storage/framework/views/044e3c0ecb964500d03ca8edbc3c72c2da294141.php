<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header col-xs-2">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>" target="_blank" style="padding-left: 0.3rem;">OuHao</a>
    </div>
    <div class="col-xs-8">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo e(url('admin')); ?>">首页</a></li>
            <li><a href="<?php echo e(url('article/index')); ?>">博客</a></li>
            <li><a href="">配置</a></li>
        </ul>
    </div>
    <div class="col-xs-2">
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <?php if(!Auth::guest()): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo e(url('/password/reset')); ?>">修改密码</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                退出
                            </a>
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
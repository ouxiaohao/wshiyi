<?php $__env->startSection('title','首页'); ?>
<?php $__env->startSection('keywords','欧浩，博客，个人博客，laravel,laravel框架'); ?>
<?php $__env->startSection('description','欧浩博客是欧浩基于laravel框架独立开发的个人博客'); ?>

<?php $__env->startSection('article'); ?>
    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
        <section>
            <div class="section">
                <div class="title"><a href="<?php echo e(url('/',['param'=>$article->id +1000])); ?>"><?php echo e($article->title); ?></a>
                </div>
                <div class="belong">
                    <p class="cate" title="分类">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-fenlei"></use>
                        </svg>
                        <a href="<?php echo e(url('/',['param'=>$article->category_title])); ?>"><?php echo e($article->category_name); ?></a>
                    </p>
                    <p class="tag" title="标签">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-biaoqian"></use>
                        </svg>
                        <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <a href="<?php echo e(url('/',['param'=>$k])); ?>" style="padding-right: 0.04rem;"><?php echo e($tag); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </p>
                </div>
                <div class="detail">
                    <div class="image"><img src="<?php echo e(asset('storage/'. $article->thumb)); ?>"></div>
                    <div class="content"><?php echo e($article->digest); ?></div>
                    <div class="show">
                        <p>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-rili-copy-copy"></use>
                            </svg> <?php echo e($article->updated_at); ?></p>
                        <a href="<?php echo e(url('/',['param'=>$article->id +1000])); ?>">
                            <button class="btn btn-info btn-xs">查看全文>></button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
        <div class="empty">抱歉，当前查询暂无数据！</div>
    <?php endif; ?>

    <div class="oh-page">
        <?php if($articles->links() != ''): ?>
            <?php echo e($articles->links()); ?>

        <?php else: ?>
            <ul class="pagination">
                <li class="disabled"><span>&laquo;</span></li>
                <li class="active"><a href="">1</a></li>
                <li class="disabled"><span>&raquo;</span></li>
            </ul>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
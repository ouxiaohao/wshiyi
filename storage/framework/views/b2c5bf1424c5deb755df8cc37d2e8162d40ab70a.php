<?php $__env->startSection('title',$article['title']); ?>
<?php $__env->startSection('keywords',$article['keywords']); ?>
<?php $__env->startSection('description',$article['digest']); ?>

<?php $__env->startSection('article'); ?>
    <div class="article">
        <div class="title-name"><?php echo e($article['title']); ?></div>
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
                    <a href="<?php echo e(url('/',['param'=>$article['category_title']])); ?>"><?php echo e($article['category_name']); ?></a>
                </p>
                <p class="tag" title="标签">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-biaoqian"></use>
                    </svg>
                    <?php $__currentLoopData = $article['tag']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <a href="<?php echo e(url('/',['param'=>$k])); ?>"><?php echo e($v); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </p>
            </div>
        </div>
        <div class="article-content"><?php echo $article['content']; ?></div>
        <div class="sign">
            <p class="updated">更新于 <?php echo e(date('Y-m-d H:i:s',$article['updated_at'])); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
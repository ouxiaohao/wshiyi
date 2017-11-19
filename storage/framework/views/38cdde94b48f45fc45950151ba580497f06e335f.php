<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欧浩 - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <?php echo $__env->make('home.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<!-- 头部 -->
<?php echo $__env->make('home.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- 主体 -->
<main>
    <?php echo $__env->make('home.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- 主要内容 -->
    <article>
        <?php $__env->startSection('article'); ?>

        <?php echo $__env->yieldSection(); ?>
    </article>
</main>

<!-- 底部 -->
<?php echo $__env->make('home.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
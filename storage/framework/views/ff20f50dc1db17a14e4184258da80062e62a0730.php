<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欧浩 - <?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('admin.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<!-- 头部 -->
<?php echo $__env->make('admin.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- 主体 -->
<main>
    <?php $__env->startSection('main'); ?>
        <?php echo $__env->make('admin.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</main>
<!-- 底部 -->
<?php echo $__env->make('admin.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
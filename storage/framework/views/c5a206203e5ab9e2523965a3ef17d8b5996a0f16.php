<?php $__env->startSection('title', '文章列表'); ?>

<?php $__env->startSection('main'); ?>
    @parent
    <div class="container col-xs-9">
        <table class="table table-striped table-hover">
            <caption>
                <a href="<?php echo e(url('article/add')); ?>"><button type="button" class=" btn btn-primary">添加</button></a>
                <a href="javascript:;"><button type="button" class=" btn btn-danger" onclick="dels();">批量删除</button></a>
            </caption>
            <thead>
            <tr>
                <th>
                    <input type="checkbox" id="ids" onclick="checkAll(this);"><label for="ids">编号</label>
                </th>
                <th>标题</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" id="" name="ids" value=""><label for=""><?php echo e($v->id); ?></label>
                    </td>
                    <td><?php echo e($v->title); ?></td>
                    <td><?php echo e(date('Y-m-d',strtotime($v->created_at))); ?></td>
                    <td>
                        <a href="<?php echo e(url('article/edit', ['id'=>$v->id])); ?>" class="btn btn-info">编辑</a>
                        <a href="<?php echo e(url('article/del', ['id'=>$v->id])); ?>" class="btn btn-danger">删除</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
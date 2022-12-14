

<?php $__env->startSection('content'); ?>
<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo e(__('Useful Link')); ?></h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="<?php echo e(route('links.update',$link->id)); ?>" method="POST" enctype="multipart/form-data">
        	<?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('Title')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo e($link->name); ?>" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name"><?php echo e(__('URL')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo e($link->url); ?>" id="link" name="link" class="form-control" required>
                    </div>
                </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit"><?php echo e(__('Save')); ?></button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/links/edit.blade.php ENDPATH**/ ?>
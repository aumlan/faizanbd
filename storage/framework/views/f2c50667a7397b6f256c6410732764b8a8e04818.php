

<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title"><?php echo e(__('Inside Dhaka Shipping Cost')); ?></h3>
            </div>
            <form action="<?php echo e(route('shipping_configuration.update')); ?>" method="POST" enctype="multipart/form-data">
            

            <div class="panel-body">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" value="inside_dhaka">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" name="inside_dhaka" value="<?php echo e(\App\BusinessSetting::where('type', 'inside_dhaka')->first()->value); ?>">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit"><?php echo e(__('Update')); ?></button>
            </div>
            </form>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel">
            <div class="panel-heading bord-btm">
                <h3 class="panel-title"><?php echo e(__('Outsite Dhaka Shipping Cost')); ?></h3>
            </div>
            <form action="<?php echo e(route('shipping_configuration.update')); ?>" method="POST" enctype="multipart/form-data">
            <div class="panel-body">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" value="outside_dhaka">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" type="text" name="outside_dhaka" value="<?php echo e(\App\BusinessSetting::where('type', 'outside_dhaka')->first()->value); ?>">
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit"><?php echo e(__('Update')); ?></button>
            </div>
            </form>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/shipping_configuration/index.blade.php ENDPATH**/ ?>
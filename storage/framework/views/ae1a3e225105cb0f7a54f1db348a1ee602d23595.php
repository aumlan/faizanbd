

<?php $__env->startSection('content'); ?>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <div class="panel-control">
            <a href="<?php echo e(route('sellers.reject', $seller->id)); ?>" class="btn btn-default btn-rounded d-innline-block"><?php echo e(__('Reject')); ?></a></li>
            <a href="<?php echo e(route('sellers.approve', $seller->id)); ?>" class="btn btn-primary btn-rounded d-innline-block"><?php echo e(__('Accept')); ?></a>
        </div>
        <h3 class="panel-title"><?php echo e(__('Seller Verification')); ?></h3>
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <div class="panel-heading">
                <h3 class="text-lg"><?php echo e(__('User Info')); ?></h3>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Name')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->name); ?></p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Email')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->email); ?></p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Address')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->address); ?></p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Phone')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->phone); ?></p>
                </div>
            </div>


            <div class="panel-heading">
                <h3 class="text-lg"><?php echo e(__('Shop Info')); ?></h3>
            </div>

            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Shop Name')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->shop->name); ?></p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name"><?php echo e(__('Address')); ?></label>
                <div class="col-sm-9">
                    <p><?php echo e($seller->user->shop->address); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel-heading">
                <h3 class="text-lg"><?php echo e(__('Verification Info')); ?></h3>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <tbody>
                    <?php $__currentLoopData = json_decode($seller->verification_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($info->label); ?></th>
                            <?php if($info->type == 'text' || $info->type == 'select' || $info->type == 'radio'): ?>
                                <td><?php echo e($info->value); ?></td>
                            <?php elseif($info->type == 'multi_select'): ?>
                                <td>
                                    <?php echo e(implode(json_decode($info->value), ', ')); ?>

                                </td>
                            <?php elseif($info->type == 'file'): ?>
                                <td>
                                    <a href="<?php echo e(asset($info->value)); ?>" target="_blank" class="btn-info"><?php echo e(__('Click here')); ?></a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="<?php echo e(route('sellers.reject', $seller->id)); ?>" class="btn btn-default d-innline-block"><?php echo e(__('Reject')); ?></a></li>
                <a href="<?php echo e(route('sellers.approve', $seller->id)); ?>" class="btn btn-primary d-innline-block"><?php echo e(__('Accept')); ?></a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/sellers/verification.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(__('Conversations')); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Date')); ?></th>
                    <th><?php echo e(__('Title')); ?></th>
                    <th><?php echo e(__('Sender')); ?></th>
                    <th><?php echo e(__('Receiver')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($conversation->created_at); ?></td>
                        <td><?php echo e($conversation->title); ?></td>
                        <td>
                            <?php if($conversation->sender != null): ?>
                                <?php echo e($conversation->sender->name); ?>

                                <?php if($conversation->receiver_viewed == 0): ?>
                                    <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($conversation->receiver != null): ?>
                                <?php echo e($conversation->receiver->name); ?>

                                <?php if($conversation->sender_viewed == 0): ?>
                                    <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo e(route('conversations.admin_show', encrypt($conversation->id))); ?>"><?php echo e(__('View')); ?></a></li>
                                    <li><a onclick="confirm_modal('<?php echo e(route('conversations.admin_destroy', encrypt($conversation->id))); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/conversations/index.blade.php ENDPATH**/ ?>
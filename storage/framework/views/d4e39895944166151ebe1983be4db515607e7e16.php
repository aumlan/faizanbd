

<?php $__env->startSection('content'); ?>

<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(__('Support Desk')); ?></h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_support" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 300px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="Type ticket code & Enter">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php echo e(__('Ticket ID')); ?></th>
                    <th><?php echo e(__('Sending Date')); ?></th>
                    <th><?php echo e(__('Subject')); ?></th>
                    <th><?php echo e(__('User')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Last reply')); ?></th>
                    <th><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($ticket->user != null): ?>
                        <tr>
                            <td>#<?php echo e($ticket->code); ?></td>
                            <td><?php echo e($ticket->created_at); ?> <?php if($ticket->viewed == 0): ?> <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span> <?php endif; ?></td>
                            <td><?php echo e($ticket->subject); ?></td>
                            <td><?php echo e($ticket->user->name); ?></td>
                            <td>
                                <?php if($ticket->status == 'pending'): ?>
                                    <span class="badge badge-pill badge-danger">Pending</span>
                                <?php elseif($ticket->status == 'open'): ?>
                                    <span class="badge badge-pill badge-secondary">Open</span>
                                <?php else: ?>
                                    <span class="badge badge-pill badge-success">Solved</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(count($ticket->ticketreplies) > 0): ?>
                                    <?php echo e($ticket->ticketreplies->last()->created_at); ?>

                                <?php else: ?>
                                    <?php echo e($ticket->created_at); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('support_ticket.admin_show', encrypt($ticket->id))); ?>" class="btn-link"><?php echo e(__('View Details')); ?></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($tickets->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/support_tickets/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<div class="col-lg-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">#<?php echo e($conversation->title); ?> (Between <?php if($conversation->sender != null): ?> <?php echo e($conversation->sender->name); ?> <?php endif; ?> and <?php if($conversation->receiver != null): ?> <?php echo e($conversation->receiver->name); ?> <?php endif; ?>)
            </h3>
        </div>

        <div class="panel-body">
            <?php $__currentLoopData = $conversation->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" <?php if($message->user != null): ?>src="<?php echo e(asset($message->user->avatar_original)); ?>" <?php endif; ?>>
                    </a>
                    <div class="media-body">
                        <div class="comment-header">
                            <a href="#" class="media-heading box-inline text-main text-bold">
                                <?php if($message->user != null): ?>
                                    <?php echo e($message->user->name); ?>

                                <?php endif; ?>
                            </a>
                            <p class="text-muted text-sm"><?php echo e($message->created_at); ?></p>
                        </div>
                        <p>
                            <?php echo e($message->message); ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(Auth::user()->id == $conversation->receiver_id): ?>
                <form action="<?php echo e(route('messages.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="conversation_id" value="<?php echo e($conversation->id); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="4" name="message" placeholder="Type your reply" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-info"><?php echo e(__('Send')); ?></button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/conversations/show.blade.php ENDPATH**/ ?>
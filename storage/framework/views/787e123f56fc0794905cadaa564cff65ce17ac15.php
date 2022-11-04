

<?php $__env->startSection('content'); ?>

<div class="py-4 gry-bg">
    <div class="mt-4">
        <div class="container">
            <div class="bg-white px-3 pt-3">
                <div class="row gutters-10">
                    <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xxl-2 col-lg-4 col-sm-6 text-center">
                            <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="d-block p-3 mb-3 border rounded">
                                <img src="<?php echo e(asset($brand->logo)); ?>" class="lazyload img-fit" height="50" alt="<?php echo e(__($brand->name)); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/all_brand.blade.php ENDPATH**/ ?>
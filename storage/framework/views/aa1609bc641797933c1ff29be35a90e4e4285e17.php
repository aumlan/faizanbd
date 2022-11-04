

<?php $__env->startSection('meta_title'); ?><?php echo e($page->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($page->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($page->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($page->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($page->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(asset($page->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($page->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($page->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(asset($page->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(single_price($page->unit_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($page->meta_title); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php echo e(route('product', $page->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(asset($page->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($page->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(single_price($page->unit_price)); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="slice--offset parallax-section parallax-section-lg b-xs-bottom gry-bg">
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-6 col-md-8">
                <h1 class="heading heading-1 strong-400 text-normal">
                    <?php echo e($page->title); ?>

                </h1>
            </div>
        </div>
    </div>
</section>
<section class="bg-white py-5">
	<div class="container">
		<?php echo e($page->content); ?>

	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/custom_page.blade.php ENDPATH**/ ?>
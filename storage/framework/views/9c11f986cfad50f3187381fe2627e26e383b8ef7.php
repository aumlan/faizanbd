<section class="mb-2 mb-lg-3">
    <div class="container">
        <div class="px-2 py-2 p-md-4 bg-white shadow-sm">
            <div class="section-title-1 clearfix">
                <h3 class="heading-5 strong-700 mb-0 float-left">
                    <span class="mr-4"><?php echo e(__('Featured Products')); ?></span>
                </h3>
            </div>
            <div class="caorusel-box arrow-round gutters-5">
                <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="6" data-slick-lg-items="6"  data-slick-md-items="3" data-slick-sm-items="3" data-slick-xs-items="3">
                    <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="caorusel-card mb-1">
                        <div class="product-card-2 card card-product shop-cards shop-tech product-hover">
                            <div class="card-body p-0">
                                <?php if($product->discount>0): ?>
                                <?php if($product->discount_type == "amount"): ?>
                                <span class="percentage-span-new"><font class="percentage-amount-new">
                                    <?php echo e(__($product->discount)); ?>TK</font>
                                    <p style="line-height: 0.5rem;"><font class="percentage-discount-amount-new">ছাড়</font></p>
                                    </span>
                                    <?php else: ?>
                                    <span class="percentage-span-new"><font class="percentage-amount-new">
                                    <?php echo e(__($product->discount)); ?>%</font>
                                    <p style="line-height: 0.5rem;"><font class="percentage-discount-amount-new">ছাড়</font></p>
                                    </span>
                                    <?php endif; ?>
                                <?php endif; ?>


                                <div class="card-image">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                        <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($product->featured_img ?? $product->thumbnail_img )); ?>" alt="<?php echo e(__($product->name)); ?>">
                                    </a>
                                </div>


                                <div class="p-md-3 p-2">
                                    <h2 class="product-title p-0 text-truncate">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e(__($product->name)); ?></a>
                                    </h2>
                                    
                                    
                                    <?php if(auth()->guard()->check()): ?>
                                    <div class="price-box">

                                        <?php if(auth()->user()->user_type=='seller'): ?>
                                        <span class="product-price strong-600">
                                            <?php echo e(home_base_price($product->id)); ?>

                                        </span>
                                        <?php else: ?>
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>

                                        <?php endif; ?>
                                      
                                    </div>
                                    
                                    <?php if(auth()->user()->user_type=='seller'): ?>
                                    <?php if(home_base_price($product->id) != home_reseller_discounted_base_price($product->id)): ?>
                                    <div class="price-box">
                                       Wholesale:<span class="product-price strong-600">  <?php echo e(home_reseller_discounted_base_price($product->id)); ?>

                                       </span>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->guest()): ?>
                                    <div class="price-box">
                                        <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                            <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                        <?php endif; ?>
                                        <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                    </div>
                                    <?php endif; ?>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/partials/featured_products_section.blade.php ENDPATH**/ ?>
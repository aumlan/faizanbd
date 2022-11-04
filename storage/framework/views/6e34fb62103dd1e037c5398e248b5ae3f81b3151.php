<?php $__currentLoopData = \App\HomeCategory::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $homeCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($homeCategory->category != null): ?>
        <section class="mb-2 mb-lg-3">
            <div class="container">
                <div class="px-2 py-2 p-md-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__($homeCategory->category->name)); ?></span>
                        </h3>
                        <ul class="inline-links float-right nav mt-2 mb-2 m-lg-0">
                            <li><a href="<?php echo e(route('products.category', $homeCategory->category->slug)); ?>" class="active">View More</a></li>
                        </ul>
                    </div>
                    <div class="caorusel-box arrow-round gutters-5">
                        <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="6" data-slick-lg-items="6"  data-slick-md-items="3" data-slick-sm-items="3" data-slick-xs-items="3">
                        <?php $__currentLoopData = filter_products(\App\Product::where('published', 1)->where('category_id', $homeCategory->category->id))->latest()->limit(12)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card mb-1">
                                <div class="product-box-2 alt-box my-0 product-hover">
                                    <div class="position-relative overflow-hidden">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block product-image h-100 text-center">
                                            <img class="img-fit lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($product->featured_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                        </a>
                                        <div class="product-btns clearfix">
                                            <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)" tabindex="0">
                                                <i class="la la-heart-o"></i>
                                            </button>
                                            <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)" tabindex="0">
                                                <i class="la la-refresh"></i>
                                            </button>
                                            <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" tabindex="0">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-md-3 p-2">
                                        <h2 class="product-title p-0">
                                            <a href="<?php echo e(route('product', $product->slug)); ?>" class=" text-truncate"><?php echo e(__($product->name)); ?></a>
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
                                        
                                        
                                        <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                            <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                                <?php echo e(__('Club Point')); ?>:
                                                <span class="strong-700 float-right"><?php echo e($product->earn_point); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(document).on({
        mouseover:function(e){
            $('.get_quote_link').hide();
            $(this).children().children('.get_quote_link').show();
        }
    },'.product-hover');
    $(document).on({
        mouseout:function(e){
            $('.get_quote_link').hide();
        }
    },'.product-hover');
    </script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/partials/home_categories_section.blade.php ENDPATH**/ ?>
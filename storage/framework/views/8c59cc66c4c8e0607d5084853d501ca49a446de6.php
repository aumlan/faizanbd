

<?php $__env->startSection('content'); ?>

    <section class="home-banner-area mb-2 mb-lg-3">
        <div class="container">
            <div class="row no-gutters position-relative">
                

                <?php
                $num_todays_deal = count(filter_products(\App\Product::where('published', 1)->where('todays_deal', 1 ))->get());
                ?>

                <div class="col-lg-12 order-1 order-lg-0 bg-white mt-3">
<!--                       <div class="col-lg-12 position-static order-2 order-lg-0 stry-bg d-none d-lg-block">-->
<!--<div id="menu">-->
<!--     <ul>-->
<!--        <?php $__currentLoopData = \App\Menu::where('featured', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--          <li><a href="<?php echo e($menu->slug); ?>"><?php echo e($menu->name); ?></a></li>-->
<!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--     </ul>-->
<!--</div>-->
<!--</div>-->
                    
                    <div class="home-slide">
                        <div class="home-slide">
                            <div class="slick-carousel e-scroll" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                                <?php $__currentLoopData = \App\Slider::where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="" style="height:360px;">
                                        <a href="<?php echo e($slider->link); ?>" target="_blank">
                                        <img class="d-block w-100 h-100 lazyload" src="<?php echo e(asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(asset($slider->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="trending-category  d-none d-lg-block">
                        <div class="row no-gutters">

                            <div class="col-lg-12 p-0">
                                <div class="info-big-box">
                                    <div class="row">
                                     <div class="info-box col-lg-3">
                                                    <div class="icon ico1">
                                                        <img src="<?php echo e(asset('img/1561348133service1.png')); ?>">
                                                    </div>
                                                    <div class="info">
                                                        <div class="details">
                                                            <h4 class="title">FREE SHIPPING</h4>
                                                            <p class="text">
                                                                Tearms & Condition Applied
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            
                                            
                                            <div class="info-box col-lg-3">
                                                    <div class="icon ico2">
                                                        <img src="<?php echo e(asset('img/1561348143service3.png')); ?>">
                                                    </div>
                                                    <div class="info">
                                                        <div class="details">
                                                            <h4 class="title">7 DAY RETURNS</h4>
                                                            <p class="text">
                                                                7-Day Return Policy
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                            <div class="info-box col-lg-3">
                                                    <div class="icon ico3">
                                                        <img src="<?php echo e(asset('img/1561348138service2.png')); ?>">
                                                    </div>
                                                    <div class="info">
                                                        <div class="details">
                                                            <h4 class="title">PAYMENT METHOD</h4>
                                                            <p class="text">
                                                               Secure Payment
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-box col-lg-3">
                                                    <div class="icon ico4">
                                                        <img src="<?php echo e(asset('img/1561348147service4.png')); ?>">
                                                    </div>
                                                    <div class="info">
                                                        <div class="details">
                                                            <h4 class="title">HELP CENTER</h4>
                                                            <p class="text">
                                                               24/7 Online Support
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div>
                            </div>

           
                        </div>
                    </div>
                </div>
                 

                

            </div>
        </div>
    </section>

    <section class="mb-2 mb-lg-3">
        <div class="container">
            <div class="col-12 px-2 py-2 p-md-3 bg-white shadow-sm d-block d-lg-inline-block d-md-inline-block">
                <div class="clearfix">
                    <h3 class="heading-5 strong-700 mb-2 float-left">
                        <span class="mr-4">Categories</span>
                    </h3>
                    <ul class="inline-links float-right">
                        <li style="margin-top: 7px"><a style="" href="<?php echo e(route('categories.all')); ?>" class="h-cat active">See More</a></li>
                    </ul>
                </div>
            
                <div class="caorusel-box arrow-round gutters-5">
                    <div class="slick-carousel" data-slick-items="8" data-slick-lg-items="2"  data-slick-md-items="8" data-slick-sm-items="3" data-slick-xs-items="4" data-slick-rows="2">
                        
                                            <?php $__currentLoopData = \App\Category::where('featured',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card cat-bo">
                                <div class="row no-gutters product-box-2 align-items-center cat-before" style="border:none">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="d-block h-100">
                                                <img style="width: 60%;padding: 10px" class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($category->banner)); ?>" alt="<?php echo e(__($category->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-1">
                                            <h2 style="text-align: center;" class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.category', $category->slug)); ?>"><?php echo e(__($category->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php $__currentLoopData = \App\SubCategory::where('featured',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card cat-bo">
                                <div class="row no-gutters product-box-2 align-items-center cat-before" style="border:none">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.subcategory', $category->slug)); ?>" class="d-block h-100">
                                                <img style="width: 60%;padding: 10px" class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($category->icon)); ?>" alt="<?php echo e(__($category->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-1">
                                            <h2 style="text-align: center;" class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.subcategory', $category->slug)); ?>"><?php echo e(__($category->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php $__currentLoopData = \App\SubSubCategory::where('featured',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card cat-bo">
                                <div class="row no-gutters product-box-2 align-items-center cat-before" style="border:none">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.subsubcategory', $category->slug)); ?>" class="d-block h-100">
                                                <img style="width: 60%;padding: 10px" class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($category->icon)); ?>" alt="<?php echo e(__($category->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-1">
                                            <h2 style="text-align: center;" class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.subsubcategory', $category->slug)); ?>"><?php echo e(__($category->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
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

    <?php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
    ?>
    <?php if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date): ?>
    <section class="mb-2 mb-lg-3">
        <div class="container">
            <div class="px-2 py-2 p-md-4 bg-flush shadow-sm">
                <div class="section-title-1 clearfix ">
                    <h3 class="heading-5 strong-700 mb-0 float-left">
                        <?php echo e(__('Flash Sale')); ?>

                    </h3>
                    <div class="flash-deal-box float-left">
                        <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="<?php echo e(date('m/d/Y', $flash_deal->end_date)); ?>" data-countdown-label="show"></div>
                    </div>
                    <ul class="inline-links float-right mt-2">
                        <li><a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>" class="active">View More</a></li>
                    </ul>
                </div>
                <div class="caorusel-box arrow-round gutters-5 ">
                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="6" data-slick-lg-items="6"  data-slick-md-items="3" data-slick-sm-items="3" data-slick-xs-items="3">
                    <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        ?>
                        <?php if($product != null && $product->published != 0): ?>
                            <div class="caorusel-card mb-1">
                                <div class="product-card-2 card card-product shop-cards product-hover" >
                                    <div class="card-body p-0">
                                        <div class="card-image">
                                            <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block">
                                                <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($product->featured_img ?? $product->featured_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                            </a>
                                        </div>

                                        <div class="p-md-3 p-2">
                                            <div class="price-box">
                                                <?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
                                                    <del class="old-product-price strong-400"><?php echo e(home_base_price($product->id)); ?></del>
                                                <?php endif; ?>
                                                <span class="product-price strong-600"><?php echo e(home_discounted_base_price($product->id)); ?></span>
                                            </div>
                                            <div class="star-rating star-rating-sm mt-1">
                                                <?php echo e(renderStarRating($product->rating)); ?>

                                            </div>
                                            <h2 class="product-title p-0">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class=" text-truncate"><?php echo e(__($product->name)); ?></a>
                                            </h2>
                                            <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                                <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                                    <?php echo e(__('Club Point')); ?>:
                                                    <span class="strong-700 float-right"><?php echo e($product->earn_point); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <div class="mb-2 mb-lg-3  d-lg-block">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 1)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 1)->where('published', 1)->get())); ?> col-6">
                        <div class="media-banner mb-1 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(asset($banner->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="section_featured">

    </div>

    <div id="section_best_selling">

    </div>

    <div id="section_home_categories">

    </div>

    <?php if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1): ?>
        <?php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        ?>
       <?php if(count($customer_products) > 0): ?>
           <section class="mb-3">
               <div class="container">
                   <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                       <div class="section-title-1 clearfix">
                           <h3 class="heading-5 strong-700 mb-0 float-left">
                               <span class="mr-4"><?php echo e(__('Classified Ads')); ?></span>
                           </h3>
                           <ul class="inline-links float-right">
                               <li><a href="<?php echo e(route('customer.products')); ?>" class="active"><?php echo e(__('View More')); ?></a></li>
                           </ul>
                       </div>
                       <div class="caorusel-box arrow-round">
                           <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                               <?php $__currentLoopData = $customer_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="product-card-2 card card-product my-2 mx-1 mx-sm-2 shop-cards shop-tech">
                                       <div class="card-body p-0">
                                           <div class="card-image">
                                               <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>" class="d-block">
                                                   <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($customer_product->featured_img)); ?>" alt="<?php echo e(__($customer_product->name)); ?>">
                                               </a>
                                           </div>

                                           <div class="p-sm-3 p-2">
                                               <div class="price-box">
                                                   <span class="product-price strong-600"><?php echo e(single_price($customer_product->unit_price)); ?></span>
                                               </div>
                                               <h2 class="product-title p-0 text-truncate-1">
                                                   <a href="<?php echo e(route('customer.product', $customer_product->slug)); ?>"><?php echo e(__($customer_product->name)); ?></a>
                                               </h2>
                                               <div>
                                                   <?php if($customer_product->conditon == 'new'): ?>
                                                       <span class="product-label label-hot"><?php echo e(__('new')); ?></span>
                                                   <?php elseif($customer_product->conditon == 'used'): ?>
                                                       <span class="product-label label-hot"><?php echo e(__('Used')); ?></span>
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
       <?php endif; ?>
   <?php endif; ?>

    <div class="mb-2 mb-lg-3">
        <div class="container">
            <div class="row gutters-10">
                <?php $__currentLoopData = \App\Banner::where('position', 2)->where('published', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-<?php echo e(12/count(\App\Banner::where('position', 2)->where('published', 1)->get())); ?> col-6 ">
                        <div class="media-banner mb-1 mb-lg-0">
                            <a href="<?php echo e($banner->url); ?>" target="_blank" class="banner-container">
                                <img src="<?php echo e(asset('frontend/images/placeholder-rect.jpg')); ?>" data-src="<?php echo e(asset($banner->photo)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="section_best_sellers">

    </div>

    <section class="mb-2 mb-lg-3">
        <div class="container d-none d-lg-block">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top 10 Catogories')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('categories.all')); ?>" class="active"><?php echo e(__('View All Catogories')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        <?php $__currentLoopData = \App\Category::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($category->banner)); ?>" alt="<?php echo e(__($category->name)); ?>" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($category->name)); ?></div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><?php echo e(__('Top 10 Brands')); ?></span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="<?php echo e(route('brands.all')); ?>" class="active"><?php echo e(__('View All Brands')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        <?php $__currentLoopData = \App\Brand::where('top', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-6">
                                <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e(__($brand->name)); ?>" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4"><?php echo e(__($brand->name)); ?></div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('.e-scroll').slick({
    slidesToScroll: 1,
    autoplay: true,
                    dots: true,
                    arrows: true,
                    prevArrow:
                        '<button type="button" class="slick-prev"><i class="la la-angle-left"></i></button>',
                    nextArrow:
                        '<button type="button" class="slick-next"><i class="la la-angle-right"></i></button>'
   });
        $(document).ready(function(){
            $.post('<?php echo e(route('home.section.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_featured').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.best_selling')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_selling').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.home_categories')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_home_categories').html(data);
                slickInit();
            });

            $.post('<?php echo e(route('home.section.best_sellers')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_sellers').html(data);
                slickInit();
            });
            
        });

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/index.blade.php ENDPATH**/ ?>
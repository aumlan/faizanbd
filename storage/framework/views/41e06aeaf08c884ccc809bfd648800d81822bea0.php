

<?php $__env->startSection('meta_title'); ?><?php echo e($detailedProduct->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($detailedProduct->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($detailedProduct->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(asset($detailedProduct->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(asset($detailedProduct->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(single_price($detailedProduct->unit_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($detailedProduct->meta_title); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php echo e(route('product', $detailedProduct->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(asset($detailedProduct->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($detailedProduct->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(single_price($detailedProduct->unit_price)); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="breadcrumb-area">
        <div class="container">

            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        

                        <?php if(isset($detailedProduct->category)): ?>
                            <li><a href="<?php echo e(route('products.category', $detailedProduct->category->slug)); ?>"><?php echo e($detailedProduct->category->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($detailedProduct->subcategory)): ?>
                            <li><a href="<?php echo e(route('products.category', $detailedProduct->subcategory->slug)); ?>"><?php echo e($detailedProduct->subcategory->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($detailedProduct->subsubcategory)): ?>
                            <li><a href="<?php echo e(route('products.category', $detailedProduct->subsubcategory->slug)); ?>"><?php echo e($detailedProduct->subsubcategory->name); ?></a></li>
                        <?php endif; ?>
                        
                        <li class="active text-truncate"><a href="<?php echo e(route('product', $detailedProduct->slug)); ?>"><?php echo e(__($detailedProduct->name)); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP GRID WRAPPER -->
    <section class="product-details-area gry-bg">
        <div class="container">

            <div class="bg-white">

                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-5 mb-1">
                        <div class="product-gal sticky-top d-flex flex-row-reverse">
                            
                                <div class="product-gal-img">
                                    <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" class="xzoom img-fluid lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($detailedProduct->featured_img)); ?>" xoriginal="<?php echo e(asset($detailedProduct->featured_img)); ?>" />

                                    
                                </div>
                                
                                <div class="product-gal-thumb d-lg-block">
                                    <div class="xzoom-thumbs">
                                        
                                            <?php if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0): ?>
                                        <?php $__currentLoopData = json_decode($detailedProduct->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(asset($photo)); ?>">
                                                <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" class="xzoom-gallery lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" width="80" data-src="<?php echo e(asset($photo)); ?>"  <?php if($key == 0): ?> xpreview="<?php echo e(asset($photo)); ?>" <?php endif; ?>>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                

                          
                        </div>
                    </div>

                    <div class="col-lg-4 mb-1">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h1 class="product-title mb-2">
                                <?php echo e(__($detailedProduct->name)); ?>

                            </h1>

                            <div class="row align-items-center my-1">
                                <div class="col-6">
                                    <!-- Rating stars -->
                                    <div class="rating">
                                        <?php
                                            $total = 0;
                                            $total += $detailedProduct->reviews->count();
                                        ?>
                                        <span class="star-rating">
                                            <?php echo e(renderStarRating($detailedProduct->rating)); ?>

                                        </span>
                                        <span class="rating-count ml-1">(<?php echo e($total); ?> <?php echo e(__('reviews')); ?>)</span>
                                    </div>
                                    <h5>SKU :   <?php echo e(__($detailedProduct->sku)); ?></h5>

                                </div>
                                <div class="col-6 text-right">
                                    <ul class="inline-links inline-links--style-1">
                                        <?php
                                            $qty = 0;
                                            if($detailedProduct->variant_product){
                                                foreach ($detailedProduct->stocks as $key => $stock) {
                                                    $qty += $stock->qty;
                                                }
                                            }
                                            else{
                                                $qty = $detailedProduct->current_stock;
                                            }
                                        ?>
                                        <?php if($qty > 0): ?>
                                            <li>
                                                <span class="badge badge-md badge-pill bg-green"><?php echo e(__('In stock')); ?></span>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <span class="badge badge-md badge-pill bg-red"><?php echo e(__('Out of stock')); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>


                            <hr>

                            <div class="row align-items-center">
                                <div class="sold-by col-auto">
                                    <small class="mr-2"><?php echo e(__('Sold by')); ?>: </small><br>
                                    <?php if($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                                        <a href="<?php echo e(route('shop.visit', $detailedProduct->user->shop->slug)); ?>"><?php echo e($detailedProduct->user->shop->name); ?></a>
                                    <?php else: ?>
                                        <?php echo e(__('Inhouse product')); ?>

                                    <?php endif; ?>
                                </div>
                                <?php if(\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1): ?>
                                    <div class="col-auto">
                                        <button class="btn" onclick="show_chat_modal()"><?php echo e(__('Message Seller')); ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <hr>

                            <?php if(auth()->guard()->guest()): ?>

                            <?php if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id)): ?>

                                <div class="row no-gutters mt-4">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price-old">
                                            <del>
                                                <?php echo e(home_price($detailedProduct->id)); ?>

                                                <span>/<?php echo e($detailedProduct->unit); ?></span>
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <div class="col-3">
                                        <div class="product-description-label mt-1"><?php echo e(__('Discount Price')); ?>:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_discounted_price($detailedProduct->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e($detailedProduct->unit); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                 <?php if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id)): ?>

                                <div class="row no-gutters mt-4">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price-old">
                                            <del>
                                                <?php echo e(home_price($detailedProduct->id)); ?>

                                                <span>/<?php echo e($detailedProduct->unit); ?></span>
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters mt-3">
                                    <div class="col-3">
                                        <div class="product-description-label mt-1"><?php echo e(__('Discount Price')); ?>:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_discounted_price($detailedProduct->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e($detailedProduct->unit); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Price')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_discounted_price($detailedProduct->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e($detailedProduct->unit); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->user_type=='seller'): ?>

                                <div class="row no-gutters mt-3">
                                    <div class="col-3">
                                        <div class="product-description-label"><?php echo e(__('Wholesale')); ?>:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="product-price">
                                            <strong>
                                                <?php echo e(home_reseller_discounted_base_price($detailedProduct->id)); ?>

                                            </strong>
                                            <span class="piece">/<?php echo e($detailedProduct->unit); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>


                            <?php endif; ?>
                            <?php endif; ?>

                            <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $detailedProduct->earn_point > 0): ?>
                                <div class="row no-gutters mt-4">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Club Point')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-inline-block club-point bg-soft-base-1 border-light-base-1 border">
                                            <span class="strong-700"><?php echo e($detailedProduct->earn_point); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <hr>

                            <form id="option-choice-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($detailedProduct->id); ?>">

                                <?php if($detailedProduct->choice_options != null): ?>
                                    <?php $__currentLoopData = json_decode($detailedProduct->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2 "><?php echo e(\App\Attribute::find($choice->attribute_id)->name); ?>:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                                <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <input type="radio" id="<?php echo e($choice->attribute_id); ?>-<?php echo e($value); ?>" name="attribute_id_<?php echo e($choice->attribute_id); ?>" value="<?php echo e($value); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                        <label for="<?php echo e($choice->attribute_id); ?>-<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if(count(json_decode($detailedProduct->colors)) > 0): ?>
                                    <div class="row no-gutters">
                                        <div class="col-2">
                                            <div class="product-description-label mt-2"><?php echo e(__('Color')); ?>:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-color mb-1">
                                                <?php $__currentLoopData = json_decode($detailedProduct->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <input type="radio" id="<?php echo e($detailedProduct->id); ?>-color-<?php echo e($key); ?>" name="color" value="<?php echo e($color); ?>" <?php if($key == 0): ?> checked <?php endif; ?>>
                                                        <label style="background: <?php echo e($color); ?>;" for="<?php echo e($detailedProduct->id); ?>-color-<?php echo e($key); ?>" data-toggle="tooltip"></label>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>
                                <?php endif; ?>

                                <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2"><?php echo e(__('Quantity')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="avialable-amount">(<span id="available-quantity"><?php echo e($qty); ?></span> <?php echo e(__('available')); ?>)</div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-3">
                                        <div class="product-description-label"><?php echo e(__('Total Price')); ?>:</div>
                                    </div>
                                    <div class="col-9">
                                        <div class="product-price">
                                            <strong id="chosen_price">

                                            </strong>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Buy Now button -->
                                    <?php if($qty > 0): ?>
                                        <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" onclick="buyNow()">
                                            <i class="la la-shopping-cart"></i> <?php echo e(__('Buy Now')); ?>

                                        </button>
                                        <button type="button" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart" onclick="addToCart()">
                                            <i class="la la-shopping-cart"></i>
                                            <span class=" d-md-inline-block"> <?php echo e(__('Add to cart')); ?></span>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-styled btn-base-3 btn-icon-left strong-700" disabled>
                                            <i class="la la-cart-arrow-down"></i> <?php echo e(__('Out of Stock')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Add to wishlist button -->
                                    <button type="button" class="btn pl-0 btn-link strong-700" onclick="addToWishList(<?php echo e($detailedProduct->id); ?>)">
                                        <?php echo e(__('Save Item')); ?>

                                    </button>
                                    <!-- Add to compare button -->
                                    <button type="button" class="btn btn-link btn-icon-left strong-700" onclick="addToCompare(<?php echo e($detailedProduct->id); ?>)">
                                        <?php echo e(__('Add to compare')); ?>

                                    </button>
                                    <?php if(Auth::check() && \App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated && (\App\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status): ?>
                                        <?php
                                            if(Auth::check()){
                                                if(Auth::user()->referral_code == null){
                                                    Auth::user()->referral_code = substr(Auth::user()->id.str_random(10), 0, 10);
                                                    Auth::user()->save();
                                                }
                                                $referral_code = Auth::user()->referral_code;
                                                $referral_code_url = URL::to('/product').'/'.$detailedProduct->slug."?product_referral_code=$referral_code";
                                            }
                                        ?>
                                        <div class="form-group">
                                            <textarea id="referral_code_url" class="form-control" readonly type="text" style="display:none"><?php echo e($referral_code_url); ?></textarea>
                                        </div>
                                        <button type=button id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="<?php echo e(__('Copied')); ?>" onclick="CopyToClipboard('referral_code_url')"><?php echo e(__('Copy the Promote Link')); ?></button>
                                    <?php endif; ?>
                                </div>
                            </div>


                            
                            
                            <hr class="mt-4">
                            <div class="row no-gutters mt-4">
                                <div class="col-2">
                                    <div class="product-description-label mt-2"><?php echo e(__('Share')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <div id="share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 pl-2 d-none d-lg-block">
                        <?php
                    $generalsetting = \App\GeneralSetting::first();
                ?>
                        <div class="row no-gutters mt-3 ">
                                    <div class="col-1">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-5">
                                        <div class="product-description-label">
                                        <?php echo e(__('Call')); ?>:</div>
                                    </div>
                                    <div class="col-6">
                                        <a href="tel:<?php echo e($generalsetting->phone); ?>" target="_blank">
                                            <?php echo e($generalsetting->phone); ?>

                                        </a>
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-plane" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-5">
                                        <div class="product-description-label">

                                        <?php echo e(__('Outside Dhaka')); ?>:</div>
                                    </div>
                                    <div class="col-6">
                                            4-5 working days
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-truck" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-5">
                                        <div class="product-description-label">

                                        <?php echo e(__('Inside Dhaka')); ?>:</div>
                                    </div>
                                    <div class="col-6">
                                            2-3 working days
                                      
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-money" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                        <span> </span>
                                    </div>
                                    
                                    <div class="col-5">
                                        <div class="product-description-label">

                                        <?php echo e(__(' Cash on Delivery :')); ?></div>
                                    </div>
                                    <div class="col-6">
                                        <?php echo e(__(' Available')); ?>

                                    </div>
                                    
                        </div>



                        <?php
                                $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                            ?>
                            <?php if($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable): ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Refund')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <a href="<?php echo e(route('returnpolicy')); ?>" target="_blank"> <?php if($refund_sticker != null && $refund_sticker->value != null): ?> <img src="<?php echo e(asset($refund_sticker->value)); ?>" height="36"> <?php else: ?> <img src="<?php echo e(asset('frontend/images/refund-sticker.jpg')); ?>" height="36"> <?php endif; ?></a>
                                        <a href="<?php echo e(route('returnpolicy')); ?>" class="ml-2" target="_blank">View Policy</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($detailedProduct->added_by == 'seller'): ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-5">
                                        <div class="product-description-label"><?php echo e(__('Seller Guarantees')); ?>:</div>
                                    </div>
                                    <div class="col-7">
                                        <?php if($detailedProduct->user->seller->verification_status == 1): ?>
                                            <?php echo e(__('Verified seller')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('Non verified seller')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6"><?php echo e(__('Payment')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="inline-links">
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/visa.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/mastercard.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/maestro.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/paypal.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/cod.png')); ?>" width="30" class="lazyload">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row no-gutters mt-3">
                            	<div class="box-title" style="padding: 5px;font-size: 18px;background: #ddd;width: 100%;margin-bottom: 5px;">
                            <?php echo e(__('Recently viewed products')); ?>

                        </div>
                            	<?php if(Session::has('recent_view')): ?>
                            	<?php
                            		// print_r(Session::get('recent_view'));
                            	?>
                            	<?php $__currentLoopData = Session::get('recent_view'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            	<?php
                            	// print_r($cartItem['id']);
                            	// die();
                            	$top_product = \App\Product::find($cartItem['id']);
                            	?>

                            	<div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="<?php echo e(route('product', $top_product->slug)); ?>">
                                            <img class="img-fit lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($top_product->featured_img)); ?>" alt="<?php echo e(__($top_product->name)); ?>">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="<?php echo e(route('product', $top_product->slug)); ?>" class="d-block"><?php echo e($top_product->name); ?></a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <?php echo e(renderStarRating($top_product->rating)); ?>

                                        </div>
                                        <div class="price-box">
                                            <!-- <?php if(home_base_price($top_product->id) != home_discounted_base_price($top_product->id)): ?>
                                                <del class="old-product-price strong-400"><?php echo e(home_base_price($top_product->id)); ?></del>
                                            <?php endif; ?> -->
                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($top_product->id)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            	<?php endif; ?>
                            </div>
                        
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 d-block d-xl-block">
                    <div class="seller-info-box mb-3">
                        <div class="sold-by position-relative">
                            <?php if($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1 && $detailedProduct->user->seller->verification_status == 1): ?>
                                <div class="position-absolute medal-badge">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2">
                                        <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                        <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                        <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                        <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                        60,116.6 124.1,116.6 "/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <div class="title"><?php echo e(__('Sold By')); ?></div>
                            <?php if($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1): ?>
                                <a href="<?php echo e(route('shop.visit', $detailedProduct->user->shop->slug)); ?>" class="name d-block"><?php echo e($detailedProduct->user->shop->name); ?>

                                <?php if($detailedProduct->user->seller->verification_status == 1): ?>
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                <?php else: ?>
                                    <span class="ml-2"><i class="fa fa-times-circle" style="color:red"></i></span>
                                <?php endif; ?>
                                </a>
                                <div class="location"><?php echo e($detailedProduct->user->shop->address); ?></div>
                            <?php else: ?>
                                <?php echo e(env('APP_NAME')); ?>

                            <?php endif; ?>
                            <?php
                                $total = 0;
                                $rating = 0;
                                foreach ($detailedProduct->user->products as $key => $seller_product) {
                                    $total += $seller_product->reviews->count();
                                    $rating += $seller_product->reviews->sum('rating');
                                }
                            ?>

                            <div class="rating text-center d-block">
                                <span class="star-rating star-rating-sm d-block">
                                    <?php if($total > 0): ?>
                                        <?php echo e(renderStarRating($rating/$total)); ?>

                                    <?php else: ?>
                                        <?php echo e(renderStarRating(0)); ?>

                                    <?php endif; ?>
                                </span>
                                <span class="rating-count d-block ml-0">(<?php echo e($total); ?> <?php echo e(__('customer reviews')); ?>)</span>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <?php if($detailedProduct->added_by == 'seller'): ?>
                                <div class="col">
                                    <a href="<?php echo e(route('shop.visit', $detailedProduct->user->shop->slug)); ?>" class="d-block store-btn"><?php echo e(__('Visit Store')); ?></a>
                                </div>
                                <div class="col">
                                    <ul class="social-media social-media--style-1-v4 text-center">
                                        <li>
                                            <a href="<?php echo e($detailedProduct->user->shop->facebook); ?>" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($detailedProduct->user->shop->google); ?>" class="google" target="_blank" data-toggle="tooltip" data-original-title="Google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($detailedProduct->user->shop->twitter); ?>" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e($detailedProduct->user->shop->youtube); ?>" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="seller-top-products-box bg-white sidebar-box mb-3  d-none d-lg-block">
                        <div class="box-title">
                            <?php echo e(__('Top Selling Products From This Seller')); ?>

                        </div>
                        <div class="box-content">
                            <?php $__currentLoopData = filter_products(\App\Product::where('user_id', $detailedProduct->user_id)->orderBy('num_of_sale', 'desc'))->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="<?php echo e(route('product', $top_product->slug)); ?>">
                                            <img class="img-fit lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($top_product->featured_img)); ?>" alt="<?php echo e(__($top_product->name)); ?>">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="<?php echo e(route('product', $top_product->slug)); ?>" class="d-block"><?php echo e($top_product->name); ?></a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <?php echo e(renderStarRating($top_product->rating)); ?>

                                        </div>
                                        <div class="price-box">
                                            <!-- <?php if(home_base_price($top_product->id) != home_discounted_base_price($top_product->id)): ?>
                                                <del class="old-product-price strong-400"><?php echo e(home_base_price($top_product->id)); ?></del>
                                            <?php endif; ?> -->
                                            <span class="product-price strong-600"><?php echo e(home_discounted_base_price($top_product->id)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="product-desc-tab bg-white">
                        <div class="tabs tabs--style-2">
                            <ul class="nav nav-tabs justify-content-left sticky-top bg-white">
                                <li class="nav-item">
                                    <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600 active show"><?php echo e(__('Description')); ?></a>
                                </li>
                                <?php if($detailedProduct->video_link != null): ?>
                                    <li class="nav-item">
                                        <a href="#tab_default_2" data-toggle="tab" class="nav-link text-uppercase strong-600"><?php echo e(__('Video')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if($detailedProduct->pdf != null): ?>
                                    <li class="nav-item">
                                        <a href="#tab_default_3" data-toggle="tab" class="nav-link text-uppercase strong-600"><?php echo e(__('Downloads')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600"><?php echo e(__('Reviews')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_default_5" data-toggle="tab" class="nav-link text-uppercase strong-600"><?php echo e(__('Shipping Info')); ?></a>
                                </li>
                            </ul>

                            <div class="tab-content pt-0">
                                <div class="tab-pane active show" id="tab_default_1">
                                    <div class="py-2 px-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mw-100 overflow--hidden">
                                                    <?php echo $detailedProduct->description; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_default_5">
                                    <div class="py-2 px-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mw-100 overflow--hidden">
                                                     <div class="row no-gutters mt-3 ">
                                    <div class="col-1">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="product-description-label">
                                        <?php echo e(__('Call')); ?>:</div>
                                    </div>
                                    <div class="col-7">
                                        <a href="tel:<?php echo e($generalsetting->phone); ?>" target="_blank">
                                            <?php echo e($generalsetting->phone); ?>

                                        </a>
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-plane" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="product-description-label">

                                        <?php echo e(__('Outside Dhaka')); ?>:</div>
                                    </div>
                                    <div class="col-7">
                                            4-5 working days
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-truck" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="product-description-label">

                                        <?php echo e(__('Inside Dhaka')); ?>:</div>
                                    </div>
                                    <div class="col-7">
                                            2-3 working days
                                      
                                    </div>
                        </div>
                        <div class="row no-gutters mt-3">
                                    <div class="col-1">
                                        <i class="fa fa-money" aria-hidden="true" style="font-size: 18px;color: #8a8686;"></i>
                                        <span> </span>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="product-description-label">

                                        <?php echo e(__(' Cash on Delivery :')); ?></div>
                                    </div>
                                    <div class="col-4">
                                        <?php echo e(__(' Available')); ?>

                                    </div>
                                    
                        </div>



                        <?php
                                $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first();
                            ?>
                            <?php if($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable): ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-2">
                                        <div class="product-description-label"><?php echo e(__('Refund')); ?>:</div>
                                    </div>
                                    <div class="col-10">
                                        <a href="<?php echo e(route('returnpolicy')); ?>" target="_blank"> <?php if($refund_sticker != null && $refund_sticker->value != null): ?> <img src="<?php echo e(asset($refund_sticker->value)); ?>" height="36"> <?php else: ?> <img src="<?php echo e(asset('frontend/images/refund-sticker.jpg')); ?>" height="36"> <?php endif; ?></a>
                                        <a href="<?php echo e(route('returnpolicy')); ?>" class="ml-2" target="_blank">View Policy</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($detailedProduct->added_by == 'seller'): ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-4">
                                        <div class="product-description-label"><?php echo e(__('Seller Guarantees')); ?>:</div>
                                    </div>
                                    <div class="col-8">
                                        <?php if($detailedProduct->user->seller->verification_status == 1): ?>
                                            <?php echo e(__('Verified seller')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('Non verified seller')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6"><?php echo e(__('Payment')); ?>:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="inline-links">
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/visa.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/mastercard.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/maestro.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/paypal.png')); ?>" width="30" class="lazyload">
                                        </li>
                                        <li>
                                            <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset('frontend/images/icons/cards/cod.png')); ?>" width="30" class="lazyload">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_default_2">
                                    <div class="fluid-paragraph py-2">
                                        <!-- 16:9 aspect ratio -->
                                        <div class="embed-responsive embed-responsive-16by9 mb-5">
                                            <?php if($detailedProduct->video_provider == 'youtube' && $detailedProduct->video_link != null): ?>
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo e(explode('=', $detailedProduct->video_link)[1]); ?>"></iframe>
                                            <?php elseif($detailedProduct->video_provider == 'dailymotion' && $detailedProduct->video_link != null): ?>
                                                <iframe class="embed-responsive-item" src="https://www.dailymotion.com/embed/video/<?php echo e(explode('video/', $detailedProduct->video_link)[1]); ?>"></iframe>
                                            <?php elseif($detailedProduct->video_provider == 'vimeo' && $detailedProduct->video_link != null): ?>
                                                <iframe src="https://player.vimeo.com/video/<?php echo e(explode('vimeo.com/', $detailedProduct->video_link)[1]); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_default_3">
                                    <div class="py-2 px-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo e(asset($detailedProduct->pdf)); ?>"><?php echo e(__('Download')); ?></a>
                                            </div>
                                        </div>
                                        <span class="space-md-md"></span>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_default_4">
                                    <div class="fluid-paragraph py-4">
                                        <?php $__currentLoopData = $detailedProduct->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="block block-comment">
                                                <div class="block-image">
                                                    <img src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($review->user->avatar_original)); ?>" class="rounded-circle lazyload">
                                                </div>
                                                <div class="block-body">
                                                    <div class="block-body-inner">
                                                        <div class="row no-gutters">
                                                            <div class="col">
                                                                <h3 class="heading heading-6">
                                                                    <a href="javascript:;"><?php echo e($review->user->name); ?></a>
                                                                </h3>
                                                                <span class="comment-date">
                                                                    <?php echo e(date('d-m-Y', strtotime($review->created_at))); ?>

                                                                </span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="rating text-right clearfix d-block">
                                                                    <span class="star-rating star-rating-sm float-right">
                                                                        <?php for($i=0; $i < $review->rating; $i++): ?>
                                                                            <i class="fa fa-star active"></i>
                                                                        <?php endfor; ?>
                                                                        <?php for($i=0; $i < 5-$review->rating; $i++): ?>
                                                                            <i class="fa fa-star"></i>
                                                                        <?php endfor; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="comment-text">
                                                            <?php echo e($review->comment); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(count($detailedProduct->reviews) <= 0): ?>
                                            <div class="text-center">
                                                <?php echo e(__('There have been no reviews for this product yet.')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <?php if(Auth::check()): ?>
                                            <?php
                                                $commentable = false;
                                            ?>
                                            <?php $__currentLoopData = $detailedProduct->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null): ?>
                                                    <?php
                                                        $commentable = true;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($commentable): ?>
                                                <div class="leave-review">
                                                    <div class="section-title section-title--style-1">
                                                        <h3 class="section-title-inner heading-6 strong-600 text-uppercase">
                                                            <?php echo e(__('Write a review')); ?>

                                                        </h3>
                                                    </div>
                                                    <form class="form-default" role="form" action="<?php echo e(route('reviews.store')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($detailedProduct->id); ?>">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light"><?php echo e(__('Your name')); ?></label>
                                                                    <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light"><?php echo e(__('Email')); ?></label>
                                                                    <input type="text" name="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" required disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="c-rating mt-1 mb-1 clearfix d-inline-block">
                                                                    <input type="radio" id="star5" name="rating" value="5" required/>
                                                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" required/>
                                                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" required/>
                                                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" required/>
                                                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" required/>
                                                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" rows="4" name="comment" placeholder="<?php echo e(__('Your review')); ?>" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-styled btn-base-1 btn-circle mt-4">
                                                                <?php echo e(__('Send review')); ?>

                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="my-2 bg-white p-2">
                        <div class="section-title-1">
                            <h3 class="heading-5 strong-700 mb-0">
                                <span class="mr-4"><?php echo e(__('Related products')); ?></span>
                            </h3>
                        </div>
                        <div class="products-box-bar p-1 bg-white rep">
                            <div class="row sm-no-gutters gutters-5 infinite-scroll">
                            	<?php $__currentLoopData = filter_products(\App\Product::where('subcategory_id', $detailedProduct->subcategory_id)->where('id', '!=', $detailedProduct->id))->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-4 p-0">

                                        <div class="product-box-2 bg-white alt-box my-md-2 product-hover mr-lg-1 ml-lg-1 ml-0 mr-0" style="">
                                            <div class="position-relative overflow-hidden">
                                                <a href="<?php echo e(route('product', $related_product->slug)); ?>" class="d-block product-image h-100 text-center" tabindex="0">
                                                    <img class="img-fit lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($related_product->featured_img ?? $related_product->featured_img)); ?>" alt="<?php echo e(__($related_product->name)); ?>">
                                                </a>
                                                <div class="product-btns clearfix">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($related_product->id); ?>)" type="button">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($related_product->id); ?>)" type="button">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($related_product->id); ?>)" type="button">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="p-md-2 p-2">
                                                <div class="price-box">
                                                    <?php if(home_base_price($related_product->id) != home_discounted_base_price($related_product->id)): ?>
                                                        <del class="old-product-price strong-400"><?php echo e(home_base_price($related_product->id)); ?></del>
                                                    <?php endif; ?>
                                                    <span class="product-price strong-600"><?php echo e(home_discounted_base_price($related_product->id)); ?></span>
                                                </div>
                                                <div class="star-rating star-rating-sm mt-1">
                                                    <?php echo e(renderStarRating($related_product->rating)); ?>

                                                </div>
                                                <h2 class="product-title p-0">
                                                    <a href="<?php echo e(route('product', $related_product->slug)); ?>" class=" text-truncate"><?php echo e(__($related_product->name)); ?></a>
                                                </h2>
                                                <?php if(\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated): ?>
                                                    <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                                        <?php echo e(__('Club Point')); ?>:
                                                        <span class="strong-700 float-right"><?php echo e($related_product->earn_point); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                 <div class="padding_0 add-cart-b" style=""><a itemprop="url"  onclick="addToListCart(<?php echo e($related_product->id); ?>)" title="Add to cart" style="" class="add-cart-ab btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now">Add To Cart</a></div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5"><?php echo e(__('Any query about this product')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="<?php echo e(route('conversations.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($detailedProduct->id); ?>">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title" value="<?php echo e($detailedProduct->name); ?>" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required placeholder="Your Question"><?php echo e(route('product', $detailedProduct->slug)); ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" class="btn btn-base-1 btn-styled"><?php echo e(__('Send')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><?php echo e(__('Login')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                    <form class="form-default" role="form" action="<?php echo e(route('cart.login.submit')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>">
                                                <span class="input-group-addon">
                                                    <i class="text-md ion-person"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>">
                                                <span class="input-group-addon">
                                                    <i class="text-md ion-locked"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <a href="#" class="link link-xs link--style-3"><?php echo e(__('Forgot password?')); ?></a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-styled btn-base-1 px-4"><?php echo e(__('Sign in')); ?></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                    <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1): ?>
                                        <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-google"></i> <?php echo e(__('Login with Google')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if(\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1): ?>
                                        <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-facebook"></i> <?php echo e(__('Login with Facebook')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <?php if(\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                                    <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 my-4">
                                        <i class="icon fa fa-twitter"></i> <?php echo e(__('Login with Twitter')); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
    		$('#share').jsSocials({
    			showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
    		});
            getVariantPrice();
    	});

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }

        function show_chat_modal(){
            <?php if(Auth::check()): ?>
                $('#chat_modal').modal('show');
            <?php else: ?>
                $('#login_modal').modal('show');
            <?php endif; ?>
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/product_details.blade.php ENDPATH**/ ?>
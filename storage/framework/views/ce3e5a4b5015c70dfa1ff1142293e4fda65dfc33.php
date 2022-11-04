

<?php if(isset($subsubcategory_id)): ?>
    <?php
        $meta_title = \App\SubSubCategory::find($subsubcategory_id)->meta_title;
        $meta_description = \App\SubSubCategory::find($subsubcategory_id)->meta_description;
    ?>
<?php elseif(isset($subcategory_id)): ?>
    <?php
        $meta_title = \App\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\SubCategory::find($subcategory_id)->meta_description;
    ?>
<?php elseif(isset($category_id)): ?>
    <?php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    ?>
<?php elseif(isset($brand_id)): ?>
    <?php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    ?>
<?php else: ?>
    <?php
        $meta_title = env('APP_NAME');
        $meta_description = \App\SeoSetting::first()->description;
    ?>
<?php endif; ?>

<?php $__env->startSection('meta_title'); ?><?php echo e($meta_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($meta_description); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="<?php echo e($meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($meta_description); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($meta_title); ?>" />
    <meta property="og:description" content="<?php echo e($meta_description); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="breadcrumb-area">
        <div class="container">

            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li><a href="<?php echo e(route('products')); ?>"><?php echo e(__('All Categories')); ?></a></li>
                        <?php if(isset($category_id)): ?>
                            <li class="active"><a href="<?php echo e(route('products.category', \App\Category::find($category_id)->slug)); ?>"><?php echo e(\App\Category::find($category_id)->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($subcategory_id)): ?>
                            <li ><a href="<?php echo e(route('products.category', \App\SubCategory::find($subcategory_id)->category->slug)); ?>"><?php echo e(\App\SubCategory::find($subcategory_id)->category->name); ?></a></li>
                            <li class="active"><a href="<?php echo e(route('products.subcategory', \App\SubCategory::find($subcategory_id)->slug)); ?>"><?php echo e(\App\SubCategory::find($subcategory_id)->name); ?></a></li>
                        <?php endif; ?>
                        <?php if(isset($subsubcategory_id)): ?>
                            <li ><a href="<?php echo e(route('products.category', \App\SubSubCategory::find($subsubcategory_id)->subcategory->category->slug)); ?>"><?php echo e(\App\SubSubCategory::find($subsubcategory_id)->subcategory->category->name); ?></a></li>
                            <li ><a href="<?php echo e(route('products.subcategory', \App\SubsubCategory::find($subsubcategory_id)->subcategory->slug)); ?>"><?php echo e(\App\SubsubCategory::find($subsubcategory_id)->subcategory->name); ?></a></li>
                            <li class="active"><a href="<?php echo e(route('products.subsubcategory', \App\SubSubCategory::find($subsubcategory_id)->slug)); ?>"><?php echo e(\App\SubSubCategory::find($subsubcategory_id)->name); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if(!isset($category_id) || !isset($category_id) || !isset($subcategory_id) || !isset($subsubcategory_id)): ?>
    <section class="mt-2">
        <div class="container">
            <div class="px-2 py-2 p-md-3 bg-white shadow-sm">
            
                <div class="caorusel-box arrow-round gutters-5">
                    <div class="slick-carousel" data-slick-items="8" data-slick-lg-items="2"  data-slick-md-items="8" data-slick-sm-items="6" data-slick-xs-items="6" data-slick-rows="1">
                         <?php if(!isset($category_id) && !isset($category_id) && !isset($subcategory_id) && !isset($subsubcategory_id)): ?>
                        
                                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card cat-bo">
                                <div class="row no-gutters product-box-2 align-items-center" style="border:none">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="d-block h-100">
                                                <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($category->banner ?? '')); ?>" alt="<?php echo e(__($category->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-1">
                                            <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.category', $category->slug)); ?>"><?php echo e(__($category->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(isset($category_id)): ?>
                           <?php $__currentLoopData = \App\Category::find($category_id)->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card my-1">
                                <div class="row no-gutters product-box-2 align-items-center">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>" class="d-block  h-100">
                                                <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($subcategory->icon ?? 'frontend/images/placeholder.jpg')); ?>" alt="<?php echo e(__($subcategory->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12 border-left">
                                        <div class="p-1">
                                            <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.subcategory', $subcategory->slug)); ?>"><?php echo e(__($subcategory->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                         <?php if(isset($subcategory_id)): ?>
                           <?php $__currentLoopData = \App\SubCategory::find($subcategory_id)->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="caorusel-card my-1">
                                <div class="row no-gutters product-box-2 align-items-center">
                                    <div class="col-12">
                                        <div class="position-relative overflow-hidden h-100">
                                            <a href="<?php echo e(route('products.subsubcategory', $subsubcategory->slug)); ?>" class="d-block h-100">
                                                <img class="img-fit lazyload mx-auto" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($subsubcategory->icon ?? 'frontend/images/placeholder.jpg')); ?>" alt="<?php echo e(__($subsubcategory->name)); ?>">
                                            </a>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12 border-left">
                                        <div class="p-1">
                                            <h2 class="product-title mb-0 p-0 text-truncate-2">
                                                <a href="<?php echo e(route('products.subsubcategory', $subsubcategory->slug)); ?>"><?php echo e(__(@\App\SubsubCategory::find($subsubcategory_id)->name)); ?> </a>
                                            </h2>
                                            
                                            
                                            
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
    </section>
      <?php endif; ?>

    <section class="gry-bg py-2">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="<?php echo e(route('search')); ?>" method="GET">
                <input type="hidden" name="ajax" value="1">
                <div class="row">
                <div class="col-xl-3 side-filter d-xl-block">
                    <div class="filter-overlay filter-close"></div>
                    <div class="filter-wrapper c-scrollbar">
                        <div class="filter-title d-flex d-xl-none justify-content-between pb-3 align-items-center">
                            <h3 class="h6">Filters</h3>
                            <button type="button" class="close filter-close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="bg-white sidebar-box mb-3">
                            <div class="box-title text-center">
                                <?php echo e(__('Price range')); ?>

                            </div>
                            <div class="box-content">
                                <div class="range-slider-wrapper mt-3">
                                    <!-- Range slider container -->
                                    <div id="input-slider-range" data-range-value-min="<?php echo e(filter_products(\App\Product::query())->get()->min('unit_price')); ?>" data-range-value-max="<?php echo e(filter_products(\App\Product::query())->get()->max('unit_price')); ?>"></div>

                                    <!-- Range slider values -->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="range-slider-value value-low"
                                                <?php if(isset($min_price)): ?>
                                                    data-range-value-low="<?php echo e($min_price); ?>"
                                                <?php elseif($products->min('unit_price') > 0): ?>
                                                    data-range-value-low="<?php echo e($products->min('unit_price')); ?>"
                                                <?php else: ?>
                                                    data-range-value-low="0"
                                                <?php endif; ?>
                                                id="input-slider-range-value-low">
                                        </div>

                                        <div class="col-6 text-right">
                                            <span class="range-slider-value value-high"
                                                <?php if(isset($max_price)): ?>
                                                    data-range-value-high="<?php echo e($max_price); ?>"
                                                <?php elseif($products->max('unit_price') > 0): ?>
                                                    data-range-value-high="<?php echo e($products->max('unit_price')); ?>"
                                                <?php else: ?>
                                                    data-range-value-high="0"
                                                <?php endif; ?>
                                                id="input-slider-range-value-high">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white sidebar-box mb-3">
                            <div class="box-title text-center">
                                <?php echo e(__('Filter by color')); ?>

                            </div>
                            <div class="box-content">
                                <!-- Filter by color -->
                                <ul class="list-inline checkbox-color checkbox-color-circle mb-0">
                                    <?php $__currentLoopData = $all_colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <input type="radio" id="color-<?php echo e($key); ?>" name="color" value="<?php echo e($color); ?>" <?php if(isset($selected_color) && $selected_color == $color): ?> checked <?php endif; ?> onchange="filter()">
                                            <label style="background: <?php echo e($color); ?>;" for="color-<?php echo e($key); ?>" data-toggle="tooltip" data-original-title="<?php echo e(\App\Color::where('code', $color)->first()->name); ?>"></label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\App\Attribute::find($attribute['id']) != null): ?>
                                <div class="bg-white sidebar-box mb-3">
                                    <div class="box-title text-center">
                                        Filter by <?php echo e(\App\Attribute::find($attribute['id'])->name); ?>

                                    </div>
                                    <div class="box-content">
                                        <!-- Filter by others -->
                                        <div class="filter-checkbox">
                                            <?php if(array_key_exists('values', $attribute)): ?>
                                                <?php $__currentLoopData = $attribute['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $flag = false;
                                                        if(isset($selected_attributes)){
                                                            foreach ($selected_attributes as $key => $selected_attribute) {
                                                                if($selected_attribute['id'] == $attribute['id']){
                                                                    if(in_array($value, $selected_attribute['values'])){
                                                                        $flag = true;
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="attribute_<?php echo e($attribute['id']); ?>_value_<?php echo e($value); ?>" name="attribute_<?php echo e($attribute['id']); ?>[]" value="<?php echo e($value); ?>" <?php if($flag): ?> checked <?php endif; ?> onchange="filter()">
                                                        <label for="attribute_<?php echo e($attribute['id']); ?>_value_<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="col-12">
                        <div class="d-lg-none d-block sort-by-box flex-grow-1">
                                    <div class="form-group" style="margin-bottom: 10px">
                                        
                                        <div class="search-widget">
                                            <input class="form-control input-lg" type="text" name="q" placeholder="<?php echo e(__('Search products')); ?>" <?php if(isset($query)): ?> value="<?php echo e($query); ?>" <?php endif; ?>>
                                            <button onclick="filter(); return false;" type="submit" class="btn-inner">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    
                  
                    <!-- <div class="bg-white"> -->
                        <?php if(isset($category_id)): ?>
                            <input type="hidden" name="category" value="<?php echo e(\App\Category::find($category_id)->slug); ?>">
                        <?php endif; ?>
                        <?php if(isset($subcategory_id)): ?>
                            <input type="hidden" name="subcategory" value="<?php echo e(\App\SubCategory::find($subcategory_id)->slug); ?>">
                        <?php endif; ?>
                        <?php if(isset($subsubcategory_id)): ?>
                            <input type="hidden" name="subsubcategory" value="<?php echo e(\App\SubSubCategory::find($subsubcategory_id)->slug); ?>">
                        <?php endif; ?>

                        <div class="sort-by-bar row no-gutters bg-white mb-1 px-3 pt-2">
                            <div class="col-xl-4 d-flex d-xl-block justify-content-between align-items-end ">
                                <div class="d-none d-lg-block sort-by-box flex-grow-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Search')); ?></label>
                                        <div class="search-widget">
                                            <input class="form-control input-lg" type="text" name="q" placeholder="<?php echo e(__('Search products')); ?>" <?php if(isset($query)): ?> value="<?php echo e($query); ?>" <?php endif; ?>>
                                            <button onclick="filter(); return false;" type="submit" class="btn-inner">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none ml-3">
                                    <div class="form-group">
                                        <label>
                                    Found  <?php echo e(count($products)); ?> Items
                                </label></div>
                                </div>
                                <div class="d-block d-lg-none sort-by-box px-1">
                                    <span class="d-xl-none ml-3 form-group"><i style="margin-top: 10px" class="fa fa-sort-alpha-desc" aria-hidden="true"></i></span>
                                            <div style="float: right;" class="form-group">
                                          
                                                

                                            
                                                <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                                    <option selected> Sort By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp; </option>
                                                    <option value="1" <?php if(isset($sort_by)): ?> <?php if($sort_by == '1'): ?> selected <?php endif; ?> <?php endif; ?>><i></i><?php echo e(__('Newest')); ?></option>
                                                    <option value="2" <?php if(isset($sort_by)): ?> <?php if($sort_by == '2'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
                                                    <option value="3" <?php if(isset($sort_by)): ?> <?php if($sort_by == '3'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price low to high')); ?></option>
                                                    <option value="4" <?php if(isset($sort_by)): ?> <?php if($sort_by == '4'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price high to low')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                <div class="d-xl-none ml-3 form-group">
                                    <button type="button" class="btn p-1 btn-sm" id="side-filter">
                                        <i class="la la-filter la-2x"></i>
                                    </button> <span>Filter</span>
                                </div>
                            </div>
                            <div class="d-none d-lg-block col-xl-7 offset-xl-1">
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label><?php echo e(__('Sort by')); ?></label>
                                                <select class="form-control sortSelect" data-minimum-results-for-search="Infinity" name="sort_by" onchange="filter()">
                                                    <option value="1" <?php if(isset($sort_by)): ?> <?php if($sort_by == '1'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Newest')); ?></option>
                                                    <option value="2" <?php if(isset($sort_by)): ?> <?php if($sort_by == '2'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
                                                    <option value="3" <?php if(isset($sort_by)): ?> <?php if($sort_by == '3'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price low to high')); ?></option>
                                                    <option value="4" <?php if(isset($sort_by)): ?> <?php if($sort_by == '4'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Price high to low')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 d-none d-lg-block">
                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label><?php echo e(__('Brands')); ?></label>
                                                <select class="form-control sortSelect" data-placeholder="<?php echo e(__('All Brands')); ?>" name="brand" onchange="filter()">
                                                    <option value=""><?php echo e(__('All Brands')); ?></option>
                                                    <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($brand->slug); ?>" <?php if(isset($brand_id)): ?> <?php if($brand_id == $brand->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($brand->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 d-none d-lg-block">

                                        <div class="sort-by-box px-1">
                                            <div class="form-group">
                                                <label><?php echo e(__('Select')); ?></label>
                                                <select class="form-control sortSelect" data-placeholder="<?php echo e(__('Offer Zone')); ?>" name="offer_id" onchange="filter()">
                                                    <option value="0" ><?php echo e(__('Select One')); ?></option>
                                                     <option value="1" ><?php echo e(__('Offer Zone')); ?></option>
                                                      <option value="2" ><?php echo e(__('Best Sell')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <!-- <hr class=""> -->
                        <div class="products-box-bar p-1 bg-white rep">
                            <div class="row gutters-5 infinite-scroll">
                                <?php if(count($products)>0): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    

                                        <div class="product-box-2 bg-white alt-box my-md-2 product-hover ml-lg-1 mr-lg-1 p-list-sc" style="width: 24%;float: left;">
                                            <div class="position-relative overflow-hidden">
                                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="d-block product-image h-100 text-center" tabindex="0">
                                                    <img class="img-fit lazyload" src="<?php echo e(asset('frontend/images/placeholder.jpg')); ?>" data-src="<?php echo e(asset($product->featured_img)); ?>" alt="<?php echo e(__($product->name)); ?>">
                                                </a>
                                                <div class="product-btns clearfix">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(<?php echo e($product->id); ?>)" type="button">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(<?php echo e($product->id); ?>)" type="button">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(<?php echo e($product->id); ?>)" type="button">
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
                                                 <div class="padding_0 get_quote_link addclist" style=""><a itemprop="url"  onclick="addToListCart(<?php echo e($product->id); ?>)" title="Add to cart" style="font-size: 12px;padding: 3px;color: #fff" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now">Add to cart</a></div>
                                            </div>
                                           
                                        </div>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($products->links()); ?>

                                <?php else: ?>
                                <div class="col-12" style="text-align: center;padding: 50px">
                                    No products found
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                    <!-- </div> -->
                </div>
            </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('frontend/js/jquery.jscroll.min.js')); ?>"></script>
  <script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img style="width:200px" class="center-block" src="<?php echo e(asset('img/load.gif')); ?>" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>

    <script type="text/javascript">


        function filter(){

           var a=$('#search-form').serialize();
    // console.log(a);
    // var a=$('#yourform').serialize();
$.ajax({
    type:'get',
    url:'<?php echo e(route('search')); ?>?'+a,
    // data:a,
    beforeSend:function(){
        // launchpreloader();
    },
    complete:function(){
        // console.log()
        // stopPreloader();
    },
    success:function(data){
         // console.log(data);
         $( ".rep" ).replaceWith( data );
         if ($(".side-filter").hasClass("open")) {
            $(".side-filter").removeClass("open");
        } else {
            $(".side-filter").addClass("open");
        }
    }
});
//            $('form#search-form').submit(function() {
//     // $(this).ajaxSubmit();
//     // var a=$('#search-form').serialize();
//     alert(424);
//             //validation and other stuff
//         // return false; 
// });
            // return false; 
            // $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/product_listing.blade.php ENDPATH**/ ?>
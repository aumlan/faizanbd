<div class="container">
    <div class="row cols-xs-space cols-sm-space cols-md-space">
        <div class="col-xl-8">
            <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
            <div class="form-default bg-white p-4">
                <div class="">
                    <div class="">
                        <table class="table-cart border-bottom">
                            <thead>
                                <tr>
                                    <th class="product-image  d-lg-block"></th>
                                    <th class="product-name"><?php echo e(__('Product')); ?></th>
                                    <th class="product-price d-none d-lg-table-cell"><?php echo e(__('Price')); ?></th>
                                    <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->user_type=='seller'): ?>
                                    <th class="product-price d-lg-table-cell"><?php echo e(__('Sale Price')); ?></th>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <th class="product-quanity d-md-table-cell"><?php echo e(__('Quantity')); ?></th>
                                    <th class="product-total"><?php echo e(__('Total')); ?></th>
                                    <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->user_type=='seller'): ?>
                                    <th style="    padding-left: 15px;" class="product-price  d-lg-table-cell"><?php echo e(__('Profit')); ?></th>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                <?php $__currentLoopData = Session::get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $product = \App\Product::find($cartItem['id']);
                                    $total = $total + $cartItem['price']*$cartItem['quantity'];
                                    $product_name_with_choice = $product->name;
                                    if ($cartItem['variant'] != null) {
                                        $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                                    }
                                    ?>
                                    <tr class="cart-item">
                                        <td class="product-image  d-lg-block">
                                            <a href="#" class="mr-3">
                                                <img style="width: 45px" loading="lazy"  src="<?php echo e(asset($product->featured_img)); ?>">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <span class="pr-4 d-block"><?php echo e($product_name_with_choice); ?></span>
                                        </td>
                                        

                                        <td class="product-price d-none d-lg-table-cell">
                                            <span class="pr-3 d-block">
                                            <?php if(auth()->guard()->check()): ?>
                                            <?php if(auth()->user()->user_type=='seller'): ?>
                                            <?php echo e(single_price($cartItem['wp'])); ?>

                                            <?php else: ?>
                                            <?php echo e(single_price($cartItem['price'])); ?>

                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(auth()->guard()->guest()): ?>
                                            <?php echo e(single_price($cartItem['price'])); ?>

                                            <?php endif; ?>
                                        </span>
                                        </td>
                                        <?php if(auth()->guard()->check()): ?>
                                        <?php if(auth()->user()->user_type=='seller'): ?>

                                                <td class="product-price  d-lg-table-cell">
                                                    <span class="pr-3 d-block">
                                                        <input style="padding: 5px;width: 100px" type="text" name="price[<?php echo e($key); ?>]" class="form-control input-number" placeholder="1" value="<?php echo e($cartItem['price']); ?>" min="1" max="10000" onchange="updatePrice(<?php echo e($key); ?>, this)">
                                                    </span>
                                                </td>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                        <td class="product-quantity  d-md-table-cell">
                                            <div class="input-group input-group--style-2 pr-4" style="width: 130px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity[<?php echo e($key); ?>]">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity[<?php echo e($key); ?>]" class="form-control input-number" placeholder="1" value="<?php echo e($cartItem['quantity']); ?>" min="1" max="10" onchange="updateQuantity(<?php echo e($key); ?>, this)">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[<?php echo e($key); ?>]">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-total">
                                            <span><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                        </td>
                                        <?php if(auth()->guard()->check()): ?>
                                        <?php if(auth()->user()->user_type=='seller'): ?>

                                              <td  class="product-quantity">
                                            <span style="    padding-left: 15px;"><?php echo e(single_price(($cartItem['price']*$cartItem['quantity'])-($cartItem['wp']*$cartItem['quantity']))); ?></span>
                                        </td>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                        <td class="product-remove">
                                            <a href="#" onclick="removeFromCartView(event, <?php echo e($key); ?>)" class="text-right pl-4">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row align-items-center pt-4">
                    <div class="col-6">
                        <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                            <i class="ion-android-arrow-back"></i>
                            <?php echo e(__('Return to shop')); ?>

                        </a>
                    </div>
                    <div class="col-6 text-right">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Shipping')); ?></a>
                        <?php else: ?>
                            <a href="<?php echo e(url('checkout')); ?>"><button class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Shipping')); ?></button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>

        <div class="col-xl-4 ml-lg-auto">
            <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
</script>
<?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/partials/cart_details.blade.php ENDPATH**/ ?>
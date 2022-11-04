<div class="modal-body p-3 added-to-cart">
    <div class="text-center text-success">
        <i class="fa fa-check"></i>
        <h3><?php echo e(__('Item added to your cart!')); ?></h3>
    </div>
    <div class="product-box">
        <ul class="added-toop dropdown-menu dropdown-menu-right px-0 ml-10 mr-10 mb-4" style="visibility: visible;
     position: relative;
    min-width: 100%;display: block;
    opacity: 8;">
    <li>
        <div class="added-to dropdown-cart px-0" id="cart-added">
            <?php if(Session::has('cart')): ?>
                <?php if(count($cart = Session::get('cart')) > 0): ?>
                    <div class="dc-header">
                        <h3 class="heading heading-6 strong-700"><?php echo e(__('Cart Items')); ?></h3>
                    </div>
                    <div class="added-tov dropdown-cart-items c-scrollbar " id="cart_items">
                        <?php
                            $total = 0;
                        ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = \App\Product::find($cartItem['id']);
                                $total = $total + $cartItem['price']*$cartItem['quantity'];
                            ?>
                            <div class="dc-item" id="rmpro">
                                <div class="d-flex align-items-center">
                                    <div class="dc-image">
                                        <a href="<?php echo e(route('product', $product->slug)); ?>">
                                            <img loading="lazy"  src="<?php echo e(asset($product->featured_img)); ?>" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="dc-content">
                                        <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                            <a href="<?php echo e(route('product', $product->slug)); ?>">
                                                <?php echo e(__($product->name)); ?>

                                            </a>
                                        </span>

                                        <span class="dc-quantity">x<?php echo e($cartItem['quantity']); ?></span>
                                        <span class="dc-price"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                                    </div>
                                    <div class="dc-actions">
                                        <button onclick="removeFromCart(<?php echo e($key); ?>)">
                                            <i class="la la-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="dc-item py-3">
                        <span class="subtotal-text"><?php echo e(__('Subtotal')); ?></span>
                        <span class="subtotal-amount"><?php echo e(single_price($total)); ?></span>
                    </div>
                   
                <?php else: ?>
                    <div class="dc-header">
                        <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="dc-header">
                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </li>
</ul>
    </div>
    <div class="text-center addcartm">
        <button class="btn btn-styled btn-base-1 btn-outline mb-3 mb-sm-0" data-dismiss="modal"><?php echo e(__('Continue shopping')); ?></button>
        <a href="<?php echo e(route('cart')); ?>" class="btn btn-styled btn-base-1 mb-3 mb-sm-0"><?php echo e(__('Proceed to Checkout')); ?></a>
    </div>
</div>
<script>
    function updateNavCart(){
        $.post('<?php echo e(route('cart.nav_cart')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
            $('#cart_items').html(data);
        });
    }
     function updateAddedCart(){
        $.post('<?php echo e(route('cart.added_cart')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
            // alert(data);
            $('#cart-added').html(data);
        });
    }
    function removeFromCart(key){
        $.post('<?php echo e(route('cart.removeFromCart')); ?>', {_token:'<?php echo e(csrf_token()); ?>', key:key}, function(data){
            updateNavCart();
            updateAddedCart();
            $('#cart-summary').html(data);
            // $('#cart_items').html(data);
            showFrontendAlert('success', 'Item has been removed from cart');
            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
            $('#rmpro').html(parseInt($('#rmpro').html())-1);
        });
    }
</script><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/partials/addedToCart.blade.php ENDPATH**/ ?>
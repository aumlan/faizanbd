

<?php $__env->startSection('content'); ?>

    <section class="slice-xs sct-color-2 border-bottom">
        <div class="container container-sm">
            <div class="row cols-delimited justify-content-center">
                <div class="col">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon mb-0">
                            <i class="la la-shopping-cart"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(__('My Cart')); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-map-o"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(__('Shipping info')); ?></h3>
                        </div>
                    </div>
                </div>

               

                <div class="col">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-credit-card"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. <?php echo e(__('Payment')); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="la la-check-circle"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">5. <?php echo e(__('Confirmation')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-4 gry-bg" id="cart-summary">
        <div class="container">
            <?php if(Session::has('cart')): ?>
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xl-8">
                    <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
                    <div class="form-default bg-white p-4">
                        <div class="">
                            <div class="">
                                <table class="table-cart border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="product-image d-lg-block"></th>
                                            <th class="product-name"><?php echo e(__('Product')); ?></th>

                                            <th class="product-price d-none d-lg-table-cell"><?php echo e(__('Price')); ?></th>
                                            <?php if(auth()->guard()->check()): ?>
                                            <?php if(auth()->user()->user_type=='seller'): ?>
                                            <th class="product-price  d-lg-table-cell"><?php echo e(__('Sale Price')); ?></th>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <th class="product-quanity  d-md-table-cell"><?php echo e(__('Quantity')); ?></th>
                                            <th class="product-total"><?php echo e(__('Total')); ?></th>
                                           
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
                                            // if(isset($cartItem['color'])){
                                            //     $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                                            // }
                                            // foreach (json_decode($product->choice_options) as $choice){
                                            //     $str = $choice->name; // example $str =  choice_0
                                            //     $product_name_with_choice .= ' - '.$cartItem[$str];
                                            // }
                                            ?>
                                            <tr class="cart-item">
                                                <td class="product-image d-lg-block">
                                                    <a href="#" class="mr-3">
                                                        <img style="width: 50px" loading="lazy"  src="<?php echo e(asset($product->featured_img)); ?>">
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <span class="pr-4 d-block"><?php echo e($product_name_with_choice); ?></span>
                                                </td>

                                                <td class="product-price d-none d-lg-table-cell">
                                                    <span class="pr-3 d-block"><?php echo e(single_price($cartItem['wp'])); ?></span>
                                                </td>

                                                <?php if(auth()->guard()->check()): ?>
                                            <?php if(auth()->user()->user_type=='seller'): ?>

                                                <td class="product-price d-lg-table-cell">
                                                    <span class="pr-3 d-block">
                                                        <input style="padding: 5px;width: 100px" type="text" name="price[<?php echo e($key); ?>]" class="form-control input-number" placeholder="1" value="<?php echo e($cartItem['price']); ?>" min="1" max="10000" onchange="updatePrice(<?php echo e($key); ?>, this)">
                                                    </span>
                                                </td>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                                <td class="product-quantity  d-md-table-cell">
                                                    <?php if($cartItem['digital'] != 1): ?>
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
                                                    <?php endif; ?>
                                                </td>
                                                <td class="product-total">
                                                    <span><?php echo e(single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity'])); ?></span>
                                                </td>
                                               
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
                            <div class="col-6 col-md-6 col-sm-6">
                                <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                    <i class="la la-mail-reply"></i>
                                    <?php echo e(__('Return to shop')); ?>

                                </a>
                            </div>
                            <div class=" col-6 col-md-6 col-sm-6 text-right">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(route('checkout.shipping_info', 'inside_dhaka')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Shipping')); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('checkout.shipping_info', 'inside_dhaka')); ?>"><button class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Shipping')); ?></button></a>
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
            <?php else: ?>
                <div class="dc-header">
                    <h3 class="heading heading-6 strong-700"><?php echo e(__('Your Cart is empty')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="GuestCheckout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><?php echo e(__('Login')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">c
                        <form class="form-default" role="form" action="<?php echo e(route('cart.login.submit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                             <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated): ?>
                                            <div class="form-group phone-form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input style="    padding: 13px;" type="tel" id="phone-code" class="border-right-0 h-100 form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('e.g. 8801799388112
')); ?>" name="phone">
                                                    <span class="input-group-addon">
                                                        <i class="text-md la la-phone"></i>
                                                    </span>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group email-form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email">
                                                    <span class="input-group-addon">
                                                        <i class="text-md la la-envelope"></i>
                                                    </span>
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                 <div style="margin-top: 10px" class="input-group input-group--style-1">
                                                <input type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password" id="password">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-lock"></i>
                                                </span>
                                            </div>
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-link p-0" type="button" onclick="toggleEmailPhone(this)">Use Email Instead</button>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email">
                                                    <span class="input-group-addon">
                                                        <i class="text-md la la-envelope"></i>
                                                    </span>
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('password.request')); ?>" class="link link-xs link--style-3"><?php echo e(__('Forgot password?')); ?></a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1 px-4"><?php echo e(__('Sign in')); ?></button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="text-center pt-3">
                        <p class="text-md">
                            <?php echo e(__('Need an account?')); ?> <a href="<?php echo e(route('user.registration')); ?>" class="strong-600"><?php echo e(__('Register Now')); ?></a>
                        </p>
                    </div>
                    <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                        <div class="or or--1 my-3 text-center">
                            <span>or</span>
                        </div>
                        <div class="p-3 pb-0">
                            <?php if(\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1): ?>
                                <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                    <i class="icon fa fa-facebook"></i> <?php echo e(__('Login with Facebook')); ?>

                                </a>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1): ?>
                                <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                    <i class="icon fa fa-google"></i> <?php echo e(__('Login with Google')); ?>

                                </a>
                            <?php endif; ?>
                            <?php if(\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1): ?>
                            <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 mb-3">
                                <i class="icon fa fa-twitter"></i> <?php echo e(__('Login with Twitter')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(\App\BusinessSetting::where('type', 'guest_checkout_active')->first()->value == 1): ?>
                        <div class="or or--1 mt-0 text-center">
                            <span>or</span>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Guest Checkout')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
    function removeFromCartView(e, key){
        e.preventDefault();
        removeFromCart(key);
    }

    function updatePrice(key, element){
        $.post('<?php echo e(route('cart.updatePrice')); ?>', { _token:'<?php echo e(csrf_token()); ?>', key:key, price: element.value}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }

    function updateQuantity(key, element){
        $.post('<?php echo e(route('cart.updateQuantity')); ?>', { _token:'<?php echo e(csrf_token()); ?>', key:key, quantity: element.value}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }

    function showCheckoutModal(){
        $('#GuestCheckout').modal();
    }
    </script>

     <script type="text/javascript">

        var isPhoneShown = true;

       

        $(document).ready(function(){
            $('.email-form-group').hide();
        });

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').hide();
                $('.email-form-group').show();
                $("#usephone").attr("action", "<?php echo e(route('login')); ?>");
                isPhoneShown = false;
                $(el).html('Use Phone Instead');
            }
            else{
                $('.phone-form-group').show();
                $('.email-form-group').hide();
                $("#usephone").attr("action", "<?php echo e(route('user.login')); ?>");
                isPhoneShown = true;
                $(el).html('Use Email Instead');
            }
        }
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/view_cart.blade.php ENDPATH**/ ?>
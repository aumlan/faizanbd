

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    <?php echo e(__('Dashboard')); ?>

                                </h2>
                            </div>
                            <div class="col-md-6">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                        <li class="active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dashboard content -->
                    <div class="">
                        <?php if(Auth::user()->role==3 || Auth::user()->role==1): ?>
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-upload"></i>
                                        <span class="d-block title heading-3 strong-400"><?php echo e(count(\App\Product::where('user_id', Auth::user()->id)->get())); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('Products')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-cart-plus"></i>
                                        <span class="d-block title heading-3 strong-400"><?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get())); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('Total sale')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center blue-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-dollar"></i>
                                        <?php
                                            $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orderDetails as $key => $orderDetail) {
                                                if($orderDetail->order->payment_status == 'paid'){
                                                    $total += $orderDetail->price;
                                                }
                                            }
                                        ?>
                                        <span class="d-block title heading-3 strong-400"><?php echo e(single_price($total)); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('Total earnings')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-check-square-o"></i>
                                        <span class="d-block title heading-3 strong-400"><?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get())); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('Successful orders')); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php elseif(Auth::user()->role==2 || Auth::user()->role==1): ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php if(Session::has('cart')): ?>
                                            <span class="d-block title"><?php echo e(count(Session::get('cart'))); ?> <?php echo e(__('Product(s)')); ?></span>
                                        <?php else: ?>
                                            <span class="d-block title">0 <?php echo e(__('Product')); ?></span>
                                        <?php endif; ?>
                                        <span class="d-block sub-title"><?php echo e(__('in your cart')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title"><?php echo e(count(Auth::user()->wishlists)); ?> <?php echo e(__('Product(s)')); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('in your wishlist')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-building"></i>
                                        <?php
                                            $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orders as $key => $order) {
                                                $total += count($order->orderDetails);
                                            }
                                        ?>
                                        <span class="d-block title"><?php echo e($total); ?> <?php echo e(__('Product(s)')); ?></span>
                                        <span class="d-block sub-title"><?php echo e(__('you ordered')); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-7">
                                <?php if(Auth::user()->role==3 || Auth::user()->role==1): ?>
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 text-center">
                                        <?php echo e(__('Seller Orders')); ?>

                                    </div>
                                    <div class="form-box-content p-3">
                                        <table class="table mb-0 table-bordered" style="font-size:14px;">
                                            <tr>
                                                <td><?php echo e(__('Total orders')); ?>:</td>
                                                <td><strong class="heading-6">
                                                    <?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Pending orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'pending')->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Cancelled orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'cancelled')->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Successful orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\OrderDetail::where('seller_id', Auth::user()->id)->where('delivery_status', 'delivered')->get())); ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php elseif(Auth::user()->role==2 || Auth::user()->role==1): ?>
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 text-center">
                                        <?php echo e(__('Reseller Orders')); ?>

                                    </div>
                                    <div class="form-box-content p-3">
                                        <table class="table mb-0 table-bordered" style="font-size:14px;">
                                            <tr>
                                                <td><?php echo e(__('Total orders')); ?>:</td>
                                                <td><strong class="heading-6">
                                                    <?php echo e(count(\App\Order::where('user_id', Auth::user()->id)->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Pending orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\Order::where('user_id', Auth::user()->id)->where('status', '1')->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Cancelled orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\Order::where('user_id', Auth::user()->id)->where('delivery_status', 'cancelled')->get())); ?></strong></td>
                                            </tr>
                                            <tr >
                                                <td><?php echo e(__('Successful orders')); ?>:</td>
                                                <td><strong class="heading-6"><?php echo e(count(\App\Order::where('user_id', Auth::user()->id)->where('delivery_status', 'delivered')->get())); ?></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-5">
                                <div class="bg-white mt-4 p-5 text-center">
                                    <div class="mb-3">
                                        <?php if(Auth::user()->seller->verification_status == 0): ?>
                                            <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/non_verified.png')); ?>" alt="" width="130">
                                        <?php else: ?>
                                            <img loading="lazy"  src="<?php echo e(asset('frontend/images/icons/verified.png')); ?>" alt="" width="130">
                                        <?php endif; ?>
                                    </div>
                                    <?php if(Auth::user()->seller->verification_status == 0): ?>
                                        <a href="<?php echo e(route('shop.verify')); ?>" class="btn btn-styled btn-base-1"><?php echo e(__('Verify Now')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(Auth::user()->role==3 || Auth::user()->role==1): ?>
                            <div class="col-md-8">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 text-center">
                                        <?php echo e(__('Products')); ?>

                                    </div>
                                    <div class="form-box-content p-3 category-widget">
                                        <ul class="clearfix">
                                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(count($category->products->where('user_id', Auth::user()->id))>0): ?>
                                                    <li><a><?php echo e(__($category->name)); ?><span>(<?php echo e(count($category->products->where('user_id', Auth::user()->id))); ?>)</span></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <div class="text-center">
                                            <a href="<?php echo e(route('seller.products.upload')); ?>" class="btn pt-3 pb-1"><?php echo e(__('Add New Product')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-md-4">
                                <?php if(\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated): ?>
                                    <div class="form-box bg-white mt-4">
                                        <div class="form-box-title px-3 py-2 clearfix ">
                                            <?php echo e(__('Purchased Package')); ?>

                                        </div>
                                        <?php
                                            $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                                        ?>
                                        <div class="form-box-content p-3">
                                            <?php if($seller_package != null): ?>
                                                <div class="form-box-content p-2 category-widget text-center">
                                                    <center><img alt="Package Logo" src="<?php echo e(asset($seller_package->logo)); ?>" style="height:100px; width:90px;"></center>
                                                    <br>
                                                    <strong><p><?php echo e(__('Product Upload Remaining')); ?>: <?php echo e(Auth::user()->seller->remaining_uploads); ?> <?php echo e(__('Times')); ?></p></strong>
                                                    <strong><p><?php echo e(__('Digital Product Upload Remaining')); ?>: <?php echo e(Auth::user()->seller->remaining_digital_uploads); ?> <?php echo e(__('Times')); ?></p></strong>
                                                    <strong><p><?php echo e(__('Package Expires at')); ?>: <?php echo e(Auth::user()->seller->invalid_at); ?></p></strong>
                                                    <strong><p><div class="name mb-0"><?php echo e(__('Current Package')); ?>: <?php echo e($seller_package->name); ?> <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div></p></strong>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-box-content p-2 category-widget text-center">
                                                    <center><strong><p><?php echo e(__('Package Not Found')); ?></p></strong></center>
                                                </div>
                                            <?php endif; ?>
                                            <div class="text-center">
                                                <a href="<?php echo e(route('seller_packages_list')); ?>" class="btn btn-styled btn-base-1 btn-outline btn-sm"><?php echo e(__('Upgrade Package')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(Auth::user()->role==3 || Auth::user()->role==1): ?>
                                <div class="bg-white mt-4 p-4 text-center">
                                    <div class="heading-4 strong-700"><?php echo e(__('Shop')); ?></div>
                                    <p><?php echo e(__('Manage & organize your shop')); ?></p>
                                    <a href="<?php echo e(route('shops.index')); ?>" class="btn btn-styled btn-base-1 btn-outline btn-sm"><?php echo e(__('Go to setting')); ?></a>
                                </div>
                                <?php endif; ?>
                                <div class="bg-white mt-4 p-4 text-center">
                                    <div class="heading-4 strong-700"><?php echo e(__('Payment')); ?></div>
                                    <p><?php echo e(__('Configure your payment method')); ?></p>
                                    <a href="<?php echo e(route('profile')); ?>" class="btn btn-styled btn-base-1 btn-outline btn-sm"><?php echo e(__('Configure Now')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/seller/dashboard.blade.php ENDPATH**/ ?>
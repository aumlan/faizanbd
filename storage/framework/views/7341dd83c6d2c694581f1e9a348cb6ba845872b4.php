

<?php $__env->startSection('content'); ?>
    <?php
        $status = $order->orderDetails->first()->delivery_status;
    ?>
    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited justify-content-center">
                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="la la-shopping-cart"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. <?php echo e(__('My Cart')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-map-o"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. <?php echo e(__('Shipping info')); ?></h3>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center ">
                            <div class="block-icon mb-0 c-gray-light">
                                <i class="la la-credit-card"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. <?php echo e(__('Payment')); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
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
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center py-4 border-bottom mb-4">
                                    <i class="la la-check-circle la-3x text-success mb-3"></i>
                                    <h1 class="h3 mb-3"><?php echo e(__('Thank You for Your Order!')); ?></h1>
                                    <h2 class="h5 strong-700"><?php echo e(__('Order Code:')); ?> <?php echo e($order->code); ?></h2>
                                    <p class="text-muted text-italic"><?php echo e(__('A copy or your order summary has been sent to')); ?> <?php echo e(@json_decode(@$order->shipping_address)->email); ?></p>
                                </div>
                                <div class="mb-4">
                                    <h5 class="strong-600 mb-3 border-bottom pb-2"><?php echo e(__('Order Summary')); ?></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="details-table table">
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Order Code')); ?>:</td>
                                                    <td><?php echo e($order->code); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Name')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Phone')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->phone); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Shipping Area')); ?>:</td>
                                                    <td><?php echo e($order->shipping_area); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Shipping address')); ?>:</td>
                                                    <td><?php echo e(json_decode($order->shipping_address)->address); ?> <?php echo e(json_decode($order->shipping_address)->city); ?> <?php echo e(json_decode($order->shipping_address)->region ?? ''); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="details-table table">
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Order date')); ?>:</td>
                                                    <td><?php echo e(date('d-m-Y H:m A', $order->date)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Order status')); ?>:</td>
                                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Total order amount')); ?>:</td>
                                                    <td><?php echo e(single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax'))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Shipping')); ?>:</td>
                                                    <td><?php echo e(__('Flat shipping rate')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 strong-600"><?php echo e(__('Payment method')); ?>:</td>
                                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="strong-600 mb-3 border-bottom pb-2"><?php echo e(__('Order Details')); ?></h5>
                                    <div>
                                        <table class="details-table table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%"><?php echo e(__('Product')); ?></th>
                                                    <th><?php echo e(__('Variation')); ?></th>
                                                    <th><?php echo e(__('Quantity')); ?></th>
                                                    <th><?php echo e(__('Delivery Type')); ?></th>
                                                    <th class="text-right"><?php echo e(__('Price')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td>
                                                            <?php if($orderDetail->product != null): ?>
                                                                <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank">
                                                                    <?php echo e($orderDetail->product->name); ?>

                                                                </a>
                                                            <?php else: ?>
                                                                <strong><?php echo e(__('Product Unavailable')); ?></strong>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->variation); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->quantity); ?>

                                                        </td>
                                                        <td>
                                                            <?php if($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery'): ?>
                                                                <?php echo e(__('Home Delivery')); ?>

                                                            <?php elseif($orderDetail->shipping_type == 'pickup_point'): ?>
                                                                <?php if($orderDetail->pickup_point != null): ?>
                                                                    <?php echo e($orderDetail->pickup_point->name); ?> (<?php echo e(__('Pickip Point')); ?>)
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-right"><?php echo e(single_price($orderDetail->price)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 ml-auto">
                                            <table class="table details-table">
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo e(__('Subtotal')); ?></th>
                                                        <td class="text-right">
                                                            <span class="strong-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(__('Shipping')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(__('Advance')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->reseller_adv)); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(__('Coupon Discount')); ?></th>
                                                        <td class="text-right">
                                                            <span class="text-italic"><?php echo e(single_price($order->coupon_discount)); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="strong-600"><?php echo e(__('Total')); ?></span></th>
                                                        <td class="text-right">
                                                            <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/order_confirmed.blade.php ENDPATH**/ ?>
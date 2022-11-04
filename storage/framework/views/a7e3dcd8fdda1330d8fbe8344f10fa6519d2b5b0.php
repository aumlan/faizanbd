

<?php $__env->startSection('content'); ?>
<?php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
?>
<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no"><?php echo e(__('Orders')); ?></h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_orders" action="" method="GET">
                <div class="box-inline pad-rgt pull-left  col-md-3">

                    <div class="input-group input-daterange">
    <input autocomplete="of" name="start" type="text" class="form-control" value="2020-10-17">
    <div class="input-group-addon">to</div>
    <input name="end" type="text" class="form-control" on="date_orders()"  value="2020-10-18">
</div>
</div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="payment_type" id="payment_type" onchange="sort_orders()">
                            <option value=""><?php echo e(__('Filter by Payment Status')); ?></option>
                            <option value="paid"  <?php if(isset($payment_status)): ?> <?php if($payment_status == 'paid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Paid')); ?></option>
                            <option value="unpaid"  <?php if(isset($payment_status)): ?> <?php if($payment_status == 'unpaid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Un-Paid')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="delivery_status" id="delivery_status" onchange="sort_orders()">
                            <option value=""><?php echo e(__('Filter by Deliver Status')); ?></option>
                            <option value="pending"   <?php if(isset($delivery_status)): ?> <?php if($delivery_status == 'pending'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Pending')); ?></option>
                            <option value="on_review"   <?php if(isset($delivery_status)): ?> <?php if($delivery_status == 'on_review'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('On review')); ?></option>
                            <option value="on_delivery"   <?php if(isset($delivery_status)): ?> <?php if($delivery_status == 'on_delivery'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('On delivery')); ?></option>
                            <option value="delivered"   <?php if(isset($delivery_status)): ?> <?php if($delivery_status == 'delivered'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Delivered')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="Type Order code & hit Enter">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped demo-dt-basic mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Order Code')); ?></th>
                    <th><?php echo e(__('Num. of Products')); ?></th>
                    <th><?php echo e(__('Customer')); ?></th>
                    <th><?php echo e(__('Amount')); ?></th>
                    <th><?php echo e(__('Delivery Status')); ?></th>
                    <th><?php echo e(__('Payment Method')); ?></th>
                    <th><?php echo e(__('Payment Status')); ?></th>
                    <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                        <th><?php echo e(__('Refund')); ?></th>
                    <?php endif; ?>
                    <th> Status</th>
                    <th width="5%"><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $order = \App\Order::find($order_id->id);
                    ?>
                    <?php if($order != null): ?>
                        <tr>
                            <td>
                                <?php echo e(($key+1) + ($orders->currentPage() - 1)*$orders->perPage()); ?>

                            </td>
                            <td>
                                <?php echo e($order->code); ?> <?php if($order->viewed == 0): ?> <span class="pull-right badge badge-info"><?php echo e(__('New')); ?></span> <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(count($order->orderDetails->where('seller_id', $admin_user_id))); ?>

                            </td>
                            <td>
                                <?php if($order->user != null): ?>
                                    <?php echo e($order->user->name); ?>

                                <?php else: ?>
                                    Guest (<?php echo e($order->guest_id); ?>)
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(single_price($order->orderDetails->where('seller_id', $admin_user_id)->sum('price') + $order->orderDetails->where('seller_id', $admin_user_id)->sum('tax'))); ?>

                            </td>
                            <td>
                                <?php
                                    $status = $order->orderDetails->first()->delivery_status;
                                ?>
                                <?php echo e(ucfirst(str_replace('_', ' ', $status))); ?>

                            </td>
                            <td>
                                <?php echo e(ucfirst(str_replace('_', ' ', $order->payment_type))); ?>

                            </td>
                            <td>
                                <span class="badge badge--2 mr-4">
                                    <?php if($order->orderDetails->where('seller_id',  $admin_user_id)->first()->payment_status == 'paid'): ?>
                                        <i class="bg-green"></i> Paid
                                    <?php else: ?>
                                        <i class="bg-red"></i> Unpaid
                                    <?php endif; ?>
                                </span>
                            </td>
                            <?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
                                <td>
                                    <?php if(count($order->refund_requests) > 0): ?>
                                        <?php echo e(count($order->refund_requests)); ?> Refund
                                    <?php else: ?>
                                        No Refund
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                             <td><label class="switch">
                                <input onchange="update_status(this)" value="<?php echo e($order->id); ?>" type="checkbox" <?php if($order->status == 1) echo "checked";?> >
                                <span class="slider round"></span></label>
                            </td>
                        <td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('orders.show', encrypt($order->id))); ?>"><?php echo e(__('View')); ?></a></li>
                                        <li><a href="<?php echo e(route('seller.invoice.download', $order->id)); ?>"><?php echo e(__('Download Invoice')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('orders.destroy_id',$order->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                <?php echo e($orders->appends(request()->input())->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $.fn.datepicker.defaults.format = "dd-mm-yyyy";
        $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');


});
        function sort_orders(el){
            $('#sort_orders').submit();
        }
        function date_orders(el){
            $('#sort_orders').submit();
        }
         function update_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('order.status.update')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Order status updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/orders/index.blade.php ENDPATH**/ ?>
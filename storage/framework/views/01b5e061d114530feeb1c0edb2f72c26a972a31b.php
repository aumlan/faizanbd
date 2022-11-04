<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		@font-face {
            font-family: 'Roboto';
            src: url("<?php echo e(asset('fonts/Roboto-Regular.ttf')); ?>") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
	</style>
</head>
<body>
	<div style="margin-left:auto;margin-right:auto;">

		<?php
			$generalsetting = \App\GeneralSetting::first();
		?>

		<div style="background: #eceff4;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						<?php if(Auth::user()->user_type == 'seller'): ?>
							<?php if(Auth::user()->shop->logo != null): ?>
								<img loading="lazy"  src="<?php echo e(asset(Auth::user()->shop->logo)); ?>" height="40" style="display:inline-block;">
							<?php else: ?>
								<img loading="lazy"  src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" height="40" style="display:inline-block;">
							<?php endif; ?>
						<?php else: ?>
							<?php if($generalsetting->logo != null): ?>
								<img loading="lazy"  src="<?php echo e(asset($generalsetting->logo)); ?>" height="40" style="display:inline-block;">
							<?php else: ?>
								<img loading="lazy"  src="<?php echo e(asset('frontend/images/logo/logo.png')); ?>" height="40" style="display:inline-block;">
							<?php endif; ?>
						<?php endif; ?>
					</td>
					<td style="font-size: 2.5rem;" class="text-right strong">INVOICE</td>
				</tr>
			</table>
			<table>
				<?php if(Auth::user()->user_type == 'seller'): ?>
					<tr>
						<td style="font-size: 1.2rem;" class="strong"><?php echo e(Auth::user()->shop->name); ?></td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color small"><?php echo e(Auth::user()->shop->address); ?></td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color small">Email: <?php echo e(Auth::user()->email); ?></td>
						<td class="text-right small"><span class="gry-color small">Order ID:</span> <span class="strong"><?php echo e($order->code); ?></span></td>
					</tr>
					<tr>
						<td class="gry-color small">Phone: <?php echo e(Auth::user()->phone); ?></td>
						<td class="text-right small"><span class="gry-color small">Order Date:</span> <span class=" strong"><?php echo e(date('d-m-Y', $order->date)); ?></span></td>
					</tr>
				<?php else: ?>
					<tr>
						<td style="font-size: 1.2rem;" class="strong"><?php echo e($generalsetting->site_name); ?></td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color small"><?php echo e($generalsetting->address); ?></td>
						<td class="text-right"></td>
					</tr>
					<tr>
						<td class="gry-color small">Email: <?php echo e($generalsetting->email); ?></td>
						<td class="text-right small"><span class="gry-color small">Order ID:</span> <span class="strong"><?php echo e($order->code); ?></span></td>
					</tr>
					<tr>
						<td class="gry-color small">Phone: <?php echo e($generalsetting->phone); ?></td>
						<td class="text-right small"><span class="gry-color small">Order Date:</span> <span class=" strong"><?php echo e(date('d-m-Y', $order->date)); ?></span></td>
					</tr>
				<?php endif; ?>
			</table>

		</div>

		<div style="padding: 1.5rem;padding-bottom: 0">
			<table>
				<?php
					$shipping_address = json_decode($order->shipping_address);
				?>
				<tr><td class="strong small gry-color">Bill to:</td></tr>
				<tr><td class="strong"><?php echo e($shipping_address->name); ?></td></tr>
				<tr><td class="gry-color small"><?php echo e($shipping_address->address); ?> <?php echo e($shipping_address->city); ?> <?php echo e(@$shipping_address->country); ?></td></tr>
				<?php if(@$shipping_address->email): ?>
					<tr><td class="gry-color small">Email: <?php echo e($shipping_address->email); ?></td></tr>
				<?php endif; ?>
				
				<tr><td class="gry-color small">Phone: <?php echo e($shipping_address->phone); ?></td></tr>
				<tr><td class="gry-color small">Area: <?php echo e($order->shipping_area); ?></td></tr>
			</table>
		</div>

	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">Product Name</th>
						<th width="15%">Delivery Type</th>
	                    <th width="10%">Qty</th>
	                    <th width="15%">Unit Price</th>
	                    <th width="10%">Tax</th>
	                    <th width="15%" class="text-right">Total</th>
	                </tr>
				</thead>
				<tbody class="strong">
					<?php
						if ((Auth::user()->user_type == 'seller')) {
							$user_id = Auth::user()->id;
						}
						else {
							$user_id = \App\User::where('user_type', 'admin')->first()->id;
						}
					?>
	                <?php $__currentLoopData = $order->orderDetails->where('seller_id', $user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <?php if($orderDetail->product): ?>
							<tr class="">
								<td><?php echo e($orderDetail->product->name); ?> (<?php echo e($orderDetail->variation); ?>)</td>
								<td>
									<?php if($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery'): ?>
										<?php echo e(__('Home Delivery')); ?>

									<?php elseif($orderDetail->shipping_type == 'pickup_point'): ?>
										<?php if($orderDetail->pickup_point != null): ?>
											<?php echo e($orderDetail->pickup_point->name); ?> (<?php echo e(__('Pickip Point')); ?>)
										<?php endif; ?>
									<?php endif; ?>
								</td>
								<td class="gry-color"><?php echo e($orderDetail->quantity); ?></td>
								<td class="gry-color currency"><?php echo e(single_price($orderDetail->price/$orderDetail->quantity)); ?></td>
								<td class="gry-color currency"><?php echo e(single_price($orderDetail->tax/$orderDetail->quantity)); ?></td>
			                    <td class="text-right currency"><?php echo e(single_price($orderDetail->price+$orderDetail->tax)); ?></td>
							</tr>
		                <?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
			            <th class="gry-color text-left">Sub Total</th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->where('seller_id', $user_id)->sum('price'))); ?></td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left">Shipping Cost</th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->where('seller_id', $user_id)->sum('shipping_cost'))); ?></td>
			        </tr>
			        <tr class="border-bottom">
			            <th class="gry-color text-left">Total Tax</th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->where('seller_id', $user_id)->sum('tax'))); ?></td>
			        </tr>
			        <tr>
			            <th class="text-left strong">Grand Total</th>
			            <td class="currency"><?php echo e(single_price($order->orderDetails->where('seller_id', $user_id)->sum('price') + $order->orderDetails->where('seller_id', $user_id)->sum('shipping_cost') + $order->orderDetails->where('seller_id', $user_id)->sum('tax'))); ?></td>
			        </tr>
		        </tbody>
		    </table>
	    </div>

	</div>
</body>
</html><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/invoices/seller_invoice.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<section class="gry-bg py-4 profile">
    <div class="container-fluid">
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row gutters-10">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <input class="form-control" type="text" name="keyword" placeholder="Search by Product Name/Barcode" onkeyup="filterProducts()">
                            </div>
                            <div class="row gutters-5">
                                <div class="col-6">
                                    <div class="">
                                        <div class="form-group">
                                            <select name="poscategory" class="form-control selectpicker" onchange="filterProducts()">
                                                <option value="">All Categories</option>
                                                <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="category-<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="subcategory-<?php echo e($subcategory->id); ?>">- <?php echo e($subcategory->name); ?></option>
                                                        <?php $__currentLoopData = $subcategory->subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="subsubcategory-<?php echo e($subsubcategory->id); ?>">- - <?php echo e($subsubcategory->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="">
                                        <div class="form-group">
                                            <select name="brand" class="form-control selectpicker" onchange="filterProducts()">
                                                <option value="">All Brands</option>
                                                <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pos-product c-scrollbar">
                                <div class="row gutters-10" id="product-list">

                                </div>
                                <div id="load-more">
                                    <p class="text-center h5 c-pointer" onclick="loadMoreProduct()">Load More</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <select name="user_id" class="form-control pos-customer" onchange="getShippingAddress()">
                                        <option value="">Select a Customer</option>
                                        <?php $__currentLoopData = \App\Customer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($customer->user): ?>
                                                <option value="<?php echo e($customer->user->id); ?>" data-contact="<?php echo e($customer->user->email); ?>"><?php echo e($customer->user->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="flex-shrink-0 ml-3" data-toggle="tooltip" data-placement="bottom" data-original-title="Shipping Address">
                                    <button class="btn btn-dark" type="button" data-target="#new-customer" data-toggle="modal">
                                        <i class="fa fa-truck"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" id="cart-details">
                        <div class="card-body">
                            <div class="pos-cart c-scrollbar">
                                <table class="table table-bordered mb-0 mar-no" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="60%"><?php echo e(__('Product')); ?></th>
                                            <th width="15%"><?php echo e(__('QTY')); ?></th>
                                            <th><?php echo e(__('Price')); ?></th>
                                            <th><?php echo e(__('Subtotal')); ?></th>
                                            <th class="text-right"><?php echo e(__('Remove')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $subtotal = 0;
                                            $tax = 0;
                                            $shipping = 0;
                                        ?>
                                        <?php if(Session::has('posCart')): ?>
                                            <?php $__empty_1 = true; $__currentLoopData = Session::get('posCart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php
                                                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                                                    $tax += $cartItem['tax']*$cartItem['quantity'];
                                                    $shipping += $cartItem['shipping']*$cartItem['quantity'];
                                                    if(Session::get('shipping', 0) == 0){
                                                        $shipping = 0;
                                                    }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <span class="media">
                                                            <img class="mr-3" height="60" src="<?php echo e(asset(\App\Product::find($cartItem['id'])->featured_img)); ?>" >
                                                            <div class="media-body">
                                                                <?php echo e(\App\Product::find($cartItem['id'])->name); ?> (<?php echo e($cartItem['variant']); ?>)
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control text-center" placeholder="1" id="qty-<?php echo e($key); ?>" value="<?php echo e($cartItem['quantity']); ?>" onchange="updateQuantity(<?php echo e($key); ?>)" min="1">
                                                        </div>
                                                    </td>
                                                    <td><?php echo e(single_price($cartItem['price'])); ?></td>
                                                    <td><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></td>
                                                    <td class="text-right">
                                                        <button class="btn btn-circle btn-danger btn-xs" type="button" onclick="removeFromCart(<?php echo e($key); ?>)">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        <img src="<?php echo e(asset('img/nothing-found.jpg')); ?>" class="img-fit" height="150">
                                                        <p>No Product Added</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bord-top">
                            <table class="table mb-0 mar-no" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo e(__('Sub Total')); ?></th>
                                        <th class="text-center"><?php echo e(__('Total Tax')); ?></th>
                                        <th class="text-center"><?php echo e(__('Total Shipping')); ?></th>
                                        <th class="text-center"><?php echo e(__('Discount')); ?></th>
                                        <th class="text-center"><?php echo e(__('Total')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><?php echo e(single_price($subtotal)); ?></td>
                                        <td class="text-center"><?php echo e(single_price($tax)); ?></td>
                                        <td class="text-center"><?php echo e(single_price($shipping)); ?></td>
                                        <td class="text-center"><?php echo e(single_price(Session::get('pos_discount', 0))); ?></td>
                                        <td class="text-center"><?php echo e(single_price($subtotal+$tax+$shipping - Session::get('pos_discount', 0))); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pos-footer mar-btm">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="dropdown mr-3">
                                    <button class="btn btn-outline-dark btn-styled dropdown-toggle" type="button" data-toggle="dropdown">
                                        Shipping
                                    </button>
                                    <div class="dropdown-menu p-3 dropdown-menu-lg">
                                        <div class="radio radio-inline">
                                            <input type="radio" name="shipping" id="radioExample_2a" value="0" checked onchange="setShipping()">
                                            <label for="radioExample_2a">Without Shipping Charge</label>
                                        </div>

                                        <div class="radio radio-inline">
                                            <input type="radio" name="shipping" id="radioExample_2b" value="1" onchange="setShipping()">
                                            <label for="radioExample_2b">With Shipping Charge</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-outline-dark btn-styled dropdown-toggle" type="button" data-toggle="dropdown">
                                        Discount
                                    </button>
                                    <div class="dropdown-menu p-3 dropdown-menu-lg">
                                        <div class="">
                                            <input type="number" min="0" placeholder="Amount" name="discount" class="form-control" value="<?php echo e(Session::get('pos_discount', 0)); ?>" required onchange="setDiscount()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-styled btn-success" data-target="#order-confirm" data-toggle="modal">Pay With Cash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<div id="new-customer" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Shipping Address</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label" for="name"><?php echo e(__('Name')); ?></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="<?php echo e(__('Name')); ?>" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="email"><?php echo e(__('Email')); ?></label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="<?php echo e(__('Email')); ?>" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="address"><?php echo e(__('Address')); ?></label>
                        <div class="col-sm-10">
                            <textarea placeholder="<?php echo e(__('Address')); ?>" id="address" name="address" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="email"><?php echo e(__('Country')); ?></label>
                        <div class="col-sm-10">
                            <select name="country" id="country" class="form-control selectpicker" required data-placeholder="<?php echo e(__('Select country')); ?>">
                                <?php $__currentLoopData = \App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="city"><?php echo e(__('City')); ?></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="<?php echo e(__('City')); ?>" id="city" name="city" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="postal_code"><?php echo e(__('Postal code')); ?></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" placeholder="<?php echo e(__('Postal code')); ?>" id="postal_code" name="postal_code" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" row">
                        <label class="col-sm-2 control-label" for="phone"><?php echo e(__('Phone')); ?></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" placeholder="<?php echo e(__('Phone')); ?>" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-styled btn-base-1" data-dismiss="modal">Confirm</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="product-variation" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg">
        <div class="modal-content" id="variants">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="order-confirm" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
        <div class="modal-content" id="variants"><div class="modal-header">
                <h4 class="modal-title h6">Order Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <h4>Are you sure to confirm this order?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitOrder('cash')" class="btn btn-styled btn-base-1">Comfirm Order</button>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        var products = null;

        $(document).ready(function(){
            $('#product-list').on('click','.product-card',function(){
                var id = $(this).data('id');
                $.get('<?php echo e(route('variants')); ?>', {id:id}, function(data){
                    if (data == 0) {
                        addToCart(id, null, 1);
                    }
                    else {
                        $('#variants').html(data);
                        $('#product-variation').modal('show');
                    }
                });
            });
            filterProducts();
        });

        function filterProducts(){
            var keyword = $('input[name=keyword]').val();
            var category = $('select[name=poscategory]').val();
            var brand = $('select[name=brand]').val();
            $.get('<?php echo e(route('pos.search_product')); ?>',{keyword:keyword, category:category, brand:brand}, function(data){
                products = data;
                $('#product-list').html(null);
                setProductList(data);
            });
        }

        function loadMoreProduct(){
            if(products != null && products.links.next != null){
                $.get(products.links.next,{}, function(data){
                    products = data;
                    setProductList(data);
                });
            }
        }

        function setProductList(data){
            for (var i = 0; i < data.data.length; i++) {
                $('#product-list').append('<div class="col-3">' +
                    '<div class="card product-card bg-gray" data-id="'+data.data[i].id+'" >'+
                        '<span class="price">'+data.data[i].price +'</span>'+
                        '<img src="'+ data.data[i].thumbnail_image +'" class="card-img-top img-fit" style="height: 80px">'+
                        '<div class="card-body">'+
                            '<div class="text-truncate-2 small" style="height: 28px">'+ data.data[i].name +'</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            }
            if (data.links.next != null) {
                $('#load-more').find('.text-center').html('Load More');
            }
            else {
                $('#load-more').find('.text-center').html('Nothing more found');
            }
            $('[data-toggle="tooltip"]').tooltip();
        }

        function removeFromCart(key){
            $.post('<?php echo e(route('pos.removeFromCart')); ?>', {_token:'<?php echo e(csrf_token()); ?>', key:key}, function(data){
                $('#cart-details').html(data);
                $('#product-variation').modal('hide');
            });
        }

        function addToCart(product_id, variant, quantity){
            $.post('<?php echo e(route('pos.addToCart')); ?>',{_token:'<?php echo e(csrf_token()); ?>', product_id:product_id, variant:variant, quantity, quantity}, function(data){
                $('#cart-details').html(data);
                $('#product-variation').modal('hide');
            });
        }

        function addVariantProductToCart(id){
            var variant = $('input[name=variant]:checked').val();
            addToCart(id, variant, 1);
        }

        function updateQuantity(key){
            $.post('<?php echo e(route('pos.updateQuantity')); ?>',{_token:'<?php echo e(csrf_token()); ?>', key:key, quantity: $('#qty-'+key).val()}, function(data){
                $('#cart-details').html(data);
                $('#product-variation').modal('hide');
            });
        }

        function setDiscount(){
            var discount = $('input[name=discount]').val();
            $.post('<?php echo e(route('pos.setDiscount')); ?>',{_token:'<?php echo e(csrf_token()); ?>', discount:discount}, function(data){
                $('#cart-details').html(data);
                $('#product-variation').modal('hide');
            });
        }

        function setShipping(){
            var shipping = $('input[name=shipping]:checked').val();
            $.post('<?php echo e(route('pos.setShipping')); ?>',{_token:'<?php echo e(csrf_token()); ?>', shipping:shipping}, function(data){
                $('#cart-details').html(data);
                $('#product-variation').modal('hide');
            });
        }

        function getShippingAddress(){
            $.post('<?php echo e(route('pos.getShippingAddress')); ?>',{_token:'<?php echo e(csrf_token()); ?>', id:$('select[name=user_id]').val()}, function(data){
                if(data != null){
                    $('input[name=name]').val(data.name);
                    $('input[name=email]').val(data.email);
                    $('input[name=address]').val(data.address);
                    $('select[name=country]').val(data.country).change();
                    $('input[name=city]').val(data.city);
                    $('input[name=postal_code]').val(data.postal_code);
                    $('input[name=phone]').val(data.phone);
                }
            });
        }

        function submitOrder(payment_type){
            var user_id = $('select[name=user_id]').val();
            var name = $('input[name=name]').val();
            var email = $('input[name=email]').val();
            var address = $('input[name=address]').val();
            var country = $('select[name=country]').val();
            var city = $('input[name=city]').val();
            var postal_code = $('input[name=postal_code]').val();
            var phone = $('input[name=phone]').val();
            var shipping = $('input[name=shipping]:checked').val();
            var discount = $('input[name=discount]').val();
            $.post('<?php echo e(route('pos.order_place')); ?>',{_token:'<?php echo e(csrf_token()); ?>', user_id:user_id, name:name, email:email, address:address, country:country, postal_code:postal_code, phone:phone, payment_type:payment_type, shipping:shipping, discount:discount}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Order Completed Successfully.');
                    location.reload();
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/pos/frontend/seller/pos/index.blade.php ENDPATH**/ ?>
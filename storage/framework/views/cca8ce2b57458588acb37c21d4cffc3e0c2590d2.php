

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-rounded btn-info pull-right"><?php echo e(__('Add New Seller')); ?></a>
        </div>
    </div>

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no"><?php echo e(__('Sellers')); ?></h3>
            <div class="pull-right clearfix">
                <form class="" id="sort_sellers" action="" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="select" style="min-width: 300px;">
                            <select class="form-control demo-select2" name="approved_status" id="approved_status" onchange="sort_sellers()">
                                <option value=""><?php echo e(__('Filter by Approval')); ?></option>
                                <option value="1"  <?php if(isset($approved)): ?> <?php if($approved == 'paid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Approved')); ?></option>
                                <option value="0"  <?php if(isset($approved)): ?> <?php if($approved == 'unpaid'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Non-Approved')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px;">
                            <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="Type name or email & Enter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Phone')); ?></th>
                    <th><?php echo e(__('Email Address')); ?></th>
                    <th><?php echo e(__('Verification Info')); ?></th>
                    <th><?php echo e(__('Approval')); ?></th>
                    <th><?php echo e(__('Num. of Products')); ?></th>
                    <th><?php echo e(__('Due to seller')); ?></th>
                    <th width="10%"><?php echo e(__('Options')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($seller->user != null): ?>
                        <tr>
                            <td><?php echo e(($key+1) + ($sellers->currentPage() - 1)*$sellers->perPage()); ?></td>
                            <td><?php echo e($seller->user->name); ?></td>
                            <td><?php echo e($seller->user->phone); ?></td>
                            <td><?php echo e($seller->user->email); ?></td>
                            <td>
                                Request for: 
                                 <?php if($seller->user->role==2): ?>
                                 Reseller
                                 <?php elseif($seller->user->role==3): ?>
                                 Seller
                                 <?php else: ?>
                                 Both
                                 <?php endif; ?>
                                <?php if($seller->verification_info != null): ?>
                                    <a href="<?php echo e(route('sellers.show_verification_request', $seller->id)); ?>">
                                        <div class="label label-table label-info">
                                            <?php echo e(__('Show')); ?>

                                        </div>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <label class="switch">
                                    <input onchange="update_approved(this)" value="<?php echo e($seller->id); ?>" type="checkbox" <?php if($seller->verification_status == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td><?php echo e(\App\Product::where('user_id', $seller->user->id)->count()); ?></td>
                            <td>
                                <?php if($seller->admin_to_pay >= 0): ?>
                                    <?php echo e(single_price($seller->admin_to_pay)); ?>

                                <?php else: ?>
                                    <?php echo e(single_price(abs($seller->admin_to_pay))); ?> (Due to Admin)
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        <?php echo e(__('Actions')); ?> <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a onclick="show_seller_profile('<?php echo e($seller->id); ?>');"><?php echo e(__('Profile')); ?></a></li>
                                        <li><a onclick="show_seller_payment_modal('<?php echo e($seller->id); ?>');"><?php echo e(__('Pay Now')); ?></a></li>
                                        <li><a onclick="show_url_modal('<?php echo e($seller->user_id); ?>');"><?php echo e(__('Shop Url Modify')); ?></a></li>
                                        <li><a href="<?php echo e(route('sellers.payment_history', encrypt($seller->id))); ?>"><?php echo e(__('Payment History')); ?></a></li>
                                        <li><a href="<?php echo e(route('sellers.edit', encrypt($seller->id))); ?>"><?php echo e(__('Edit')); ?></a></li>
                                        <li><a onclick="confirm_modal('<?php echo e(route('sellers.destroy', $seller->id)); ?>');"><?php echo e(__('Delete')); ?></a></li>
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
                    <?php echo e($sellers->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    <div class="modal fade" id="shopUrl_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>
    



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function show_seller_payment_modal(id){
            $.post('<?php echo e(route('sellers.payment_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }

        function show_seller_profile(id){
            $.post('<?php echo e(route('sellers.profile_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#profile_modal #modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });

        }

        function show_url_modal(id){
            
               $.post('<?php echo e(route('sellers.shopurl_modal')); ?>',{_token:'<?php echo e(@csrf_token()); ?>', id:id}, function(data){
                $('#shopUrl_modal #modal-content').html(data);
                $('#shopUrl_modal').modal('show', {backdrop: 'static'});
            });
        
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('sellers.approved')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Approved sellers updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        function sort_sellers(el){
            $('#sort_sellers').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/sellers/index.blade.php ENDPATH**/ ?>
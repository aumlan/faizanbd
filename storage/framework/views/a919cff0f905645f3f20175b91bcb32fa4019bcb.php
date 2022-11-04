

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    <?php echo $__env->make('frontend.inc.seller_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Shop Settings')); ?>

                                        <a href="<?php echo e(route('shop.visit', $shop->slug)); ?>" class="btn btn-link btn-sm" target="_blank">(<?php echo e(__('Visit Shop')); ?>)<i class="la la-external-link"></i>)</a>
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('shops.index')); ?>"><?php echo e(__('Shop Settings')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="sid" value="<?php echo e($shop->id); ?>">
                        <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <?php echo csrf_field(); ?>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Basic info')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Shop Name')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Shop Name')); ?>" name="name" value="<?php echo e($shop->name); ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Shop URL')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <span class="snotice" style="display: none;">Already exist please try another</span>
                                            <input id="sample_search" type="text" class="form-control mb-3" placeholder="<?php echo e(__('Shop url')); ?>" name="slug" value="<?php echo e($shop->slug); ?>" required>
                                            
                                        </div>
                                    </div>
                                    <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping'): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label><?php echo e(__('Shipping Cost')); ?> <span class="required-star">*</span></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" min="0" class="form-control mb-3" placeholder="<?php echo e(__('Shipping Cost')); ?>" name="shipping_cost" value="<?php echo e($shop->shipping_cost); ?>" required>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Pickup Points')); ?> <span class="required-star"></span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control mb-3 selectpicker" data-placeholder="Select Pickup Point" id="pick_up_point" name="pick_up_point_id[]" multiple>
                                                <?php $__currentLoopData = \App\PickupPoint::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(Auth::user()->shop->pick_up_point_id != null): ?>
                                                        <option value="<?php echo e($pick_up_point->id); ?>" <?php if(in_array($pick_up_point->id, json_decode(Auth::user()->shop->pick_up_point_id))): ?> selected <?php endif; ?>><?php echo e($pick_up_point->name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($pick_up_point->id); ?>"><?php echo e($pick_up_point->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Logo')); ?> <small>(120x120)</small></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="logo" id="file-2" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                                            <label for="file-2" class="mw-100 mb-3">
                                                <span></span>
                                                <strong>
                                                    <i class="fa fa-upload"></i>
                                                    <?php echo e(__('Choose image')); ?>

                                                </strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Address')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Address')); ?>" name="address" value="<?php echo e($shop->address); ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Meta Title')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Meta Title')); ?>" name="meta_title" value="<?php echo e($shop->meta_title); ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo e(__('Meta Description')); ?> <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="meta_description" rows="6" class="form-control mb-3" required><?php echo e($shop->meta_description); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" id="shopb" class="btn btn-styled btn-base-1 shopbt"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>

                        <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <?php echo csrf_field(); ?>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Slider Settings')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div id="shop-slider-images">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label><?php echo e(__('Slider Images')); ?> <small>(1400x400)</small></label>
                                            </div>
                                            <div class="offset-2 offset-md-0 col-10 col-md-10">
                                                <div class="row">
                                                    <?php if($shop->sliders != null): ?>
                                                        <?php $__currentLoopData = json_decode($shop->sliders); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-6">
                                                                <div class="img-upload-preview">
                                                                    <img loading="lazy"  src="<?php echo e(asset($sliders)); ?>" alt="" class="img-fluid">
                                                                    <input type="hidden" name="previous_sliders[]" value="<?php echo e($sliders); ?>">
                                                                    <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <input type="file" name="sliders[]" id="slide-0" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" multiple accept="image/*" />
                                                <label for="slide-0" class="mw-100 mb-3">
                                                    <span></span>
                                                    <strong>
                                                        <i class="fa fa-upload"></i>
                                                        <?php echo e(__('Choose image')); ?>

                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-info mb-3" onclick="add_more_slider_image()"><?php echo e(__('Add More')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>

                        <form class="" action="<?php echo e(route('shops.update', $shop->id)); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <?php echo csrf_field(); ?>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Social Media Link')); ?>

                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label ><i class="line-height-1_8 size-24 mr-2 fa fa-facebook bg-facebook c-white text-center"></i><?php echo e(__('Facebook')); ?> </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Facebook')); ?>" name="facebook" value="<?php echo e($shop->facebook); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><i class="line-height-1_8 size-24 mr-2 fa fa-twitter bg-twitter c-white text-center"></i><?php echo e(__('Twitter')); ?> </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Twitter')); ?>" name="twitter" value="<?php echo e($shop->twitter); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><i class="line-height-1_8 size-24 mr-2 fa fa-google bg-google c-white text-center"></i><?php echo e(__('Google')); ?> </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Google')); ?>" name="google" value="<?php echo e($shop->google); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><i class="line-height-1_8 size-24 mr-2 fa fa-youtube bg-youtube c-white text-center"></i><?php echo e(__('Youtube')); ?> </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Youtube')); ?>" name="youtube" value="<?php echo e($shop->youtube); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var slide_id = 1;
        function add_more_slider_image(){
            var shopSliderAdd =  '<div class="row">';
            shopSliderAdd +=  '<div class="col-2">';
            shopSliderAdd +=  '<button type="button" onclick="delete_this_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button>';
            shopSliderAdd +=  '</div>';
            shopSliderAdd +=  '<div class="col-10">';
            shopSliderAdd +=  '<input type="file" name="sliders[]" id="slide-'+slide_id+'" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" multiple accept="image/*" />';
            shopSliderAdd +=  '<label for="slide-'+slide_id+'" class="mw-100 mb-3">';
            shopSliderAdd +=  '<span></span>';
            shopSliderAdd +=  '<strong>';
            shopSliderAdd +=  '<i class="fa fa-upload"></i>';
            shopSliderAdd +=  "<?php echo e(__('Choose image')); ?>";
            shopSliderAdd +=  '</strong>';
            shopSliderAdd +=  '</label>';
            shopSliderAdd +=  '</div>';
            shopSliderAdd +=  '</div>';
            $('#shop-slider-images').append(shopSliderAdd);

            slide_id++;
            imageInputInitialize();
        }
        function delete_this_row(em){
            $(em).closest('.row').remove();
        }


        $(document).ready(function(){
            $('.remove-files').on('click', function(){
                $(this).parents(".col-md-6").remove();
            });
        });
        var searchRequest = null;

$(function () {
    var minlength = 3;

    $("#sample_search").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null) 
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "POST",
                url: "<?php echo e(route('shop_url.check')); ?>",
                data: {
                    'search_keyword' : value,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: "text",
                success: function(data){
                    // alert(data);
                    //we need to check if the value is the same
                    if (data==0) {
                    //Receiving the result of search here
                    $(".snotice").css({"color":"red","display":"none"});
                        
                        $('#shopb').prop('disabled', false);
                    }
                    else{
                        $(".snotice").css({"color":"red","display":"block"});
                        $("#sample_search").css({"border-color":"#e62e04"});
                        $('#shopb').prop('disabled', true);
                    }
                }
            });
        }
    });
});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/seller/shop.blade.php ENDPATH**/ ?>
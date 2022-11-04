

<?php $__env->startSection('content'); ?>

<style>
    /* Custom Radio Button Start*/

.radiotextsty {
  color: #555;
  font-size: 14px;
}

.customradio {
  display: block;
  position: relative;
  padding-left: 20px;
  margin-bottom: 0px;
  cursor: pointer;
  font-size: 13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  line-height: 13px;
}

/* Hide the browser's default radio button */
.customradio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 14px;
  width: 14px;
  background-color: white;
  border-radius: 50%;
  border:1px solid #BEBEBE;
}

/* On mouse-over, add a grey background color */
.customradio:hover input ~ .checkmark {
  background-color: transparent;
}

/* When the radio button is checked, add a blue background */
.customradio input:checked ~ .checkmark {
  background-color: white;
  border:1px solid #BEBEBE;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.customradio input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.customradio .checkmark:after {
  top: 1.5px;
  left: 1px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #28a745;
}

/* Custom Radio Button End*/
</style>

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
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
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

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
                        <form class="form-default" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                            <?php echo csrf_field(); ?>
                                
                                    <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="labeltext">Shipping Area</label><br>
                                                  <div class="form-check-inline">

                                                    <label class="customradio">
                                                    <a href="<?php echo e(route('checkout.shipping_info', 'inside_dhaka')); ?>">
                                                    <span class="radiotextsty">Inside Dhaka</span>
                                                    </a>
                                                      <input type="radio" <?php echo e($shipping_area == 'inside_dhaka'?'checked':''); ?> >
                                                      <span class="checkmark"></span>
                                                    </label>

                                                            
                                                    <label class="customradio">
                                                    <a href="<?php echo e(route('checkout.shipping_info', 'outside_dhaka')); ?>">
                                                            <span class="radiotextsty">Outside Dhaka</span>
                                                        </a>
                                                      <input type="radio" <?php echo e($shipping_area == 'outside_dhaka'?'checked':''); ?> >
                                                      <span class="checkmark"></span>
                                                    </label>

                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Name')); ?></label>
                                                    <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Phone')); ?></label>
                                                   <input type="number" min="0" class="form-control" placeholder="<?php echo e(__('Phone')); ?>" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo e(__('Address')); ?></label>
                                                    <input type="text" class="form-control" name="address" placeholder="<?php echo e(__('Address')); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="row">
                        </div>

                                        
                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                    </div>
                              
                            <div class="row align-items-center pt-4">
                                <div class="col-md-6 col-6">
                                    <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        <?php echo e(__('Return to shop')); ?>

                                    </a>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1"><?php echo e(__('Continue to Payment')); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        <?php echo $__env->make('frontend.partials.cart_summary2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><?php echo e(__('New Address')); ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="<?php echo e(route('addresses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="p-3">
                        
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Country')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <select class="form-control mb-3 selectpicker division" data-placeholder="<?php echo e(__('Select your Country')); ?>" id="country" name="country" required>
                                        <option>
                                            Select Your Country
                                        </option>
                                        <?php $__currentLoopData = \App\Country::orderBy('name','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('City')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="city" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Street Address')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control textarea-autogrow mb-3" placeholder="<?php echo e(__('e.g House# , Road# etc')); ?>" rows="1" name="address" required></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Postal code')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('Your Postal Code')); ?>" name="postal_code" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label><?php echo e(__('Phone')); ?></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3" placeholder="<?php echo e(__('880')); ?>" name="phone" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-base-1"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }
    function updateShipping(key, element){
        var city= $('#city').val();
        $.post('<?php echo e(route('cart.updateShipping')); ?>', { _token:'<?php echo e(csrf_token()); ?>', key:key, shipping: element.value,city:city}, function(data){
            updateNavCart();
            $('#cart-summary').html(data);
        });
    }

    function get_subcategories_by_category(){
        var region = $('#region').val();
        $.post('<?php echo e(route('region.city_by_region')); ?>',{_token:'<?php echo e(csrf_token()); ?>', region:region}, function(data){
            $('#city').html(null);
            // alert(data);
             $('#city').append($('<option>', {
                value: null,
                text: null
            }));
            for (var i = 0; i < data.length; i++) {
                $('#city').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
            // get_subsubcategories_by_subcategory();
        });
    }

    function get_subsubcategories_by_subcategory(){
        var city = $('#city').val();
        $.post('<?php echo e(route('city.area_by_city')); ?>',{_token:'<?php echo e(csrf_token()); ?>', city:city}, function(data){
            $('#area').html(null);
            $('#area').append($('<option>', {
                value: null,
                text: null
            }));
            for (var i = 0; i < data.length; i++) {
                $('#area').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
            //get_brands_by_subsubcategory();
            //get_attributes_by_subsubcategory();
        });
    }

    function get_brands_by_subsubcategory(){
        var subsubcategory_id = $('#subsubcategory_id').val();
        $.post('<?php echo e(route('subsubcategories.get_brands_by_subsubcategory')); ?>',{_token:'<?php echo e(csrf_token()); ?>', subsubcategory_id:subsubcategory_id}, function(data){
            $('#brand_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#brand_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
        });
    }

    $('#region').on('change', function() {
        get_subcategories_by_category();
    });

    $('#city').on('change', function() {
        get_subsubcategories_by_subcategory();
    });

    $('#area').on('change', function() {
        // get_brands_by_subsubcategory();
        //get_attributes_by_subsubcategory();
    });
</script>
<script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el) {
            var value = $(el).val();
            var target = $(el).data('target');

            console.log(value);

            if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
            }else{
                $(target).removeClass('d-none');
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/frontend/shipping_info.blade.php ENDPATH**/ ?>
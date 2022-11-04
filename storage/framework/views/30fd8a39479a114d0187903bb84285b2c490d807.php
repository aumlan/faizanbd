

<?php $__env->startSection('content'); ?>
<div>
    <h1 class="page-header text-overflow">Add New Product</h1>
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<form class="form form-horizontal mar-top" action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data" id="choice_form">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="added_by" value="admin">
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product Information')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Product Name')); ?></label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Product Name')); ?>" onchange="update_sku()" required>
						</div>
					</div>
					<div class="form-group" id="category">
						<label class="col-lg-2 control-label"><?php echo e(__('Category')); ?></label>
						<div class="col-lg-7">
							<select class="form-control demo-select2-placeholder" name="category_id" id="category_id" required>
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($category->id); ?>"><?php echo e(__($category->name)); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="form-group" id="subcategory">
						<label class="col-lg-2 control-label"><?php echo e(__('Subcategory')); ?></label>
						<div class="col-lg-7">
							<select class="form-control demo-select2-placeholder" name="subcategory_id" id="subcategory_id" required>

							</select>
						</div>
					</div>
					<div class="form-group" id="subsubcategory">
						<label class="col-lg-2 control-label"><?php echo e(__('Sub Subcategory')); ?></label>
						<div class="col-lg-7">
							<select class="form-control demo-select2-placeholder" name="subsubcategory_id" id="subsubcategory_id">

							</select>
						</div>
					</div>
					<div class="form-group" id="brand">
						<label class="col-lg-2 control-label"><?php echo e(__('Brand')); ?></label>
						<div class="col-lg-7">
							<select class="form-control demo-select2-placeholder" name="brand_id" id="brand_id">
								<option value=""><?php echo e(('Select Brand')); ?></option>
								<?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Unit')); ?></label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="unit" placeholder="Unit (e.g. KG, Pc etc)" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Tags')); ?></label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="tags[]" placeholder="Type to add a tag" data-role="tagsinput">
						</div>
					</div>
					<?php
					    $pos_addon = \App\Addon::where('unique_identifier', 'pos_system')->first();
					?>
					<?php if($pos_addon != null && $pos_addon->activated == 1): ?>
						<div class="form-group">
							<label class="col-lg-2 control-label"><?php echo e(__('Barcode')); ?></label>
							<div class="col-lg-7">
								<input type="text" class="form-control" name="barcode" placeholder="<?php echo e(('Barcode')); ?>">
							</div>
						</div>
					<?php endif; ?>

					<?php
					    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
					?>
					<?php if($refund_request_addon != null && $refund_request_addon->activated == 1): ?>
						<div class="form-group">
							<label class="col-lg-2 control-label"><?php echo e(__('Refundable')); ?></label>
							<div class="col-lg-7">
								<label class="switch" style="margin-top:5px;">
									<input type="checkbox" name="refundable" checked>
		                            <span class="slider round"></span></label>
								</label>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product Images')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Gallery Images')); ?> </label>
						<div class="col-lg-7">
							<div id="photos">

							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Thumbnail Image')); ?> <small>(290x300)</small></label>
						<div class="col-lg-7">
							<div id="thumbnail_img">

							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Featured')); ?> <small>(290x300)</small></label>
						<div class="col-lg-7">
							<div id="featured_img">

							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Flash Deal')); ?> <small>(290x300)</small></label>
						<div class="col-lg-7">
							<div id="flash_deal_img">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product Videos')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Video Provider')); ?></label>
						<div class="col-lg-7">
							<select class="form-control demo-select2-placeholder" name="video_provider" id="video_provider">
								<option value="youtube"><?php echo e(__('Youtube')); ?></option>
								<option value="dailymotion"><?php echo e(__('Dailymotion')); ?></option>
								<option value="vimeo"><?php echo e(__('Vimeo')); ?></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Video Link')); ?></label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="video_link" placeholder="<?php echo e(__('Video Link')); ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product Variation')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-2">
							<input type="text" class="form-control" value="<?php echo e(__('Colors')); ?>" disabled>
						</div>
						<div class="col-lg-7">
							<select class="form-control color-var-select" name="colors[]" id="colors" multiple disabled>
								<?php $__currentLoopData = \App\Color::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($color->code); ?>"><?php echo e($color->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="col-lg-2">
							<label class="switch" style="margin-top:5px;">
								<input value="1" type="checkbox" name="colors_active">
								<span class="slider round"></span>
							</label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-2">
							<input type="text" class="form-control" value="<?php echo e(__('Attributes')); ?>" disabled>
						</div>
	                    <div class="col-lg-7">
	                        <select name="choice_attributes[]" id="choice_attributes" class="form-control demo-select2" multiple data-placeholder="Choose Attributes">
								<?php $__currentLoopData = \App\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                    </div>
	                </div>

					<div>
						<p>Choose the attributes of this product and then input values of each attribute</p>
						<br>
					</div>

					<div class="customer_choice_options" id="customer_choice_options">

					</div>

					
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product price + stock')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Unit price')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Unit price')); ?>" name="unit_price" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Purchase price')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Purchase price')); ?>" name="purchase_price" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Wholesale price')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Wholesale price')); ?>" name="wholesale_price" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Tax')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Tax')); ?>" name="tax" class="form-control" required>
						</div>
						<div class="col-lg-1">
							<select class="demo-select2" name="tax_type">
								<option value="amount"><?php echo e(__('Flat')); ?></option>
								<option value="percent"><?php echo e(__('Percent')); ?></option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Discount')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Discount')); ?>" name="discount" class="form-control" required>
						</div>
						<div class="col-lg-1">
							<select class="demo-select2" name="discount_type">
								<option value="amount"><?php echo e(__('Flat')); ?></option>
								<option value="percent"><?php echo e(__('Percent')); ?></option>
							</select>
						</div>
					</div>
					<div class="form-group" id="quantity">
						<label class="col-lg-2 control-label"><?php echo e(__('Quantity')); ?></label>
						<div class="col-lg-7">
							<input type="number" min="0" value="0" step="1" placeholder="<?php echo e(__('Quantity')); ?>" name="current_stock" class="form-control" required>
						</div>
					</div>
					<br>
					<div class="sku_combination" id="sku_combination">

					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('Product Description')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Description')); ?></label>
						<div class="col-lg-9">
							<textarea class="editor" name="description"></textarea>
						</div>
					</div>
				</div>
			</div>
            <?php if(\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping'): ?>
                <div class="panel">
    				<div class="panel-heading bord-btm">
    					<h3 class="panel-title"><?php echo e(__('Product Shipping Cost')); ?></h3>
    				</div>
    				<div class="panel-body">
    					<div class="row bord-btm">
    						<div class="col-md-2">
    							<div class="panel-heading">
    								<h3 class="panel-title"><?php echo e(__('Free Shipping')); ?></h3>
    							</div>
    						</div>
    						<div class="col-md-10">
    							<div class="form-group">
    								<label class="col-lg-2 control-label"><?php echo e(__('Status')); ?></label>
    								<div class="col-lg-7">
    									<label class="switch" style="margin-top:5px;">
    										<input type="radio" name="shipping_type" value="free" checked>
    										<span class="slider round"></span>
    									</label>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-md-2">
    							<div class="panel-heading">
    								<h3 class="panel-title"><?php echo e(__('Flat Rate')); ?></h3>
    							</div>
    						</div>
    						<div class="col-md-10">
    							<div class="form-group">
    								<label class="col-lg-2 control-label"><?php echo e(__('Status')); ?></label>
    								<div class="col-lg-7">
    									<label class="switch" style="margin-top:5px;">
    										<input type="radio" name="shipping_type" value="flat_rate" checked>
    										<span class="slider round"></span>
    									</label>
    								</div>
    							</div>
    							<div class="form-group">
    								<label class="col-lg-2 control-label"><?php echo e(__('Shipping cost')); ?></label>
    								<div class="col-lg-7">
    									<input type="number" min="0" value="0" step="0.01" placeholder="<?php echo e(__('Shipping cost')); ?>" name="flat_shipping_cost" class="form-control" required>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
            <?php endif; ?>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('PDF Specification')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('PDF Specification')); ?></label>
						<div class="col-lg-7">
							<input type="file" class="form-control" placeholder="<?php echo e(__('PDF')); ?>" name="pdf" accept="application/pdf">
						</div>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading bord-btm">
					<h3 class="panel-title"><?php echo e(__('SEO Meta Tags')); ?></h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Meta Title')); ?></label>
						<div class="col-lg-7">
							<input type="text" class="form-control" name="meta_title" placeholder="<?php echo e(__('Meta Title')); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Description')); ?></label>
						<div class="col-lg-7">
							<textarea name="meta_description" rows="8" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label"><?php echo e(__('Meta Image')); ?></label>
						<div class="col-lg-7">
							<div id="meta_photo">

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mar-all text-right">
				<button type="submit" name="button" class="btn btn-info"><?php echo e(__('Add New Product')); ?></button>
			</div>
		</form>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
	function add_more_customer_choice_option(i, name){
		$('#customer_choice_options').append('<div class="form-group"><div class="col-lg-2"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="choice_options_'+i+'[]" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()"></div></div>');

		$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
	}

	$('input[name="colors_active"]').on('change', function() {
	    if(!$('input[name="colors_active"]').is(':checked')){
			$('#colors').prop('disabled', true);
		}
		else{
			$('#colors').prop('disabled', false);
		}
		update_sku();
	});

	$('#colors').on('change', function() {
	    update_sku();
	});

	$('input[name="unit_price"]').on('keyup', function() {
	    update_sku();
	});

	$('input[name="name"]').on('keyup', function() {
	    update_sku();
	});

	function delete_row(em){
		$(em).closest('.form-group').remove();
		update_sku();
	}

	function update_sku(){
		$.ajax({
		   type:"POST",
		   url:'<?php echo e(route('products.sku_combination')); ?>',
		   data:$('#choice_form').serialize(),
		   success: function(data){
			   $('#sku_combination').html(data);
			   if (data.length > 1) {
				   $('#quantity').hide();
			   }
			   else {
					$('#quantity').show();
			   }
		   }
	   });
	}

	function get_subcategories_by_category(){
		var category_id = $('#category_id').val();
		$.post('<?php echo e(route('subcategories.get_subcategories_by_category')); ?>',{_token:'<?php echo e(csrf_token()); ?>', category_id:category_id}, function(data){
		    $('#subcategory_id').html(null);
		    for (var i = 0; i < data.length; i++) {
		        $('#subcategory_id').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		        $('.demo-select2').select2();
		    }
		    get_subsubcategories_by_subcategory();
		});
	}

	function get_subsubcategories_by_subcategory(){
		var subcategory_id = $('#subcategory_id').val();
		$.post('<?php echo e(route('subsubcategories.get_subsubcategories_by_subcategory')); ?>',{_token:'<?php echo e(csrf_token()); ?>', subcategory_id:subcategory_id}, function(data){
		    $('#subsubcategory_id').html(null);
			$('#subsubcategory_id').append($('<option>', {
				value: null,
				text: null
			}));
		    for (var i = 0; i < data.length; i++) {
		        $('#subsubcategory_id').append($('<option>', {
		            value: data[i].id,
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

	function get_attributes_by_subsubcategory(){
		var subsubcategory_id = $('#subsubcategory_id').val();
		$.post('<?php echo e(route('subsubcategories.get_attributes_by_subsubcategory')); ?>',{_token:'<?php echo e(csrf_token()); ?>', subsubcategory_id:subsubcategory_id}, function(data){
		    $('#choice_attributes').html(null);
		    for (var i = 0; i < data.length; i++) {
		        $('#choice_attributes').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		    }
			$('.demo-select2').select2();
		});
	}

	$(document).ready(function(){
	    get_subcategories_by_category();
		$("#photos").spartanMultiImagePicker({
			fieldName:        'photos[]',
			maxCount:         10,
			rowHeight:        '200px',
			groupClassName:   'col-md-4 col-sm-4 col-xs-6',
			maxFileSize:      '',
			dropFileLabel : "Drop Here",
			onExtensionErr : function(index, file){
				console.log(index, file,  'extension err');
				alert('Please only input png or jpg type file')
			},
			onSizeErr : function(index, file){
				console.log(index, file,  'file size too big');
				alert('File size too big');
			}
		});
		$("#thumbnail_img").spartanMultiImagePicker({
			fieldName:        'thumbnail_img',
			maxCount:         1,
			rowHeight:        '200px',
			groupClassName:   'col-md-4 col-sm-4 col-xs-6',
			maxFileSize:      '',
			dropFileLabel : "Drop Here",
			onExtensionErr : function(index, file){
				console.log(index, file,  'extension err');
				alert('Please only input png or jpg type file')
			},
			onSizeErr : function(index, file){
				console.log(index, file,  'file size too big');
				alert('File size too big');
			}
		});
		$("#featured_img").spartanMultiImagePicker({
			fieldName:        'featured_img',
			maxCount:         1,
			rowHeight:        '200px',
			groupClassName:   'col-md-4 col-sm-4 col-xs-6',
			maxFileSize:      '',
			dropFileLabel : "Drop Here",
			onExtensionErr : function(index, file){
				console.log(index, file,  'extension err');
				alert('Please only input png or jpg type file')
			},
			onSizeErr : function(index, file){
				console.log(index, file,  'file size too big');
				alert('File size too big');
			}
		});
		$("#flash_deal_img").spartanMultiImagePicker({
			fieldName:        'flash_deal_img',
			maxCount:         1,
			rowHeight:        '200px',
			groupClassName:   'col-md-4 col-sm-4 col-xs-6',
			maxFileSize:      '',
			dropFileLabel : "Drop Here",
			onExtensionErr : function(index, file){
				console.log(index, file,  'extension err');
				alert('Please only input png or jpg type file')
			},
			onSizeErr : function(index, file){
				console.log(index, file,  'file size too big');
				alert('File size too big');
			}
		});
		$("#meta_photo").spartanMultiImagePicker({
			fieldName:        'meta_img',
			maxCount:         1,
			rowHeight:        '200px',
			groupClassName:   'col-md-4 col-sm-4 col-xs-6',
			maxFileSize:      '',
			dropFileLabel : "Drop Here",
			onExtensionErr : function(index, file){
				console.log(index, file,  'extension err');
				alert('Please only input png or jpg type file')
			},
			onSizeErr : function(index, file){
				console.log(index, file,  'file size too big');
				alert('File size too big');
			}
		});
	});

	$('#category_id').on('change', function() {
	    get_subcategories_by_category();
	});

	$('#subcategory_id').on('change', function() {
	    get_subsubcategories_by_subcategory();
	});

	$('#subsubcategory_id').on('change', function() {
	    // get_brands_by_subsubcategory();
		//get_attributes_by_subsubcategory();
	});

	$('#choice_attributes').on('change', function() {
		$('#customer_choice_options').html(null);
		$.each($("#choice_attributes option:selected"), function(){
			//console.log($(this).val());
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
		update_sku();
	});


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/products/create.blade.php ENDPATH**/ ?>
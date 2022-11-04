

<?php $__env->startSection('content'); ?>

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-9 mx-auto">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        <?php echo e(__('Affiliate Informations')); ?>

                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                            <li class="active"><a href="<?php echo e(route('affiliate.apply')); ?>"><?php echo e(__('Affiliate')); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="" action="<?php echo e(route('affiliate.store_affiliate_user')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(!Auth::check()): ?>
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2">
                                        <?php echo e(__('User Info')); ?>

                                    </div>
                                    <div class="form-box-content p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <!-- <label><?php echo e(__('Name')); ?></label> -->
                                                    <div class="input-group input-group--style-1">
                                                        <input type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" name="name">
                                                        <span class="input-group-addon">
                                                            <i class="text-md la la-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <!-- <label><?php echo e(__('Email')); ?></label> -->
                                                    <div class="input-group input-group--style-1">
                                                        <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email')); ?>" name="email">
                                                        <span class="input-group-addon">
                                                            <i class="text-md la la-envelope"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <!-- <label><?php echo e(__('Password')); ?></label> -->
                                                    <div class="input-group input-group--style-1">
                                                        <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password">
                                                        <span class="input-group-addon">
                                                            <i class="text-md la la-lock"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <!-- <label><?php echo e(__('Confirm Password')); ?></label> -->
                                                    <div class="input-group input-group--style-1">
                                                        <input type="password" class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" name="password_confirmation">
                                                        <span class="input-group-addon">
                                                            <i class="text-md la la-lock"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    <?php echo e(__('Verification info')); ?>

                                </div>
                                <?php
                                    $verification_form = \App\AffiliateConfig::where('type', 'verification_form')->first()->value;
                                ?>
                                <div class="form-box-content p-3">
                                    <?php $__currentLoopData = json_decode($verification_form); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($element->type == 'text'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?> <span class="required-star">*</span></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="<?php echo e($element->type); ?>" class="form-control mb-3" placeholder="<?php echo e($element->label); ?>" name="element_<?php echo e($key); ?>" required>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'file'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="<?php echo e($element->type); ?>" name="element_<?php echo e($key); ?>" id="file-<?php echo e($key); ?>" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" required/>
                                                    <label for="file-<?php echo e($key); ?>" class="mw-100 mb-3">
                                                        <span></span>
                                                        <strong>
                                                            <i class="fa fa-upload"></i>
                                                            <?php echo e(__('Choose file')); ?>

                                                        </strong>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'select' && is_array(json_decode($element->options))): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_<?php echo e($key); ?>" required>
                                                            <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'multi_select' && is_array(json_decode($element->options))): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="element_<?php echo e($key); ?>[]" multiple required>
                                                            <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif($element->type == 'radio'): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><?php echo e($element->label); ?></label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <?php $__currentLoopData = json_decode($element->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" name="element_<?php echo e($key); ?>" value="<?php echo e($value); ?>" id="<?php echo e($value); ?>" required>
                                                                <label for="<?php echo e($value); ?>"><?php echo e($value); ?></label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idevsoft/faizanbd.com/resources/views/affiliate/frontend/apply_for_affiliate.blade.php ENDPATH**/ ?>
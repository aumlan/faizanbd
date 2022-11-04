<header id="navbar">
    <div id="navbar-container" class="boxed">

        <?php
            $generalsetting = \App\GeneralSetting::first();
        ?>


        <div class="navbar-header">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-brand">
                <?php if($generalsetting->logo != null): ?>
                    <img loading="lazy"  src="<?php echo e(asset($generalsetting->admin_logo)); ?>" class="brand-icon" alt="<?php echo e($generalsetting->site_name); ?>">
                <?php else: ?>
                    <img loading="lazy"  src="<?php echo e(asset('img/logo_shop.png')); ?>" class="brand-icon" alt="<?php echo e($generalsetting->site_name); ?>">
                <?php endif; ?>
                <div class="brand-title">
                    <span class="brand-text"><?php echo e($generalsetting->site_name); ?></span>
                </div>
            </a>
        </div>

        <div class="navbar-content">

            <ul class="nav navbar-top-links">

                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>

                <?php if(\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated): ?>
                <li class="" data-toggle="tooltip" data-placement="bottom" data-original-title="POS">
                    <a class="" href="<?php echo e(route('poin-of-sales.index')); ?>">
                        <i class="fa fa-print"></i>
                    </a>
                </li>
                <?php endif; ?>
                <li class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Browse Frontend">
                    <a target="_blank" href="<?php echo e(route('home')); ?>">
                        <i class="fa fa-globe"></i>
                    </a>
                </li>


            </ul>
            <ul class="nav navbar-top-links">

                <?php
                    $orders = DB::table('orders')
                                ->orderBy('code', 'desc')
                                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                                ->where('order_details.seller_id', \App\User::where('user_type', 'admin')->first()->id)
                                ->where('orders.viewed', 0)
                                ->select('orders.id')
                                ->distinct()
                                ->count();
                    $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                ?>




                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                        <i class="demo-pli-bell"></i>
                        <?php if($orders > 0 || $sellers > 0): ?>
                            <span class="badge badge-header badge-danger"></span>
                        <?php endif; ?>
                    </a>

                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="opacity: 1;">
                        <div class="nano scrollable has-scrollbar" style="height: 265px;">
                            <div class="nano-content" tabindex="0" style="right: -17px;">
                                <ul class="head-list">
                                    <?php if($orders > 0): ?>
                                        <li>
                                            <a class="media" href="<?php echo e(route('orders.index.admin')); ?>" style="position:relative">
                                                <span class="badge badge-header badge-info" style="right:auto;left:3px;"></span>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold"><?php echo e($orders); ?> new order(s)</p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($sellers > 0): ?>
                                        <li>
                                            <a class="media" href="<?php echo e(route('sellers.index')); ?>">
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold"><?php echo e(__('New verification request(s)')); ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="nano-pane" style="">
                                <div class="nano-slider" style="height: 170px; transform: translate(0px, 0px);"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">

                            <i class="demo-pli-male"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">



                            <li>
                                <a href="<?php echo e(route('logout')); ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> <?php echo e(__('Logout')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
<?php /**PATH /home/idevsoft/faizanbd.com/resources/views/inc/admin_nav.blade.php ENDPATH**/ ?>
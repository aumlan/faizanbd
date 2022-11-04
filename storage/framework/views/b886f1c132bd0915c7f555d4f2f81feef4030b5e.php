<!-- FOOTER -->
<!--===================================================-->
<footer id="footer" style="padding-top:0px !important">
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <?php
        $generalsetting = \App\GeneralSetting::first();
    ?>

	<div class="col-sm-10">
		<p class="pad-lft">© <?php echo e(date('Y')); ?> <?php echo e($generalsetting->site_name); ?></p>
	</div>

</footer>
<?php /**PATH /home/idevsoft/faizanbd.com/resources/views/inc/admin_footer.blade.php ENDPATH**/ ?>
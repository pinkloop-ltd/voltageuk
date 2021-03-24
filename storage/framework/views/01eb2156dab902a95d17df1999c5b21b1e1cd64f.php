<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Export Jobs</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>



<div class="container">
	<?php if($message = Session::get('success')): ?>
		<div class="alert alert-info alert-dismissible fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	      </button>
	      <strong>Success!</strong> <?php echo e($message); ?>

	    </div>
	<?php endif; ?>
	<?php echo Session::forget('success'); ?>

	<br />
	<a href="<?php echo e(URL::to('downloadExcel/xls')); ?>"><button class="btn btn-success">Download Excel xls</button></a>
	<a href="<?php echo e(URL::to('downloadExcel/xlsx')); ?>"><button class="btn btn-success">Download Excel xlsx</button></a>
	<a href="<?php echo e(URL::to('downloadExcel/csv')); ?>"><button class="btn btn-success">Download CSV</button></a>
	
</div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
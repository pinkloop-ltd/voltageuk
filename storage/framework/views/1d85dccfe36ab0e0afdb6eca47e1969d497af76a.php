<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('users.store')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="form-row">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="name" name="name" class="form-control" id="name"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">eMail</label>
                          <input type="email" name="email" class="form-control" id="email"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="initials">Unique Initials</label>
                          <input type="string" name="initials" class="form-control" id="initials"/>
                        </div>
                      </div>

                      <input type="hidden" name="password" value="Password1"/>
                      <input type="submit" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
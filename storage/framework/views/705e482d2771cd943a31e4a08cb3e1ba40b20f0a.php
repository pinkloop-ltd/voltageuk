<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">


                  <div class="form-row">
                    <div class="form-group col-md-6">
                      Edit Job
                    </div>
                    <div class="form-group col-md-6">
                      <?php echo Form::open(['action' => ['JobsController@destroy', $job->id], 'method' => 'POST']); ?>

                      <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                      <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger float-right'])); ?>

                      <?php echo Form::close(); ?>

                    </div>
                  </div>




                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- <form action="[route('jobs.update'), $job->id]" method="post"> -->

                      <?php echo e(Form::open(['action' => ['JobsController@update', $job->id], 'method' => 'POST'])); ?>

                      <?php echo e(Form::hidden('_method', 'PUT')); ?>

                      <?php echo e(csrf_field()); ?>


                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobName">Job Name</label>
                          <input value = "<?php echo e($job->job_name); ?>" type="string" name="job_name" class="form-control" id="jobName"></input>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="jobRef">Job Ref</label>
                          <input value = "<?php echo e($job->job_ref); ?>" type="string" name="job_ref" class="form-control" id="jobRef"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="startDate">Start Date</label>
                          <input value = "<?php echo e($job->start_date); ?>" type="date" name="start_date" class="form-control" id="startDate"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="finishDate">Finish Date</label>
                          <input value = "<?php echo e($job->finish_date); ?>" type="date" name="finish_date" class="form-control" id="finishDate"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="siteAddress">Site Address</label>
                          <textarea value = "<?php echo e($job->site_address); ?>" name="site_address" class="form-control" id="siteAddress"><?php echo e($job->site_address); ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteEngineers">Site Engineers</label>
                            <textarea value = "<?php echo e($job->site_engineers); ?>" name="site_engineers" class="form-control" id="siteEngineers"><?php echo e($job->site_engineers); ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteContact">Site Contact</label>
                            <textarea value = "<?php echo e($job->site_contact); ?>" name="site_contact" class="form-control" id="siteContact"><?php echo e($job->site_contact); ?></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="timeOnSite">Time on Site</label>
                          <input value = "<?php echo e($job->time_on_site); ?>" type="time" name="time_on_site" class="form-control" id="timeOnSite"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="overtime">Overtime</label>
                          <input value = "<?php echo e($job->overtime); ?>" type="time" name="overtime" class="form-control" id="overtime"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="contactPhone">Contact Phone</label>
                          <input value = "<?php echo e($job->contact_phone); ?>" type="text" name="contact_phone" class="form-control" id="contactPhone"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstFixMaterials">1st Fix Materials Used</label>
                          <textarea value = "<?php echo e($job->first_fix_materials); ?>" name="first_fix_materials" class="form-control" id="firstFixMaterials"><?php echo e($job->first_fix_materials); ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="firstFixExtras">1st Fix Extras</label>
                            <textarea value = "<?php echo e($job->first_fix_extras); ?>" name="first_fix_extras" class="form-control" id="firstFixExtras"><?php echo e($job->first_fix_extras); ?></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="remarks">Remarks</label>
                          <textarea value = "<?php echo e($job->remarks); ?>" name="remarks" class="form-control" id="remarks"><?php echo e($job->remarks); ?></textarea>
                        </div>
                      </div>

                      <!-- Office Use Only -->
                      <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="totalInvoiceCost">Total Invoice Cost</label>
                          <input value = "<?php echo e($job->total_invoice_cost); ?>" type="number" name="total_invoice_cost" class="form-control" id="totalInvoiceCost"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="labourSplit">Labour Split</label>
                          <input value = "<?php echo e($job->labour_split); ?>" type="number" name="labour_split" class="form-control" id="labourSplit"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="materialsSplit">Materials Split</label>
                          <input value = "<?php echo e($job->materials_split); ?>" type="number" name="materials_split" class="form-control" id="materialsSplit"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobDescription">Job Description</label>
                          <textarea value = "<?php echo e($job->job_description); ?>" name="job_description" class="form-control" id="jobDescription"><?php echo e($job->job_description); ?></textarea>
                        </div>
                      </div>
                      <?php endif; ?>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="secondFixMaterials">2nd Fix Materials Required</label>
                          <textarea value = "<?php echo e($job->second_fix_materials); ?>" name="second_fix_materials" class="form-control" id="secondFixMaterials"><?php echo e($job->second_fix_materials); ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="secondFixExtras">2nd Fix Extras</label>
                            <textarea value = "<?php echo e($job->second_fix_extras); ?>" name="second_fix_extras" class="form-control" id="secondFixExtras"><?php echo e($job->second_fix_extras); ?></textarea>
                        </div>
                      </div>



                      <input class='btn btn-success' type="submit" value="Save" />
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
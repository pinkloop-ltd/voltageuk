@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Job</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('jobs.store') }}" method="post">
                      {{ csrf_field() }}

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobName">Job Name</label>
                          <input type="string" name="job_name" class="form-control" id="jobName" required /></input>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="jobRef">Job Ref</label>
                          <input type="string" name="job_ref" class="form-control" id="jobRef" required />
                        </div>
                        <div class="form-group col-md-4">
                          <label for="startDate">Start Date</label>
                          <input type="date" name="start_date" class="form-control" id="startDate" required />
                        </div>
                        <div class="form-group col-md-4">
                          <label for="finishDate">Finish Date</label>
                          <input type="date" name="finish_date" class="form-control" id="finishDate" required/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="siteAddress">Site Address</label>
                          <textarea name="site_address" class="form-control" id="siteAddress"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteEngineers">Site Engineers</label>
                            <textarea name="site_engineers" class="form-control" id="siteEngineers"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteContact">Site Contact</label>
                            <textarea name="site_contact" class="form-control" id="siteContact"></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="timeOnSite">Time on Site</label>
                          <input type="time" name="time_on_site" class="form-control" id="timeOnSite"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="overtime">Overtime</label>
                          <input type="time" name="overtime" class="form-control" id="overtime"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="contactPhone">Contact Phone</label>
                          <input type="text" name="contact_phone" class="form-control" id="contactPhone"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstFixMaterials">1st Fix Materials Used</label>
                          <textarea name="first_fix_materials" class="form-control" id="firstFixMaterials"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="firstFixExtras">1st Fix Extras</label>
                            <textarea name="first_fix_extras" class="form-control" id="firstFixExtras"></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="remarks">Remarks</label>
                          <textarea name="remarks" class="form-control" id="remarks"></textarea>
                        </div>
                      </div>

                      <!-- Office Use Only -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="totalInvoiceCost">Total Invoice Cost</label>
                          <input type="number" name="total_invoice_cost" class="form-control" id="totalInvoiceCost"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="labourSplit">Labour Split</label>
                          <input type="number" name="labour_split" class="form-control" id="labourSplit"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="materialsSplit">Materials Split</label>
                          <input type="number" name="materials_split" class="form-control" id="materialsSplit"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobDescription">Job Description</label>
                          <textarea name="job_description" class="form-control" id="jobDescription"></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="secondFixMaterials">2nd Fix Materials Required</label>
                          <textarea name="second_fix_materials" class="form-control" id="secondFixMaterials"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="secondFixExtras">2nd Fix Extras</label>
                            <textarea name="second_fix_extras" class="form-control" id="secondFixExtras"></textarea>
                        </div>
                      </div>



                      <input type="submit" value="Save" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

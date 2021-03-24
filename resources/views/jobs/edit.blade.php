@extends('layouts.app')

@section('content')
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
                      {!! Form::open(['action' => ['JobsController@destroy', $job->id], 'method' => 'POST']) !!}
                      {{ Form::hidden('_method', 'DELETE') }}
                      {{ Form::submit('Delete', ['class' => 'btn btn-danger float-right']) }}
                      {!! Form::close() !!}
                    </div>
                  </div>




                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- <form action="[route('jobs.update'), $job->id]" method="post"> -->

                      {{ Form::open(['action' => ['JobsController@update', $job->id], 'method' => 'POST']) }}
                      {{ Form::hidden('_method', 'PUT') }}
                      {{ csrf_field() }}

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobName">Job Name</label>
                          <input value = "{{ $job->job_name }}" type="string" name="job_name" class="form-control" id="jobName"></input>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="jobRef">Job Ref</label>
                          <input value = "{{ $job->job_ref }}" type="string" name="job_ref" class="form-control" id="jobRef"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="startDate">Start Date</label>
                          <input value = "{{ $job->start_date }}" type="date" name="start_date" class="form-control" id="startDate"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="finishDate">Finish Date</label>
                          <input value = "{{ $job->finish_date }}" type="date" name="finish_date" class="form-control" id="finishDate"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="siteAddress">Site Address</label>
                          <textarea value = "{{ $job->site_address }}" name="site_address" class="form-control" id="siteAddress">{{ $job->site_address }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteEngineers">Site Engineers</label>
                            <textarea value = "{{ $job->site_engineers }}" name="site_engineers" class="form-control" id="siteEngineers">{{ $job->site_engineers }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="siteContact">Site Contact</label>
                            <textarea value = "{{ $job->site_contact }}" name="site_contact" class="form-control" id="siteContact">{{ $job->site_contact }}</textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="timeOnSite">Time on Site</label>
                          <input value = "{{ $job->time_on_site }}" type="time" name="time_on_site" class="form-control" id="timeOnSite"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="overtime">Overtime</label>
                          <input value = "{{ $job->overtime }}" type="time" name="overtime" class="form-control" id="overtime"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="contactPhone">Contact Phone</label>
                          <input value = "{{ $job->contact_phone }}" type="text" name="contact_phone" class="form-control" id="contactPhone"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="firstFixMaterials">1st Fix Materials Used</label>
                          <textarea value = "{{ $job->first_fix_materials }}" name="first_fix_materials" class="form-control" id="firstFixMaterials">{{ $job->first_fix_materials }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="firstFixExtras">1st Fix Extras</label>
                            <textarea value = "{{ $job->first_fix_extras }}" name="first_fix_extras" class="form-control" id="firstFixExtras">{{ $job->first_fix_extras }}</textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="remarks">Remarks</label>
                          <textarea value = "{{ $job->remarks }}" name="remarks" class="form-control" id="remarks">{{ $job->remarks }}</textarea>
                        </div>
                      </div>

                      <!-- Office Use Only -->
                      @hasrole('admin')
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="totalInvoiceCost">Total Invoice Cost</label>
                          <input value = "{{ $job->total_invoice_cost }}" type="number" name="total_invoice_cost" class="form-control" id="totalInvoiceCost"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="labourSplit">Labour Split</label>
                          <input value = "{{ $job->labour_split }}" type="number" name="labour_split" class="form-control" id="labourSplit"/>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="materialsSplit">Materials Split</label>
                          <input value = "{{ $job->materials_split }}" type="number" name="materials_split" class="form-control" id="materialsSplit"/>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="jobDescription">Job Description</label>
                          <textarea value = "{{ $job->job_description }}" name="job_description" class="form-control" id="jobDescription">{{ $job->job_description }}</textarea>
                        </div>
                      </div>
                      @endhasrole

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="secondFixMaterials">2nd Fix Materials Required</label>
                          <textarea value = "{{ $job->second_fix_materials }}" name="second_fix_materials" class="form-control" id="secondFixMaterials">{{ $job->second_fix_materials }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="secondFixExtras">2nd Fix Extras</label>
                            <textarea value = "{{ $job->second_fix_extras }}" name="second_fix_extras" class="form-control" id="secondFixExtras">{{ $job->second_fix_extras }}</textarea>
                        </div>
                      </div>



                      <input class='btn btn-success' type="submit" value="Save" />
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

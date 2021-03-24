<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  protected $fillable = [
  'id',
  'job_name',
  'job_ref',
  'start_date',
  'finish_date',
  'site_address',
  'site_engineers',
  'site_contact',
  'job_ref',
  'time_on_site',
  'overtime',
  'contact_phone',
  'first_fix_materials',
  'first_fix_extras',
  'remarks',
  'total_invoice_cost',
  'labour_split',
  'materials_split',
  'job_description',
  'second_fix_materials',
  'second_fix_extras'
];


}

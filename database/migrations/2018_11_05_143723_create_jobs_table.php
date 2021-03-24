<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('job_name');
          $table->string('job_ref');
          $table->date('start_date');
          $table->date('finish_date');
          $table->text('site_address')->nullable();
          $table->string('site_engineers')->nullable();
          $table->string('site_contact')->nullable();
          $table->date('time_on_site')->nullable();
          $table->date('overtime')->nullable();
          $table->string('contact_phone')->nullable();
          $table->text('first_fix_materials')->nullable();
          $table->text('first_fix_extras')->nullable();
          $table->text('remarks')->nullable();
          $table->decimal('total_invoice_cost')->nullable();
          $table->decimal('labour_split')->nullable();
          $table->decimal('materials_split')->nullable();
          $table->text('job_description')->nullable();
          $table->text('second_fix_materials')->nullable();
          $table->text('second_fix_extras')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

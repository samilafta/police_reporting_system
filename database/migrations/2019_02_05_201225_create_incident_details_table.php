<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('incident_date')->nullable();
            $table->string('incident_time')->nullable();
            $table->string('incident_location')->nullable();
            $table->text('incident_desc')->nullable();
            $table->integer('case_detail_id')->nullable();
//
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
        Schema::dropIfExists('incident_details');
    }
}

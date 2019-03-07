<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainantInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complainant_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_detail_id');
            $table->string('c_full_name')->nullable();
            $table->string('c_age')->nullable();
            $table->string('c_gender')->nullable();
            $table->string('c_occupation')->nullable();
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
        Schema::dropIfExists('complainant_infos');
    }
}

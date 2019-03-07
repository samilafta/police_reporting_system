<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitnessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('witness_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_detail_id');
            $table->string('w_full_name')->nullable();
            $table->string('w_phone_number')->nullable();
//            $table->string('home_address')->nullable();
//            $table->text('witness_story')->nullable();
//            $table->integer('city_id')->nullable();
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
        Schema::dropIfExists('witness_infos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCulpritInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culprit_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cu_full_name')->nullable();
            $table->string('cu_gender')->nullable();
            $table->string('cu_occupation')->nullable();
            $table->string('cu_address')->nullable();
            $table->string('cu_age')->nullable();
            $table->integer('case_detail_id')->nullable();
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
        Schema::dropIfExists('culprit_infos');
    }
}

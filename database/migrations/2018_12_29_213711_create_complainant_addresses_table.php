<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainantAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complainant_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('complainant_info_id');
            $table->integer('case_detail_id');
            $table->string('ca_phone_number')->nullable();
            $table->string('ca_email')->nullable();
            $table->string('ca_home_address')->nullable();
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
        Schema::dropIfExists('complainant_addresses');
    }
}

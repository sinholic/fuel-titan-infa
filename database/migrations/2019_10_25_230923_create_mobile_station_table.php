<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_station', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number_vehicle');
            $table->string('name_vehicle');
            $table->string('fuel_capacity');
            $table->string('induk_station');
            $table->string('fuelman_assignment');
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
        Schema::dropIfExists('mobile_station');
    }
}

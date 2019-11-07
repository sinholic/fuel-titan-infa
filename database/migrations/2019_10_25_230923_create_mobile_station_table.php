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
            $table->bigInteger('fixstation_id');
            $table->string('number_vehicle');
            $table->string('name_vehicle');
            $table->string('fuel_capacity');
            $table->string('fuel_max_reload');
            // $table->string('fuelman_assignment');
            $table->timestamps();
            $table->softDeletes();
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

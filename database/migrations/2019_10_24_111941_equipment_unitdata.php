<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquipmentUnitdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_unitdata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment_number');
            $table->string('equipment_category');
            $table->string('location');
            $table->string('fuel_capacity');
            $table->string('machine_hours');
            $table->string('last_machine_hours');
            $table->string('std_consumption');
            $table->string('last_ending_stock');
            $table->string('add_fuel');
            $table->string('last_maintenance');
            $table->string('pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_unitdata');
    }
}

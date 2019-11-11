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
            $table->string('equipment_name');
            $table->bigInteger('equipment_category');
            $table->string('location');
            $table->string('fuel_capacity');
            $table->bigInteger('pic');
            $table->bigInteger('companycode_id');
            $table->unique(['equipment_number', 'companycode_id']);
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
        Schema::dropIfExists('equipment_unitdata');
    }
}

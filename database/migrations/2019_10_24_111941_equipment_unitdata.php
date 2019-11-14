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
            $table->string('equipment_info');
            $table->bigInteger('equipment_category');
            $table->string('location');
            $table->string('equipment_type');
            $table->string('manufacture_id');
            $table->string('nomor_rangka');
            $table->string('nomor_mesin');
            $table->string('equipment_type');
            $table->enum('status_vehicle', ['Rental', 'Internal']);
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

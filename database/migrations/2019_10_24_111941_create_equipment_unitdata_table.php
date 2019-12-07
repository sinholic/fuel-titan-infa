<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentUnitdataTable extends Migration
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
            $table->bigInteger('companycode_id');
            $table->string('equipment_info');
            $table->enum('status_vehicle', ['Rental', 'Internal']);
            $table->bigInteger('owner_id');
            $table->string('equipment_number');
            $table->string('equipment_number_sap')->nullable();
            $table->string('equipment_name');
            $table->bigInteger('equipment_type');
            $table->bigInteger('equipment_category');
            $table->bigInteger('manufacture_id');
            $table->string('nomor_rangka')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('location');
            $table->string('fuel_capacity');
            $table->integer('master_km')->unsigned()->nullable()->default(0);
            $table->integer('master_hm')->unsigned()->nullable()->default(0);
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

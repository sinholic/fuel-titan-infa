<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fix_station', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_station');
            $table->string('address');
            $table->string('nama_lokasi');
            $table->string('koordinat_gps');
            $table->string('tank_number');
            $table->string('fuel_capacity');
            // $table->string('fuel_assignment');
            // $table->string('last_refuel');
            // $table->string('ending_stock_date');
            // $table->string('ending_stock_quantity');
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
        Schema::dropIfExists('fix_station');
    }
}

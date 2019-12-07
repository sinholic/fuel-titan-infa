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
            $table->bigInteger('equipment_id')->nullable()->default(1);
            $table->boolean('impress_status')->default(false);
            $table->float('fuel_max_reload')->nullable();
            $table->float('stock_capacity')->default(0);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReloadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reloading', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('no_po');
            $table->bigInteger('fixstation_id');
            // Get from MAster station
            $table->bigInteger('equipment_id'); 
            $table->string('driver_mobile_statis');
            $table->integer('qty_solar');
            $table->integer('odometer');
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
        Schema::dropIfExists('reloading');
    }
}

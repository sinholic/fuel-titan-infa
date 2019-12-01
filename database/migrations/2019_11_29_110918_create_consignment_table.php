<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment');
            $table->string('gas_station');
            $table->date('measuring_date');
            $table->timestamps('measuring_time')->nullable();
            $table->string('measuring_position');
            $table->string('fluid_type');
            $table->string('fluid_consumption');
            $table->string('hourmeter');
            $table->string('odometer');
            $table->string('ss');
            $table->string('vendor');
            $table->string('reported_by');
            $table->string('received_by');
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
        Schema::dropIfExists('consignment');
    }
}

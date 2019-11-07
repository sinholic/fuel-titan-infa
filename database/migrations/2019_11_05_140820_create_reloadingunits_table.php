<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReloadingunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reloadingunits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('equipment_id');
            $table->enum('origin', ['Not set', 'Mobile', 'Fix Station'])->default('Not set');
            $table->integer('odometer')->nullable();
            $table->integer('machinehours')->nullable();
            $table->float('qty')->default(0);
            $table->float('ending_stock')->default(0);
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
        Schema::dropIfExists('reloadingunits');
    }
}

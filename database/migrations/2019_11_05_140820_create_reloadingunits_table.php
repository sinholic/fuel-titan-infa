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
            $table->enum('origin', ['Not set', 'Mobile', 'Fix Station'])->default('Not set');
            $table->bigInteger('station_id')->default(1);
            $table->bigInteger('equipment_id');
            $table->integer('odometer')->nullable();
            $table->integer('machinehours')->nullable();
            $table->float('qty')->default(0);
            $table->float('ending_stock')->default(0);
            $table->string('equipmentuser')->nullable()->default("Not set");
            $table->bigInteger('loginuser_id')->nullable()->default(1);
            $table->boolean('adjustment')->nullable()->default(false);
            $table->longText('remark')->nullable();
            $table->longText('remark2')->nullable();
            $table->longText('remark3')->nullable();
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

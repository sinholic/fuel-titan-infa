<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengisianMobileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengisian_mobile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_equipment');
            $table->string('id_driver');
            $table->enum('qty_solar', ['5 ltr', '10 ltr', '15 ltr', '20 ltr']);
            $table->integer('odometer');
            $table->string('remark');
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
        Schema::dropIfExists('pengisian_mobile');
    }
}

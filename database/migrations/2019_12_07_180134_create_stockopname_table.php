<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockopnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockopname', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("companycode_id");
            $table->bigInteger("fixstation_id");
            $table->float('qty')->nullable()->default(0);
            $table->date('tanggal_pengukuran')->nullable()->default(now());
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
        Schema::dropIfExists('stockopname');
    }
}

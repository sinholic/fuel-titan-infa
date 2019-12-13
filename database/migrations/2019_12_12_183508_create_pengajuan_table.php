<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['H', 'P'])->nullable();
            $table->string('no_pengajuan');
            $table->bigInteger('supcompanycode_id');
            $table->bigInteger('fixstation_id');
            $table->date('taking_date');
            $table->float('qty');
            $table->string('remark');
            $table->bigInteger('borcompanycode_id');
            $table->boolean('approved')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}

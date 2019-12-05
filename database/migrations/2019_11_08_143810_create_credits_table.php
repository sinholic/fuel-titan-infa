<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_hutang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->bigInteger('supcompanycode_id');
            $table->bigInteger('fixstation_id');
            $table->date('taking_date');
            $table->float('qty');
            $table->string('remark');
            $table->string('peminjam');
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
        Schema::dropIfExists('pengajuan_hutang');
    }
}

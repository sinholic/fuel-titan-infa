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
            $table->string('supplier');
            $table->string('qty');
            $table->string('remark');
            $table->string('no_spk');
            $table->string('peminjam');
            $table->boolean('approved');
            $table->boolean('not_approved');
            $table->string('stockopname');
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

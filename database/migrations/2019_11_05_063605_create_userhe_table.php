<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userhe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe_alat');
            $table->string('no_alat');
            $table->date('tanggal_operasi');
            $table->string('nama_unit');
            $table->string('penyewa');
            $table->integer('hm_awal');
            $table->integer('hm_akhir');
            $table->integer('total_jam');
            $table->string('job_order');
            $table->string('bbm');
            $table->string('operator');
            $table->string('helper');
            $table->string('pengawas');
            $table->integer('km_awal');
            $table->integer('km_akhir');
            $table->integer('km_total');
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
        Schema::dropIfExists('userhe');
    }
}

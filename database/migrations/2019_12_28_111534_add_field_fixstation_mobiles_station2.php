<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldFixstationMobilesStation2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('inventori', function($table) {
            // $table->bigIncrements('id');
            // $table->string('kode_barang');
            $table->integer('fix_id');
            $table->integer('mobile_id');
            // $table->string('saldo_awal');
            // $table->string('barang_in');
            // $table->string('barang_out');
            // $table->string('saldo_akhir');
            // $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('inventori', function($table) {
            // $table->dropColumn('id');
            $table->dropColumn('kode_barang');
            $table->dropColumn('saldo_awal');
            $table->dropColumn('barang_in');
            $table->dropColumn('barang_out');
            $table->dropColumn('saldo_akhir');
            $table->dropColumn();
        });
    }
}

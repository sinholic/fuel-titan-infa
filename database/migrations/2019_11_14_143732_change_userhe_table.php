<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userhe', function (Blueprint $table) {
            $table->integer('hm_awal')->nullable()->change();
            $table->integer('hm_akhir')->nullable()->change();
            $table->integer('total_jam')->nullable()->change();
            $table->integer('km_awal')->nullable()->change();
            $table->integer('km_akhir')->nullable()->change();
            $table->integer('km_total')->nullable()->change();
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
    }
}

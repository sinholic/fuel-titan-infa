<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToCodevouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchercodes', function (Blueprint $table) {
            $table->bigInteger('voucher_id');
            $table->string('code_number');
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
        Schema::table('vouchercodes', function (Blueprint $table) {
            $table->dropColumn('voucher_id', 'code_number');
            $table->dropSoftDeletes();
        });
    }
}

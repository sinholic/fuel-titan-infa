<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchercodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchercodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('voucher_id');
            $table->string('code_number')->unique();
            $table->string('serial_number')->unique();
            $table->boolean('used');
            $table->boolean('rejected');
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
        Schema::dropIfExists('vouchercodes');
    }
}

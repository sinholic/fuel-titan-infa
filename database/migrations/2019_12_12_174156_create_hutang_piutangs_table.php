<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hutang_piutangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pengajuan_id');
            $table->float('qty')->nullable()->default(0);
            $table->date('transaction_date');
            $table->enum('type', ['H', 'P'])->nullable();
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
        Schema::dropIfExists('hutang_piutangs');
    }
}

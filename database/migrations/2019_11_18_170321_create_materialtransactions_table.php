<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialtransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialtransactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('material_id')->nullable()->default(1);
            $table->bigInteger('transaction_id')->nullable()->default(1);
            $table->string('transaction_code', 100)->nullable()->default('01');
            $table->float('qty')->unsigned()->nullable()->default(0);
            $table->enum('transaction_type', ['In', 'Out', 'Consignment'])->nullable()->default('In');
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
        Schema::dropIfExists('materialtransactions');
    }
}

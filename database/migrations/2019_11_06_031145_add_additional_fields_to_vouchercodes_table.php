<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToVouchercodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchercodes', function (Blueprint $table) {
            $table->string('running_number')->after('code_number');
            $table->boolean('rejected')->after('running_number');

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
            $table->dropColumn(['running_number', 'rejected']);
        });
    }
}

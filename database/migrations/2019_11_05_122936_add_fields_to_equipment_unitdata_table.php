<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEquipmentUnitdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_unitdata', function (Blueprint $table) {
            $table->bigInteger('equipment_category');
            $table->bigInteger('pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment_unitdata', function (Blueprint $table) {
            $table->dropColumn('equipment_category');
            $table->dropColumn('pic');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEquipmentsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipment_unitdata', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->bigInteger('equipment_category')->change();
            $table->dropColumn('machine_hours');
            $table->dropColumn('last_machine_hours');
            $table->dropColumn('std_consumption');
            $table->dropColumn('last_ending_stock');
            $table->dropColumn('add_fuel');
            $table->dropColumn('last_maintenance');
            $table->bigInteger('pic')->change();
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
            $table->collation = 'utf8_unicode_ci';
            $table->string('equipment_category')->change();
            $table->string('machine_hours');
            $table->string('last_machine_hours');
            $table->string('std_consumption');
            $table->string('last_ending_stock');
            $table->string('add_fuel');
            $table->string('last_maintenance');
            $table->string('pic')->change();
        });
    }
}

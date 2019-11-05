<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owner', function (Blueprint $table) {
            $table->enum('owner_category', ['internal', 'external'])->after('address');
            $table->string('pic')->after('owner_category');
            $table->string('phone')->after('owner_category');
            $table->string('email')->after('phone');
            $table->dropColumn('jenis_unit');
            $table->dropColumn('unit_number');
            $table->dropColumn('unit_category');
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
            $table->dropColumn('owner_category');
            $table->dropColumn('pic');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->string('jenis_unit');
            $table->string('unit_number');
            $table->string('unit_category');
        });
    }
}

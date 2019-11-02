<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOrderVouchercodesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE vouchercodes MODIFY COLUMN voucher_id bigint AFTER id");
        DB::statement("ALTER TABLE vouchercodes MODIFY COLUMN code_number varchar(191) AFTER voucher_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE vouchercodes MODIFY COLUMN voucher_id bigint AFTER updated_at");
        DB::statement("ALTER TABLE vouchercodes MODIFY COLUMN code_number varchar(191) AFTER voucher_id");
    }
}

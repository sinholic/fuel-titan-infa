<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_good_issue_on_fix');
        DB::unprepared("CREATE TRIGGER tr_good_issue_on_fix AFTER INSERT ON reloadingunits FOR EACH ROW
            BEGIN
                INSERT INTO materialtransactions (material_id, transaction_id, transaction_code, qty, transaction_type, created_at, updated_at) VALUES (1, NEW.id, '01', NEW.qty, 'Out', NOW(),NOW())
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_good_issue_on_fix');
    }
}

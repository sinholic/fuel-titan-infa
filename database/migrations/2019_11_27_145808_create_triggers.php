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
        DB::unprepared("CREATE TRIGGER tr_good_issue_on_fix AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) VALUES (1, NEW.id, '01', NEW.qty, 'In', NOW(),NOW())
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
        DB::unprepared('DROP TRIGGER IF EXISTS `tr_User_Default_Member_Role`');
    }
}

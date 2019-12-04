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
        DB::unprepared('DROP TRIGGER IF EXISTS tr_goodissue');
        DB::unprepared("CREATE TRIGGER tr_goodissue AFTER INSERT ON reloadingunits FOR EACH ROW
            BEGIN 
                IF new.origin='Mobile' THEN 
                    INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) VALUES (1, NEW.id, '01', NEW.qty, 'Out', NOW(),NOW()); 
                elseif new.origin='Fix Station' THEN
                    INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) VALUES (1, NEW.id, '02', NEW.qty, 'Out', NOW(),NOW());
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_goodissue');
    }
}
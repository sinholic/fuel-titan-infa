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
        // Pengeluaran solar untuk pengisian ulang equipment Fix/Mobile Station
        DB::unprepared('DROP TRIGGER IF EXISTS tr_goodissue');
        DB::unprepared("CREATE TRIGGER tr_goodissue AFTER INSERT ON reloadingunits FOR EACH ROW
            BEGIN 
                UPDATE equipment_unitdata SET master_km = NEW.odometer, master_hm = NEW.machinehours WHERE equipment_unitdata.id = NEW.equipment_id;
                IF new.origin='Mobile' THEN 
                    -- Material Transactions 01
                    INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                    VALUES (1, NEW.id, '01', NEW.qty, 'Out', NOW(),NOW()); 
                    -- For Impress Transactions
                    INSERT INTO impresstransactions (`station_id`, `equipment_id`, `qty`, created_at, updated_at) 
                    VALUES (NEW.station_id, NEW.equipment_id, NEW.qty, NOW(), NOW());
                    -- Update stock capacity for suggestion
                    UPDATE mobile_station 
                    SET stock_capacity = stock_capacity - NEW.qty, updated_at = NOW() 
                    WHERE mobile_station.id = NEW.station_id;
                ELSEIF new.origin='Fix Station' THEN
                    -- Material Transactions 02
                    INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                    VALUES (1, NEW.id, '02', NEW.qty, 'Out', NOW(),NOW());
                END IF;
            END;
        ");

        // Pengeluaran solar untuk Timesheet User HE
        DB::unprepared('DROP TRIGGER IF EXISTS tr_timesheetHE');
        DB::unprepared("CREATE TRIGGER tr_timesheetHE AFTER INSERT ON userhe FOR EACH ROW
            BEGIN
                -- Material Transactions 03
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '03', NEW.qty, 'Out', NOW(),NOW()); 
            END;
        ");

        // Pengeluaran solar untuk pengisian ulang mobile station
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengisian_ulang_ms');
        DB::unprepared("CREATE TRIGGER tr_pengisian_ulang_ms AFTER INSERT ON reloading FOR EACH ROW
            BEGIN
                -- Update stock capacity for suggestion
                UPDATE mobile_station 
                SET stock_capacity = mobile_station.stock_capacity + NEW.qty_solar, updated_at = NOW() 
                WHERE mobile_station.id = NEW.mobilestation_id;
                
                -- Material Transactions 04
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '04', NEW.qty_solar, 'Out', NOW(),NOW()); 
            END;
        ");

        // Penerimaan solar dari PO
        DB::unprepared('DROP TRIGGER IF EXISTS tr_penerimaan_solar');
        DB::unprepared("CREATE TRIGGER tr_penerimaan_solar AFTER INSERT ON penerimaan FOR EACH ROW
            BEGIN
                -- Material Transactions 05
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '05', NEW.qty, 'In', NOW(),NOW()); 
            END;
        ");

        // Penerimaan solar dari Piutang
        DB::unprepared('DROP TRIGGER IF EXISTS tr_penerimaan_piutang');
        DB::unprepared("CREATE TRIGGER tr_penerimaan_piutang AFTER INSERT ON piutang FOR EACH ROW
            BEGIN
                -- Material Transactions 06
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '06', NEW.qty_piutang, 'In', NOW(),NOW()); 
            END;
        ");

        // Penerimaan solar dari pengambilan hutang solar
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengambilan_hutang');
        DB::unprepared("CREATE TRIGGER tr_pengambilan_hutang AFTER INSERT ON pengambilan FOR EACH ROW
            BEGIN
                -- Material Transactions 06
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '07', NEW.qty, 'In', NOW(),NOW()); 
            END;
        ");

        // Pengeluaran solar dari pengembalian hutang solar
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengembalian_hutang');
        DB::unprepared("CREATE TRIGGER tr_pengembalian_hutang AFTER INSERT ON pengembalian FOR EACH ROW
            BEGIN
                -- Material Transactions 08
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '08', NEW.qty, 'Out', NOW(),NOW()); 
            END;
        ");

        // Consignment solar dari consignments solar
        DB::unprepared('DROP TRIGGER IF EXISTS tr_consignment');
        DB::unprepared("CREATE TRIGGER tr_consignment AFTER INSERT ON consignments FOR EACH ROW
            BEGIN
                -- Material Transactions 09
                INSERT INTO materialtransactions (`material_id`, `transaction_id`, `transaction_code`, `qty`, `transaction_type`, created_at, updated_at) 
                VALUES (1, NEW.id, '09', NEW.qty, 'Consignment', NOW(),NOW()); 
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
        DB::unprepared('DROP TRIGGER IF EXISTS tr_timesheetHE');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengisian_ulang_ms');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_penerimaan_solar');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_penerimaan_piutang');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengambilan_hutang');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pengembalian_hutang');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_consignment');
    }
}
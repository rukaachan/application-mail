<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $trgName = 'trgSuratDelete';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER DELETE ON surat
            FOR EACH ROW
            BEGIN
                DECLARE userid VARCHAR(200);
                SELECT username INTO userid FROM tbl_user WHERE id_user = OLD.id_user;

                INSERT INTO logs (logs) VALUES (CONCAT(userid, ": Melakukan Hapus Surat Dengan Nomor ", OLD.id_surat));
            END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DROP Trigger on Rollback
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName); //
    }
};

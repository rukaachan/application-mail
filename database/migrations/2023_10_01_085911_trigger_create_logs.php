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
    protected $trgName = 'trgSuratInsert';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER INSERT ON surat
    FOR EACH ROW
    BEGIN
        DECLARE surat_id INT;
        DECLARE userid VARCHAR(200);

        SELECT username INTO userid FROM tbl_user WHERE id_user = NEW.id_user;
        
        SELECT id_surat INTO surat_id FROM surat WHERE id_surat = NEW.id_surat;
        INSERT INTO logs (logs) VALUES (CONCAT("Surat telah ditambahkan dengan id: ", surat_id, ". Oleh ", userid));
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

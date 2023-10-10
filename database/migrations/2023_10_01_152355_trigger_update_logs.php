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
    protected $trgName = 'trgSuratUpdate';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER UPDATE ON surat
    FOR EACH ROW
    BEGIN
        DECLARE surat_id INT;
        DECLARE perubahan VARCHAR(255);
        
        -- Ambil ID surat yang diupdate
        SELECT id_surat INTO surat_id
        FROM surat
        WHERE id_surat = NEW.id_surat;
        
        -- Inisialisasi pesan log
        SET @message = CONCAT("Surat dengan id: ", surat_id, " telah diupdate. Perubahan:");

        -- Inisialisasi pesan userId
        SET @pesan = CONCAT(". Oleh user: ", (SELECT username FROM tbl_user WHERE id_user = OLD.id_user));
        
        -- Periksa perubahan pada jenis_surat
        IF OLD.id_jenis_surat != NEW.id_jenis_surat THEN
            SET perubahan = CONCAT("jenis surat dari ", (SELECT jenis_surat FROM jenis_surat WHERE id_jenis_surat = OLD.id_jenis_surat), " ke ", (SELECT jenis_surat FROM jenis_surat WHERE id_jenis_surat = NEW.id_jenis_surat));
            SET @message = CONCAT(@message, " ", perubahan, @pesan);
        END IF;
        
        -- Periksa perubahan pada tanggal_surat
        IF OLD.tanggal_surat != NEW.tanggal_surat THEN
            SET @message = CONCAT(@message, " tanggal surat dari ", OLD.tanggal_surat, " ke ", NEW.tanggal_surat, @pesan);
        END IF;
        
        -- Periksa perubahan pada ringkasan
        IF OLD.ringkasan != NEW.ringkasan THEN
            SET @message = CONCAT(@message, " ringkasan dari ", OLD.ringkasan, " ke ", NEW.ringkasan, @pesan);
        END IF;
        
        -- Periksa perubahan pada file
        IF OLD.file != NEW.file THEN
            SET @message = CONCAT(@message, " file ", @pesan);
        END IF;
        
        -- Insert pesan log ke dalam tabel logs
        INSERT INTO logs (logs) VALUES (@message);
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

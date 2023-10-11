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
        DECLARE update_message TEXT;  -- Store the update message separately
        
        -- Ambil ID surat yang diupdate
        SELECT id_surat INTO surat_id FROM surat WHERE id_surat = NEW.id_surat;

        -- Inisialisasi pesan log
        SET update_message = CONCAT("Surat dengan nomor id: ", surat_id, " telah diupdate. Perubahan:");

        -- Periksa perubahan pada jenis_surat
        IF OLD.id_jenis_surat != NEW.id_jenis_surat THEN
            SET perubahan = CONCAT("jenis surat dari ", (SELECT jenis_surat FROM jenis_surat WHERE id_jenis_surat = OLD.id_jenis_surat), " ke ", (SELECT jenis_surat FROM jenis_surat WHERE id_jenis_surat = NEW.id_jenis_surat));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;
        
        -- Periksa perubahan pada tanggal_surat
        IF OLD.tanggal_surat != NEW.tanggal_surat THEN
            SET update_message = CONCAT(update_message, " tanggal surat dari ", OLD.tanggal_surat, " ke ", NEW.tanggal_surat);
        END IF;
        
        -- Periksa perubahan pada ringkasan
        IF OLD.ringkasan != NEW.ringkasan THEN
            SET update_message = CONCAT(update_message, " ringkasan dari ", OLD.ringkasan, " ke ", NEW.ringkasan);
        END IF;
        
        -- Periksa perubahan pada file
        IF OLD.file != NEW.file THEN
            SET update_message = CONCAT(update_message, " file");
        END IF;
        
        -- Add user information to the end of the message
        SET update_message = CONCAT(update_message, " Oleh: ", (SELECT username FROM tbl_user WHERE id_user = OLD.id_user));

        -- Insert pesan log ke dalam tabel logs
        INSERT INTO logs (logs) VALUES (update_message);
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

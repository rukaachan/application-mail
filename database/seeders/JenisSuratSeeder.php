<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisData = [
            ['jenis_surat' => 'DINAS'],
            ['jenis_surat' => 'RESMI'],
            ['jenis_surat' => 'SOSIAL'],
            ['jenis_surat' => 'NIAGA'],
        ];

        foreach ($jenisData as $data) {
            JenisSurat::create($data);
        }
    }
}

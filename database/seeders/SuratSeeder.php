<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surat = new Surat();
        $surat->truncate();

        $data = [
            [
                'nama_surat' => 'SKU',
                'format_no_surat' => 'SKU',
                'masa_berlaku' => 365
            ],
            [
                'nama_surat' => 'DOMISILI',
                'format_no_surat' => 'DOMISILI',
                'masa_berlaku' => 365
            ],
            [
                'nama_surat' => 'KELAHIRAN',
                'format_no_surat' => 'KELAHIRAN',
                'masa_berlaku' => 365
            ],
            [
                'nama_surat' => 'KEMATIAN',
                'format_no_surat' => 'KEMATIAN',
                'masa_berlaku' => 365
            ],
            [
                'nama_surat' => 'PINDAH DATANG WNI',
                'format_no_surat' => 'PDW',
                'masa_berlaku' => 365
            ],
        ];

        foreach ($data as $key => $value) {
            $surat->create($value);
        }
    }
}

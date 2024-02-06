<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailSurat;

class DetailSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailSurat = new DetailSurat;

        $detailSurat->truncate();

        $data = [
            [
                'surat_id' => 1,
                'nama_kolom' => 'Bidang Usaha',
            ],
            [
                'surat_id' => 1,
                'nama_kolom' => 'Lama Usaha',
            ],
            [
                'surat_id' => 1,
                'nama_kolom' => 'Alamat Usaha',
            ],
            [
                'surat_id' => 1,
                'nama_kolom' => 'Tujuan',
            ],
        ];

        foreach($data as $value){
            $detailSurat->create($value);
        }
    }
}

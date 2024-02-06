<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Desa;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desa = new Desa;

        $desa->truncate();

        $data = [
            'nama_desa' => 'Susukan',
            'nama_kecamatan' => 'Campaka',
            'nama_kabupaten' => 'Cianjur',
            'email' => 'desasusukan15@gmail.com',
            'kontak' => 'desasusukan15@gmail.com',
            'alamat' => 'Jl. Cisaladra No.85 Km.2 Susukan-Campaka',
            'nama_kepala_desa' => 'Anis',
            'nip' => 123456789011121314
        ];

        $desa->create($data);
    }
}

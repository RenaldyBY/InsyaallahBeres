<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use Faker\Factory as faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penduduk = new Penduduk;

        $penduduk->truncate();
        $fake = faker::create('id_ID');

        for($i = 0; $i < 500; $i++){
            $penduduk->create([
                'nama' => $fake->name,
                'nik' => rand(0000000000000000, 9999999999999999),
                'kk' => rand(0000000000000000, 9999999999999999),
                'jk' => $fake->randomElement([0,1]),
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => $fake->date(),
                'rt' => $fake->randomElement([1,2,3,4,5,6,7]),
                'rw' => $fake->randomElement([1,2,3,4,5,6,7]),
                'agama' => $fake->randomElement(['Islam','Kristen','Budha','Hindu']),
                'status_perkawinan' => $fake->randomElement([0,1]),
                'pekerjaan' => $fake->jobTitle(),
                'alamat' =>  $fake->address(),
                'pendidikan' => $fake->randomElement(['SMA', 'SMP', 'SD', 'S1']),
                'kewarganegaraan' => 'Indonesia',
                'desa_id' => 1 
            ]);
        }
    }
}

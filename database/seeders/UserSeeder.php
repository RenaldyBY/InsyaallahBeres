<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Penduduk;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $penduduk = Penduduk::inRandomOrder()->first();
        $user->truncate();
        
        $data = [
            [
                'username' => 'kades@susukan',
                'password' => bcrypt(12345678),
                'role_id' => 1,
                'email' => 'kades@susukan'
            ],
            [
                'username' => 'admin@susukan',
                'password' => bcrypt(12345678),
                'role_id' => 2,
                'email' => 'admin@susukan'
            ],
            [
                'username' => $penduduk->nik,
                'password' => bcrypt(12345678),
                'role_id' => 3,
                'email' => 'sutarjo@mail.com',
                'penduduk_id' => $penduduk->id
            ],
        ];

        foreach ($data as $key => $value) {
            $user->create($value);
        }
    }
}

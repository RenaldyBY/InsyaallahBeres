<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role;
        $role->truncate();
        $data = [
            [
                'nama_role' => 'kades',
            ],
            [
                'nama_role' => 'admin',
            ],
            [
                'nama_role' => 'penduduk'
            ]
        ];
        foreach($data as $value){
            $role->create($value);
        }

    }
}

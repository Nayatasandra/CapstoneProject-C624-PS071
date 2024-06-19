<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Affanul Hakim',
                'alamat' => 'Jakarta, Indonesia',
                'email' => 'affanul@gmail.com',
                'telp' => '0855123123123',
                'gambar' => 'default.jpg'
            ]
        ];

        $this->db->table('profile')->insertBatch($data);
    }
}

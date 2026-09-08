<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user_id' => 1, 'name' => 'Budi Santoso'],
            ['user_id' => 2, 'name' => 'Siti Aminah'],
            ['user_id' => 3, 'name' => 'Andi Darmawan'],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
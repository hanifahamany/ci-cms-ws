<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'transaction_id' => 1, 
                'user_id' => 1,         // Budi Santoso
                'product_id' => 1,      // Laptop ASUS ROG
                'payment_method' => 'Credit Card', 
                'qty' => 1
            ],
            [
                'transaction_id' => 2, 
                'user_id' => 2,         // Siti Aminah
                'product_id' => 3,      // Keyboard Mechanical
                'payment_method' => 'Bank Transfer', 
                'qty' => 2
            ],
            [
                'transaction_id' => 3, 
                'user_id' => 1,         // Budi Santoso
                'product_id' => 2,      // Mouse Wireless
                'payment_method' => 'E-Wallet', 
                'qty' => 1
            ],
        ];

        $this->db->table('transactions')->insertBatch($data);
    }
}
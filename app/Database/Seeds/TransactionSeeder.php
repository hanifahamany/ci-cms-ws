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
                'user_id' => 1,         
                'product_id' => 1,      
                'payment_method' => 'Credit Card', 
                'qty' => 1
            ],
            [
                'transaction_id' => 2, 
                'user_id' => 2,         
                'product_id' => 3,      
                'payment_method' => 'Bank Transfer', 
                'qty' => 2
            ],
            [
                'transaction_id' => 3, 
                'user_id' => 1,         
                'product_id' => 2,      
                'payment_method' => 'E-Wallet', 
                'qty' => 1
            ],
        ];

        $this->db->table('transactions')->insertBatch($data);
    }
}
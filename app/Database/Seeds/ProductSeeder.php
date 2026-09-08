<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['product_id' => 1, 'product_name' => 'Laptop ASUS ROG', 'qty_in_stock' => 15, 'price' => 15000000.00],
            ['product_id' => 2, 'product_name' => 'Mouse Wireless Logitech', 'qty_in_stock' => 50, 'price' => 250000.00],
            ['product_id' => 3, 'product_name' => 'Keyboard Mechanical', 'qty_in_stock' => 30, 'price' => 1200000.00],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
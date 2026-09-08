<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchases extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'product_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
        ]);
        $this->forge->addKey('transaction_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}

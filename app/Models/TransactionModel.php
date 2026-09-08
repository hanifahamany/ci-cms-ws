<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'transaction_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields   = ['transaction_id', 'user_id', 'product_id', 'payment_method', 'qty'];
    protected $useTimestamps    = false;

    public function getTransactionsWithDetails()
    {
        return $this->select('transactions.*, users.name as user_name, products.product_name, products.price')
            ->join('users', 'users.user_id = transactions.user_id')
            ->join('products', 'products.product_id = transactions.product_id')
            ->orderBy('transactions.transaction_id', 'DESC')
            ->findAll();
    }
}

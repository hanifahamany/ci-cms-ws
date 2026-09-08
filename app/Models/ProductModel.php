<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['product_id', 'product_name', 'qty_in_stock', 'price'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'product_id'    => 'permit_empty|integer',
        'product_name'  => 'required|min_length[3]|max_length[255]',
        'price'         => 'required|numeric',
        'qty_in_stock'  => 'required|integer|greater_than_equal_to[0]',
    ];
}

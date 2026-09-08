<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class Purchases extends BaseController
{
    protected $transactionModel;
    protected $productModel;
    protected $userModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->productModel     = new ProductModel();
        $this->userModel        = new UserModel();
    }

    public function index()
    {
        return view('purchases/index', [
            'transactions' => $this->transactionModel->getTransactionsWithDetails(),
        ]);
    }

    public function create()
    {
        return view('purchases/create', [
            'products' => $this->productModel->where('qty_in_stock >', 0)->findAll(),
            'users'    => $this->userModel->findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'user_id'        => 'required|integer',
            'product_id'     => 'required|integer',
            'payment_method' => 'required|max_length[100]',
            'qty'            => 'required|integer|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $product = $this->productModel->find($this->request->getPost('product_id'));
        $user    = $this->userModel->find($this->request->getPost('user_id'));
        $qty     = (int) $this->request->getPost('qty');

        if (! $product || ! $user) {
            return redirect()->back()->withInput()->with('error', 'User atau produk tidak ditemukan.');
        }

        if ($qty > $product['qty_in_stock']) {
            return redirect()->back()->withInput()->with('error', 'Stok tidak mencukupi. Sisa stok: ' . $product['qty_in_stock']);
        }

        $maxId = $this->transactionModel->selectMax('transaction_id')->first();
        $transactionId = (int) ($maxId['transaction_id'] ?? 0) + 1;

        $this->transactionModel->insert([
            'transaction_id' => $transactionId,
            'user_id'        => $user['user_id'],
            'product_id'     => $product['product_id'],
            'payment_method' => $this->request->getPost('payment_method'),
            'qty'            => $qty,
        ]);

        $this->productModel->update($product['product_id'], [
            'qty_in_stock' => $product['qty_in_stock'] - $qty,
        ]);

        return redirect()->to('/purchases')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function edit($id)
    {
        $transaction = $this->transactionModel->find($id);

        if (! $transaction) {
            return redirect()->to('/purchases')->with('error', 'Transaksi tidak ditemukan.');
        }

        return view('purchases/edit', [
            'transaction' => $transaction,
            'product'     => $this->productModel->find($transaction['product_id']),
            'users'       => $this->userModel->findAll(),
        ]);
    }

    public function update($id)
    {
        $rules = [
            'user_id'        => 'required|integer',
            'payment_method' => 'required|max_length[100]',
            'qty'            => 'required|integer|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $transaction = $this->transactionModel->find($id);
        $product     = $transaction ? $this->productModel->find($transaction['product_id']) : null;
        $user        = $this->userModel->find($this->request->getPost('user_id'));

        if (! $transaction || ! $product || ! $user) {
            return redirect()->to('/purchases')->with('error', 'Data transaksi tidak ditemukan.');
        }

        $newQty = (int) $this->request->getPost('qty');
        $diff   = $newQty - $transaction['qty'];

        if ($diff > $product['qty_in_stock']) {
            return redirect()->back()->withInput()->with('error', 'Stok tidak mencukupi untuk perubahan jumlah ini.');
        }

        $this->productModel->update($product['product_id'], [
            'qty_in_stock' => $product['qty_in_stock'] - $diff,
        ]);
        $this->transactionModel->update($id, [
            'user_id'        => $user['user_id'],
            'payment_method' => $this->request->getPost('payment_method'),
            'qty'            => $newQty,
        ]);

        return redirect()->to('/purchases')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $transaction = $this->transactionModel->find($id);

        if ($transaction) {
            $product = $this->productModel->find($transaction['product_id']);
            if ($product) {
                $this->productModel->update($product['product_id'], [
                    'qty_in_stock' => $product['qty_in_stock'] + $transaction['qty'],
                ]);
            }
            $this->transactionModel->delete($id);
        }

        return redirect()->to('/purchases')->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan.');
    }
}

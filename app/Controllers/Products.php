<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // READ (list semua produk)
    public function index()
    {
        $data['products'] = $this->productModel->orderBy('product_id', 'DESC')->findAll();
        return view('products/index', $data);
    }

    // CREATE (form tambah)
    public function create()
    {
        return view('products/create');
    }

    // CREATE (proses simpan)
    public function store()
    {
        $rules = [
            'product_id'   => 'required|integer',
            'product_name' => 'required|min_length[3]|max_length[255]',
            'price'        => 'required|numeric',
            'qty_in_stock' => 'required|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->save([
            'product_id'   => $this->request->getPost('product_id'),
            'product_name' => $this->request->getPost('product_name'),
            'price'        => $this->request->getPost('price'),
            'qty_in_stock' => $this->request->getPost('qty_in_stock'),
        ]);

        return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    // UPDATE (form edit)
    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);

        if (! $data['product']) {
            return redirect()->to('/products')->with('error', 'Produk tidak ditemukan.');
        }

        return view('products/edit', $data);
    }

    // UPDATE (proses simpan perubahan)
    public function update($id)
    {
        $rules = [
            'product_name' => 'required|min_length[3]|max_length[255]',
            'price'        => 'required|numeric',
            'qty_in_stock' => 'required|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->update($id, [
            'product_name' => $this->request->getPost('product_name'),
            'price'        => $this->request->getPost('price'),
            'qty_in_stock' => $this->request->getPost('qty_in_stock'),
        ]);

        return redirect()->to('/products')->with('success', 'Produk berhasil diperbarui.');
    }

    // DELETE
    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products')->with('success', 'Produk berhasil dihapus.');
    }
}

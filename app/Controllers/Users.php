<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // READ (list semua user)
    public function index()
    {
        $data['users'] = $this->userModel->orderBy('user_id', 'ASC')->findAll();
        return view('users/index', $data);
    }

    // CREATE (form tambah)
    public function create()
    {
        return view('users/create');
    }

    // CREATE (proses simpan)
    public function store()
    {
        $rules = [
            'user_id' => 'required|integer',
            'name'    => 'required|min_length[3]|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->save([
            'user_id' => $this->request->getPost('user_id'),
            'name'    => $this->request->getPost('name'),
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan.');
    }

    // UPDATE (form edit)
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);

        if (! $data['user']) {
            return redirect()->to('/users')->with('error', 'User tidak ditemukan.');
        }

        return view('users/edit', $data);
    }

    // UPDATE (proses simpan perubahan)
    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->update($id, [
            'name' => $this->request->getPost('name'),
        ]);

        return redirect()->to('/users')->with('success', 'User berhasil diperbarui.');
    }

    // DELETE
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('success', 'User berhasil dihapus.');
    }
}

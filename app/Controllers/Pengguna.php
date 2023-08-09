<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Pengguna extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $getAllUser = $this->db->table('users')
            ->select('users.*, auth_groups.name as role')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id', 'left')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id', 'left')
            ->get();

        $data = [
            'title' => 'Data Pengguna',
            'users' => $getAllUser->getResultArray()
        ];

        return view('pages/user/index', $data);
    }

    public function edit($id)
    {
        $getUserById = $this->db->table('users')
            ->select('users.*, auth_groups.name as role')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id', 'left')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id', 'left')
            ->where('users.id', $id)
            ->get();

        $getRole = $this->db->table('auth_groups')->get();

        $data = [
            'title' => 'Detail Pengguna',
            'user' => $getUserById->getRowArray(),
            'role' => $getRole->getResultArray()
        ];

        return view('pages/user/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $dataUser = [
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
        ];

        $dataRole = [
            'group_id' => $this->request->getVar('role'),
        ];

        $this->db->table('users')->where('id', $id)->update($dataUser);
        $this->db->table('auth_groups_users')->where('user_id', $id)->update($dataRole);

        session()->setFlashdata('berhasil', 'Data pengguna berhasil diperbarui');
        return redirect()->to('data-pengguna');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');

        $this->db->table('users')->where('id', $id)->delete();

        session()->setFlashdata('berhasil', 'Data pengguna berhasil dihapus');
        return redirect()->to('data-pengguna');
    }
}

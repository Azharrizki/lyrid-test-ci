<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Employee extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $getAllEmployee = $this->db->table('employees')->select('*')->get()->getResultArray();

        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $getAllEmployee
        ];

        return view('pages/employee/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Pegawai'
        ];
        return view('pages/employee/add', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'id' => [
                'rules' => 'is_unique[employees.id]',
                'errors' => [
                    'is_unique' => 'Kode pegawai sudah digunakan.',
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pegawai harus diisi.'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin pegawai harus dipilih.'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat pegawai harus diisi.'
                ]
            ],
            'phone_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telphon pegawai harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email pegawai harus diisi.'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Posisi pegawai harus diisi.'
                ]
            ],
            'department' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Departemen pegawai harus diisi.'
                ]
            ],
            'salary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji pegawai harus diisi.'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status pegawai harus diisi.'
                ]
            ],
            'image' => [
                'rules' => 'is_image[image]|ext_in[image,jpg,png,jpeg]|mime_in[image, image/png,image/jpeg,image/jpg]|max_size[image, 300]',
                'errors' => [
                    'is_image' => 'File yang diupload harus berupa image.',
                    'ext_in' => 'Extension yang diupload bukan image.',
                    'mime_in' => 'File yang diupload harus berupa png/jpeg/jpg.',
                    'max_size' => 'File yang diupload terlalu besar'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $image = $this->request->getFile('image');
        $fileImage = $image->getRandomName('image');
        $image->move('storage/image', $fileImage);
        $data = [
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'address' => $this->request->getVar('address'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'position' => $this->request->getVar('position'),
            'department' => $this->request->getVar('department'),
            'salary' => $this->request->getVar('salary'),
            'status' => $this->request->getVar('status'),
            'image' => $fileImage,
        ];

        $this->db->table('employees')->insert($data);

        session()->setFlashdata('berhasil', 'Data pegawai berhasil ditambahkan');
        return redirect()->to('data-pegawai');
    }

    public function edit($id)
    {
        $getData = $this->db->table('employees')->where('id', $id)->get();

        $data = [
            'title' => 'Edit Pegawai',
            'data' => $getData->getRowArray()
        ];

        return view('pages/employee/edit', $data);
    }

    public function update()
    {


        $id = $this->request->getVar('id');

        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $fileImage = $image->getRandomName('image');
            $image->move('storage/image', $fileImage);

            $data = [
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
                'phone_number' => $this->request->getVar('phone_number'),
                'email' => $this->request->getVar('email'),
                'position' => $this->request->getVar('position'),
                'department' => $this->request->getVar('department'),
                'salary' => $this->request->getVar('salary'),
                'status' => $this->request->getVar('status'),
                'image' => $fileImage,
            ];
        } else {
            $data = [
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
                'phone_number' => $this->request->getVar('phone_number'),
                'email' => $this->request->getVar('email'),
                'position' => $this->request->getVar('position'),
                'department' => $this->request->getVar('department'),
                'salary' => $this->request->getVar('salary'),
            ];
        }

        $this->db->table('employees')->where('id', $id)->update($data);

        session()->setFlashdata('berhasil', 'Data pegawai berhasil diperbarui');
        return redirect()->to('data-pegawai');
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');

        $this->db->table('employees')->where('id', $id)->delete();

        session()->setFlashdata('berhasil', 'Selamat data pegawai berhasil dihapus');
        return redirect()->back();
    }
}

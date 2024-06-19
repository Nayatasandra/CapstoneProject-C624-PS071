<?php

namespace App\Controllers;

use \App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel =  new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Supplier',
            'supplier' => $this->supplierModel->getAllSupplier()
        ];

        return view('supplier1/supplier/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Supplier',
            'validation' => \Config\Services::validation()
        ];

        return view('supplier1/supplier/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'kode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) 
        {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('supplier/tambah')->withInput();
        }

        // validasi data sukses
        $this->supplierModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('supplier');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Supplier',
            'validation' => \Config\Services::validation(),
            'supplier' => $this->supplierModel->getSupplierById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['supplier'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('supplier1/supplier/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('supplier/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->supplierModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('supplier');
    }

    public function delete($id)
    {
        $supplier = $this->supplierModel->find($id);

        $this->supplierModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('supplier');
    }

    
}

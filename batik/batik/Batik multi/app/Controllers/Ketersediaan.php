<?php

namespace App\Controllers;

use \App\Models\KetersediaanModel;

class Ketersediaan extends BaseController
{
    protected $ketersediaanModel;

    public function __construct()
    {
        $this->ketersediaanModel =  new KetersediaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Ketersediaan',
            'ketersediaan' => $this->ketersediaanModel->getAllKetersediaan()
        ];

        return view('supplier1/ketersediaan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Ketersediaan',
            'validation' => \Config\Services::validation()
        ];

        return view('supplier1/ketersediaan/tambah', $data);
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
            'nama_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
           
        ])) 
        {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('ketersediaan/tambah')->withInput();
        }

        // validasi data sukses
        $this->ketersediaanModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama_satuan' => $this->request->getVar('nama_satuan'),
           
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('ketersediaan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Ketersediaan',
            'validation' => \Config\Services::validation(),
            'ketersediaan' => $this->ketersediaanModel->getKetersediaanById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['ketersediaan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('supplier1/ketersediaan/edit', $data);
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
            'nama_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('ketersediaan/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->ketersediaanModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'nama_satuan' => $this->request->getVar('nama_satuan'),
           
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('ketersediaan');
    }

    public function delete($id)
    {
        $supplier = $this->ketersediaanModel->find($id);

        $this->ketersediaanModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('ketersediaan');
    }

    
}

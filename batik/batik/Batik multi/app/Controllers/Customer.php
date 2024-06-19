<?php

namespace App\Controllers;

use \App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel =  new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Customer',
            'customer' => $this->customerModel->getAllCustomer()
        ];

        return view('customer/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Customer',
            'validation' => \Config\Services::validation()
        ];

        return view('customer/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama' => [
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
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('customer/tambah')->withInput();
        }
        
        // validasi data sukses
        $this->customerModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/customer');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Customer',
            'validation' => \Config\Services::validation(),
            'customer' => $this->customerModel->getCustomerById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['customer'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('customer/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama' => [
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
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('customer/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->customerModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/customer');
    }

    public function delete($id)
    {
        $customer = $this->customerModel->find($id);

        
        $this->customerModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('customer');
    }
}

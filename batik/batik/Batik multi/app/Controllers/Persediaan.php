<?php

namespace App\Controllers;

use \App\Models\PersediaanModel;
use \App\Models\KetersediaanModel;
use \App\Models\JenisModel;
use \App\Models\PenerimaanModel;


class Persediaan extends BaseController
{
    protected $persediaanModel;
    
    public function __construct()
    {
        $this->persediaanModel =  new PersediaanModel();
        $this->ketersediaanModel =  new KetersediaanModel();
        $this->jenisModel =  new JenisModel();
        $this->penerimaanModel =  new PenerimaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Persediaan',
            'persediaan' => $this->persediaanModel->getAllPersediaan()
        
        ];

        return view('stok/persediaan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Persediaan',
            'ketersediaan' => $this->ketersediaanModel->getAllKetersediaan(),
            'jenis' => $this->jenisModel->getAllJenis(),
            'penerimaan' => $this->penerimaanModel->getAllPenerimaan(),
            'validation' => \Config\Services::validation()
        ];

        return view('stok/persediaan/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'kode_brg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_brg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) 
        {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('persediaan/tambah')->withInput();
        }

        // validasi data sukses
        $this->persediaanModel->save([
            'kode_brg' => $this->request->getVar('kode_brg'),
            'nama_brg' => $this->request->getVar('nama_brg'),
            'stok' => $this->request->getVar('stok'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('persediaan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Persediaan',
            'ketersediaan' => $this->ketersediaanModel->getAllKetersediaan(),
            'jenis' => $this->jenisModel->getAllJenis(),
            'penerimaan' => $this->penerimaanModel->getAllPenerimaan(),
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaanById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['persediaan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('stok/persediaan/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'kode_brg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_brg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('persediaan/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->persediaanModel->save([
            'id' => $id,
            'kode_brg' => $this->request->getVar('kode_brg'),
            'nama_brg' => $this->request->getVar('nama_brg'),
            'stok' => $this->request->getVar('stok'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('persediaan');
    }

    public function delete($id)
    {
        $persediaan = $this->persediaanModel->find($id);

        $this->persediaanModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('persediaan');
    }
    public function report()
    {
        echo "export data Persediaan";
    }

    
}

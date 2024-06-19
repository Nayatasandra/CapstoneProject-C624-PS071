<?php

namespace App\Controllers;

use \App\Models\KeluarModel;

use \App\Models\JenisModel;


class Keluar extends BaseController
{
    protected $keluarModel;
    
    public function __construct()
    {
        $this->keluarModel =  new KeluarModel();
        
        $this->jenisModel =  new JenisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang Keluar',
            'keluar' => $this->keluarModel->getAllKeluar()
        
        ];

        return view('stok/keluar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Barang Masuk',
            
            'jenis' => $this->jenisModel->getAllJenis(),
            'validation' => \Config\Services::validation()
        ];

        return view('stok/keluar/tambah', $data);
    }
    public function detail()
    {
        $data = [
            'title' => 'Detail Data Barang Keluar',
            'keluar' => $this->keluarModel->getAllKeluar()
            
        
        ];

        return view('stok/keluar/detail', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'no_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
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
            'tgl_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jam_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
           
            
        ])) 
        {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('keluar/tambah')->withInput();
        }

        // validasi data sukses
        $this->keluarModel->save([
            'no_keluar' => $this->request->getVar('no_keluar'),
            'kode_brg' => $this->request->getVar('kode_brg'),
            'nama_brg' => $this->request->getVar('nama_brg'),
            'stok' => $this->request->getVar('stok'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'jam_keluar' => $this->request->getVar('jam_keluar'),
            
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('keluar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Penerimaan',
            
            'jenis' => $this->jenisModel->getAllJenis(),
            'validation' => \Config\Services::validation(),
            'keluar' => $this->keluarModel->getKeluarById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['keluar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('stok/keluar/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'no_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
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
            'tgl_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jam_keluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('keluar/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->keluarModel->save([
            'id' => $id,
            'no_keluar' => $this->request->getVar('no_keluar'),
            'kode_brg' => $this->request->getVar('kode_brg'),
            'nama_brg' => $this->request->getVar('nama_brg'),
            'stok' => $this->request->getVar('stok'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'jam_keluar' => $this->request->getVar('jam_keluar'),
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('keluar');
    }

    public function delete($id)
    {
        $keluar = $this->keluarModel->find($id);

        $this->keluarModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('keluar');
    }
    public function report()
    {
        echo "export data Barang Keluar";
    }

    
}

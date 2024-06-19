<?php

namespace App\Controllers;

use \App\Models\BarangModel;

class Barang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel =  new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Stok Roti',
            'barang' => $this->barangModel->getAllBarang()
        ];

        return view('penjualan1/barang/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Stok Roti',
            'validation' => \Config\Services::validation()
        ];

        return view('penjualan1/barang/tambah', $data);
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
            'jenis_roti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
          
            //'gambar' => [
                //'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                //'errors' => [
                    //'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    //'is_image' => 'Yang anda pilih bukan gambar',
                    //'mime_in' => 'Yang anda pilih bukan gambar',
                //]
           // ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('barang/tambah')->withInput();
        }
        // validasi data sukses
        $this->barangModel->save([
        //$this->hotelModel->save([
            'kode' => $this->request->getVar('kode'),
            'jenis_roti' => $this->request->getVar('jenis_roti'),
            'jumlah' => $this->request->getVar('jumlah'),
            
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('barang');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Stok Roti',
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarangByid($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('penjualan1/barang/edit', $data);
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
            'jenis_roti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('barang/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        // validasi data sukses
        $this->barangModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),
            'jenis_roti' => $this->request->getVar('jenis_roti'),
            'jumlah' => $this->request->getVar('jumlah'),
            
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('barang');
    }

    public function delete($id)
    {
        $tipekamar = $this->barangModel->find($id);

        $this->barangModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('barang');
    }
}


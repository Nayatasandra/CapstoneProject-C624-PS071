<?php

namespace App\Controllers;

use \App\Models\PenjualanModel;
use \App\Models\BarangModel;


class Penjualan extends BaseController
{
    protected $PenjualanModel;

    public function __construct()
    {
        $this->penjualanModel =  new PenjualanModel();
        $this->barangModel =  new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Penjualan',
            'penjualan' => $this->penjualanModel->getAllPenjualan()
        ];

        return view('penjualan1/penjualan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Penjualan',
            'barang' => $this->barangModel->getAllBarang(),
            'validation' => \Config\Services::validation()

        ];

        return view('penjualan1/penjualan/tambah', $data);
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
            'harga_jual' => [
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
            return redirect()->to('penjualan/tambah')->withInput();
        }
        // validasi data sukses
        $this->penjualanModel->save([
            //$this->hotelModel->save([
            'kode' => $this->request->getVar('kode'),
            'jenis_roti' => $this->request->getVar('jenis_roti'),
            'jumlah' => $this->request->getVar('jumlah'),
            'harga_jual' => $this->request->getVar('harga_jual'),

        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('penjualan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Penjualan',
            'barang' => $this->barangModel->getAllBarang(),
            'validation' => \Config\Services::validation(),
            'penjualan' => $this->penjualanModel->getPenjualanByid($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['penjualan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('penjualan1/penjualan/edit', $data);
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
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],

        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('penjualan/edit/' . $this->request->getVar('id'))->withInput();
        }

        // validasi data sukses
        $this->penjualanModel->save([

            'kode' => $this->request->getVar('kode'),
            'jenis_roti' => $this->request->getVar('jenis_roti'),
            'jumlah' => $this->request->getVar('jumlah'),
            'harga_jual' => $this->request->getVar('harga_jual'),


        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('penjualan');
    }

    public function delete($id)
    {
        $penjualan = $this->penjualanModel->find($id);

        $this->penjualanModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('penjualan');
    }
}

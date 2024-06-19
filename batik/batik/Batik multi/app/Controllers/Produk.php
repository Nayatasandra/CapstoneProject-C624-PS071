<?php

namespace App\Controllers;

use \App\Models\ProdukModel;
use \App\Models\BarangModel;
use \App\Models\PenjualanModel;

class Produk extends BaseController
{
    protected $produkModel;
    protected $barangModel;
    protected $penjualanModel;

    public function __construct()
    {
        $this->produkModel =  new ProdukModel();
        $this->barangModel =  new BarangModel();
        $this->penjualanModel =  new PenjualanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => $this->produkModel->getAllProduk()
        ];

        return view('produksi/produk/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Produk',
            'barang' => $this->barangModel->getAllBarang(),
            'penjualan' => $this->penjualanModel->getAllPenjualan(),
            'validation' => \Config\Services::validation()
        ];

        return view('produksi/produk/tambah', $data);
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
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hargaJual' => [
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
            'ukuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('produk/tambah')->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/produk', $namaSampul);
        }
        // validasi data sukses
        $this->produkModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'hargaJual' => $this->request->getVar('hargaJual'),
            'jumlah' => $this->request->getVar('jumlah'),
            'ukuran' => $this->request->getVar('ukuran'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Produk',
            'barang' => $this->barangModel->getAllBarang(),
            'penjualan' => $this->penjualanModel->getAllPenjualan(),
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProdukById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('produksi/produk/edit', $data);
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
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hargaJual' => [
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
            'ukuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('produk/edit/' . $this->request->getVar('id'))->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('gambarLama');
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/produk', $namaSampul);

            // hapus file lama
            if ($this->request->getVar('gambarLama') != 'default.jpg') {
                unlink('img/produk/' . $this->request->getVar('gambarLama'));
            }
        }
        // validasi data sukses
        $this->produkModel->save([
            'id' => $id,
            'kode' => $this->request->getVar('kode'),

            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'hargaJual' => $this->request->getVar('hargaJual'),
            'jumlah' => $this->request->getVar('jumlah'),
            'ukuran' => $this->request->getVar('ukuran'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/produk');
    }

    public function delete($id)
    {
        $produk = $this->produkModel->find($id);

        // cek jika gambar default
        if ($produk['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/produk/' . $produk['gambar']);
        }

        $this->produkModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('produk');
    }
    public function report()
    {
        echo "export data Pemakaian Bahan Baku";
    }
}

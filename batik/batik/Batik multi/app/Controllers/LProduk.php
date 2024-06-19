<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\ProdukModel;

class LProduk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        return view('produk/index', $data);
    }

    public function cetakPengunjungPeriode()
    {

        $produkModel = new ProdukModel();
        $dataLaporan = $produkModel->laporanPerPeriode();
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Data',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
           
        ];
        //
        return view('produk/report', $data);
    }
}

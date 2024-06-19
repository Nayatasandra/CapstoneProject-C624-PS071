<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PenjualanModel;

class Lpenjualan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        return view('penjualan/index', $data);
    }

    public function cetakPengunjungPeriode()
    {

        $penjualanModel = new PenjualanModel();
        $dataLaporan = $penjualanModel->laporanPerPeriode();
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Data',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
           
        ];
        //
        return view('penjualan/report', $data);
    }
}
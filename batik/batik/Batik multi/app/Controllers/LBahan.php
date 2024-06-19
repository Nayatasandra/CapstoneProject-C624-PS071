<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\BahanModel;

class LBahan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        return view('bahan/index', $data);
    }

    public function cetakPengunjungPeriode()
    {

        $bahanModel = new BahanModel();
        $dataLaporan = $bahanModel->laporanPerPeriode();
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Data',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
           
        ];
        //
        return view('bahan/report', $data);
    }
}

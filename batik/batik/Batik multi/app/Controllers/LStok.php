<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PersediaanModel;

class LStok extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        return view('persediaan/index', $data);
    }

    public function cetakPengunjungPeriode()
    {

        $persediaanModel = new PersediaanModel();
        $dataLaporan = $persediaanModel->laporanPerPeriode();
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Data',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
           
        ];
        //
        return view('persediaan/report', $data);
    }
}

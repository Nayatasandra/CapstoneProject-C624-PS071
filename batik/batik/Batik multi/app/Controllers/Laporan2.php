<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\OnlineModel;

class Laporan2 extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        return view('produksi/laporan2/index', $data);
    }

    public function cetakPengunjungPeriode()
    {
        $tglawal = $this->request->getVar('tglawal');
        $tglakhir = $this->request->getVar('tglakhir');

        // $penerimaanModel = new PenerimaanModel();
        $onlineModel = new OnlineModel();
        $dataLaporan = $onlineModel->laporanPerPeriode($tglawal, $tglakhir);
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Barang Masuk',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];
        //
        return view('produksi/laporan2/cetakLaporanPengunjung', $data);
    }
}

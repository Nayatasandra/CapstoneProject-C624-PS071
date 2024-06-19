<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PenerimaanModel;
use \App\Models\KeluarModel;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Data'
        ];
        //
        // return view('stok/laporan/index', $data);
    }

    public function cetakPengunjungPeriode()
    {
        $tglawal = $this->request->getVar('tglawal');
        $tglakhir = $this->request->getVar('tglakhir');

        $penerimaanModel = new PenerimaanModel();
        $dataLaporan = $penerimaanModel->laporanPerPeriode($tglawal, $tglakhir);
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Barang Masuk',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];
        //
        return view('stok/laporan/cetakLaporanPengunjung', $data);
    }

    public function cetakPengunjungPeriodecopy()
    {
        $tglawal = $this->request->getVar('tglawal');
        $tglakhir = $this->request->getVar('tglakhir');

        $keluarModel = new KeluarModel();
        $dataLaporan = $keluarModel->laporanPerPeriode($tglawal, $tglakhir);
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Barang Keluar',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];
        //
        return view('stok/laporan/cetakLaporanPengunjung copy', $data);
    }
}

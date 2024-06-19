<?php

namespace App\Models;

use CodeIgniter\Model;

class OnlineModel extends Model
{
    protected $table            = 'transaksi_pemesanan';
    protected $allowedFields    = ['id_trans1', 'nama', 'no_hp', 'email', 'alamat', 'total_produk', 'total_harga','tanggal_trans'];
    protected  $primaryKey     = 'id_trans1';


    public function getAll()
    {

        $builder = $this->db->table('transaksi_pemesanan');
        $quary   = $builder->get();
        return $quary->getResult();
    }

    public function getById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_trans1' => $id])->first();
    }

    public function laporanPerPeriode($tglawal, $tglakhir)
    {
        return $this->table('transaksi_pemesanan')
            ->where('tanggal_trans >=', $tglawal)
            ->where('tanggal_trans <=', $tglakhir)
            ->get();
    }
    public function getAllLaporan()
    {
        return $this->findAll();
    }
}

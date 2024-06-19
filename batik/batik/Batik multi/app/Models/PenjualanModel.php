<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{

    protected $table            = 'penjualan';
    protected $allowedFields    = ['kode', 'jenis_roti', 'jumlah', 'harga_jual'];


    public function getAllPenjualan()
    {
        return $this->db->table('penjualan')->get()->getResultArray();
    }
    public function getPenjualanByid($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function laporanPerPeriode()
    {
        return $this->table('penjualan')
            ->get();
    }
}

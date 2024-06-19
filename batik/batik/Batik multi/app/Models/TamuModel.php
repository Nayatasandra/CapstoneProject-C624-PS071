<?php

namespace App\Models;

use CodeIgniter\Model;

class TamuModel extends Model
{

    protected $table            = 'produksi';
    protected $allowedFields    = ['kode', 'bahan_baku', 'harga_pokok', 'biaya_lain', 'total_biayaproduksi'];


    public function getAllTamu()
    {
        return $this->db->table('produksi')->get()->getResultArray();
    }
    public function getTamuById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function laporanPerPeriode()
    {
        return $this->table('produksi')
            ->get();
    }
}

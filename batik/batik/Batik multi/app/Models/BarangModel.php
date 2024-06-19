<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{

    protected $table            = 'barang';
    protected $allowedFields    = ['kode', 'jenis_roti', 'jumlah'];


    public function getAllBarang()
    {
        return $this->db->table('barang')->get()->getResultArray();
    }
    public function getBarangByid($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}

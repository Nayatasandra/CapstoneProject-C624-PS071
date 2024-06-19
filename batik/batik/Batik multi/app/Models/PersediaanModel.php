<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{

    protected $table            = 'persediaan_brg';
    protected $allowedFields    = ['kode_brg', 'nama_brg', 'stok', 'satuan', 'keterangan'];


    public function getAllPersediaan()
    {
        return $this->db->table('persediaan_brg')->get()->getResultArray();
    }
    public function getPersediaanById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function laporanPerPeriode()
    {
        return $this->table('persediaan_brg')
            ->get();
    }
   
}

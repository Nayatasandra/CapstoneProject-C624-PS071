<?php

namespace App\Models;

use CodeIgniter\Model;

class KetersediaanModel extends Model
{

    protected $table            = 'ketersediaan';
    protected $allowedFields    = ['kode', 'nama_satuan'];


    public function getAllKetersediaan()
    {
        return $this->db->table('ketersediaan')->get()->getResultArray();
    }
    public function getKetersediaanById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
   
}

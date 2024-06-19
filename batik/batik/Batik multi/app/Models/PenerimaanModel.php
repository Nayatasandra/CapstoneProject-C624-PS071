<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaanModel extends Model
{

    protected $table            = 'penerimaan';
    protected $allowedFields    = ['no_terima', 'tgl_terima', 'jam_terima', 'nama_supplier', 'kode_brg', 'nama_brg', 'jumlah','satuan'];


    public function getAllPenerimaan()
    {
        return $this->db->table('penerimaan')->get()->getResultArray();
    }
    public function getPenerimaanById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function laporanPerPeriode()
    {
        return $this->table('penerimaan')
            ->get();
    }
   
}

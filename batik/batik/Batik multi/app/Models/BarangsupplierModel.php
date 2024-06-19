<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangsupplierModel extends Model
{

    protected $table            = 'barangsupplier';
    protected $allowedFields    = ['kode','jenis_barang', 'stok', 'satuan'];


    public function getAllBarangsupplier()
    {
        return $this->db->table('barangsupplier')->get()->getResultArray();
    }
    public function getBarangsupplierById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

public function laporanPerPeriode()
{
    return $this->table('barangsupplier')
    ->get();
}
}
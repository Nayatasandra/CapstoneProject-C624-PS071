<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{

    protected $table            = 'customer';
    protected $allowedFields    = ['nama', 'alamat', 'email', 'no_hp'];


    public function getAllcustomer()
    {
        return $this->db->table('customer')->get()->getResultArray();
    }
    public function getCustomerById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}

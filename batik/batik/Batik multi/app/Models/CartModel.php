<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table            = 'cart';
    protected $allowedFields    = ['id_cart', 'id_produk', 'quantity'];
    protected  $primaryKey     = 'id_cart';


    public function getAll()
    {

        $builder = $this->db->table('cart');
        $builder->join('produk', 'produk.id = cart.id_produk');
        $quary   = $builder->get();
        return $quary->getResult();
    }

    public function getById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_cart' => $id])->first();
    }

    public function insertCart($data)
    {
        $this->db->table->insert($data);
    }
}

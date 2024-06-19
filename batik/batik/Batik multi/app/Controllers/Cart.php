<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\OnlineModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $onlineModel;

    public function __construct()
    {
        $this->cartModel =  new CartModel();
        $this->onlineModel =  new OnlineModel();
    }
    public function index()
    {
        $data = [
            'title' => 'laporan',
            'laporan' => $this->onlineModel->getAllLaporan()
        ];

        return view('produksi/laporan/index', $data);
    }

    public function addToCart()
    {

        $model = new CartModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'hargaJual' => $this->request->getPost('hargaJual'),
            'gambar' => $this->request->getPost('gambar'),
            'product_quantity' => 1
        ];

        $model->getById($this->request->getPost('$id'));

        if ($model) {
            $message[] = 'product already added to cart';
        } else {
            $model->insertCart($data);
            $message[] = 'product added to cart succesfully';
        }
    }
}

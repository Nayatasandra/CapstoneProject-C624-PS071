<?php

namespace App\Controllers;


use App\Models\ProdukModel;
use App\Models\CartModel;
use App\Models\OnlineModel;
// use App\Models\DetailOnlineModel;

class Online extends BaseController
{
  protected $onlineModel;
  protected $produkModel;
  protected $cartModel;
  // protected $detailModel;


  public function __construct()
  {

    $this->produkModel =  new ProdukModel();
    $this->cartModel =  new CartModel();
    $this->onlineModel = new OnlineModel();
    // $this->detailModel =  new DetailOnlineModel();
  }

  public function index()
  {

    $data = [

      'online' => $this->onlineModel->getAll(),
      helper('form'),
      'produk' => $this->produkModel->findAll(),
      'cart' => $this->cartModel->getAll(),
      // 'detail' => $this->detailModel->getAll()
    ];


    return view('home/index', $data);
  }

  // Bagian Cart
  /* public function cek()
  {
    $cart = \Config\Services::cart();
    $response = $cart->contents();

    echo '<pre>';
    print_r($response);
    echo '</pre>';
  } */

  // Insert data ke dalam cart
  /* public function add()
  {
    $cart = \Config\Services::cart();
    $cart->insert(array(
      'id'      => $this->request->getPost('id'),
      'qty'     => 1,
      'price'   => $this->request->getPost('price'),
      'name'    => $this->request->getPost('name'),
      'options' => array(
        'deskripsi' => $this->request->getPost('deskripsi'),
        'picture' => $this->request->getPost('picture'),
      )
    ));
    session()->setFlashdata('pesan', 'Barang Berhasil Dimasukkan Ke Keranjang !!!!');
    return redirect()->to(base_url('online'));
  } */

  // Menghapus data di cart
  /* public function clear()
  {
    $cart = \Config\Services::cart();
    $cart->destroy();
  } */
  public function cart()
  {
    $data = [
      'title' => 'View Cart',
      'online' => $this->onlineModel->getAll(),
      helper('form'),
      'produk' => $this->produkModel->findAll(),
      'cart' => $this->cartModel->getAll()
    ];
    return view('home/cart', $data);
  }
  public function checkout()
  {
    $data = [
      'title' => 'View Checkout',
      'online' => $this->onlineModel->getAll(),
      helper('form'),
      'produk' => $this->produkModel->findAll(),
      'cart' => $this->cartModel->getAll()
    ];
    return view('home/checkout', $data);
  }
  /* public function simpan()
  {
      // validasi data sukses
      $this->offlineModel->save([
        'id_pelanggan' => $this->request->getVar('id_pelanggan'),
          'tanggal_trans' => $this->request->getVar('tanggal'),
         
      ]);
     
   
      // menuju from checkout
      return redirect()->to('/checkout');
  } */
  public function detail()
  {
    $data = [
      'online' => $this->onlineModel->getAll(),
      'produk' => $this->produkModel->findAll(),
      'cart' => $this->cartModel->getAll(),
    ];
    return view('home/detail', $data);
  }
  public function penjualan_online()
  {
    $data = [
      'title' => "Penjualan Online",

      'online' => $this->onlineModel->getAll(),
      'produk' => $this->produkModel->findAll(),
      'cart' => $this->cartModel->getAll(),
      // 'detail' => $this->detailModel->getAll()
    ];


    return view('admin/penjualan_online', $data);
  }
}

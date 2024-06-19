<?php

namespace App\Controllers;

class ProduksiController extends BaseController
{
    private $session;
    private $userModel;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel();
        $this->session =  \Config\Services::session();
    }
    public function produksi(){
        
        return view('produksi/index');
    }
}
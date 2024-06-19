<?php

namespace App\Controllers;

class PenjualanController extends BaseController
{
    private $session;
    private $userModel;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel();
        $this->session =  \Config\Services::session();
    }
    public function penjualan(){
        
        return view('penjualan1/index');
    }
}
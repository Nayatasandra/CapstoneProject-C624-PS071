<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $userModel;
    private $session;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel();
        $this->session =  \Config\Services::session();
    }

    public function index()
    {
        return view('home/index');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function insert_user()
    {
        $user = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');
        $jenis = $this->request->getPost('jenis');

        //enkripsi password
        $pass_ens = password_hash($pass, PASSWORD_DEFAULT);

        $data = ([
            "username" => $user,
            "email" => $email,
            "password" => $pass_ens,
            "jenis" => $jenis,
        ]);

        $tambah = $this->userModel->insert($data);

        if ($tambah) {
            return redirect()->to(base_url("/"));
        } else {
            return redirect()->to(base_url("/register1"));
        }
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');

        $cek_data = $this->userModel->where("email", $email)->first();

        //jika data ditemukan
        if ($cek_data) {

            //seleksi jenis akun atau akses
            if ($cek_data->jenis == "hrd") {
                return redirect()->to(base_url("hrd"));
            } elseif ($cek_data->jenis == "supplier") {
                return redirect()->to(base_url("supplier1"));
            } elseif ($cek_data->jenis == "stok") {
                return redirect()->to(base_url("stok"));
            } elseif ($cek_data->jenis == "produksi") {
                return redirect()->to(base_url("produksi"));
            } elseif ($cek_data->jenis == "penjualan") {
                return redirect()->to(base_url("penjualan1"));
            } else {
                return redirect()->to(base_url("distributor1"));
            }
        } else {
            echo "data tidak ditemukan";
        }
    }
}

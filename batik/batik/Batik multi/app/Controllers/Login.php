<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    private $session;
    private $userModel;

    public function __construct()
    {
        $this->userModel =  new \App\Models\UserModel();
        $this->session =  \Config\Services::session();
    }
    public function index()
    {
        return view('login');
    }
 
    public function auth()
    {
        $email =$this->request->getPost('email');
        $pass =$this->request->getPost('pass');

        $cek_data = $this->userModel->where("email", $email)->first();

        //jika data ditemukan
        if($cek_data){

            //seleksi jenis akun atau akses
            if($cek_data->jenis == "hrd"){
                return redirect()->to(base_url("hrd/index"));

            }elseif($cek_data->jenis == "supplier"){
                return redirect()->to(base_url("supplier1/index"));

            }elseif($cek_data->jenis == "stok"){
                return redirect()->to(base_url("stok/index"));

            }elseif($cek_data->jenis == "produksi"){
                return redirect()->to(base_url("produksi/index"));

            }elseif($cek_data->jenis == "penjualan"){
                return redirect()->to(base_url("penjualan1/index"));
                
            }else{
                return redirect()->to(base_url("distributor1/index"));
            }
        }else{
            echo"data tidak ditemukan";
        }

    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 
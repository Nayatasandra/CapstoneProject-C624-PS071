<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Register extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function insert_user()
    {
        $user =$this->request->getPost('username');
        $email =$this->request->getPost('email');
        $pass =$this->request->getPost('pass');
        $jenis =$this->request->getPost('jenis');

        //enkripsi password
        $pass_ens = password_hash($pass, PASSWORD_DEFAULT);

        $data =([
            "username" => $user,
            "email" => $email,
            "password" => $pass_ens,
            "jenis" => $jenis,
        ]);

        $tambah = $this->userModel->insert($data);

        if($tambah){
            return redirect()->to(base_url("/login"));
        }else{
            return redirect()->to(base_url("/register"));
        }
    }
 
}
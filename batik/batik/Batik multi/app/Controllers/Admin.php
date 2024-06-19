<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];

        return view('admin/index', $data);
    }
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard blank'
        ];

        return view('admin/dashboard', $data);
    }
}

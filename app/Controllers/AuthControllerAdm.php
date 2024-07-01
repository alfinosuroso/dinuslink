<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthControllerAdm extends BaseController
{
    function __construct()
    {
        helper('form');
    }

    public function login()
    {
        if ($this->request->getPost()) {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = ['username' => 'admin', 'password' => '202cb962ac59075b964b07152d234b70', 'role' => 'admin']; // passw 123

        if ($username == $dataUser['username']) {
            if (md5($password) == $dataUser['password']) {
                session()->set([
                    'username' => $dataUser['username'],
                    'role' => $dataUser['role'],
                    'isLoggedIn' => TRUE
                ]);

                return redirect()->to(base_url('/admin'));
            } else {
                session()->setFlashdata('failed', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('failed', 'Username Tidak Ditemukan');
            return redirect()->back();
        }
            } else {
        return view('/admin/v_login');
            }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/v_login');
    }
}

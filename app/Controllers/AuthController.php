<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $users;

    function __construct()
    {
        helper('form');
        $this->users = new UserModel();
    }

    public function login()
{
    if ($this->request->getPost()) {
        $rules = [
            'nim' => 'required|min_length[6]',
            'password' => 'required|min_length[7]|numeric',
        ];

        if ($this->validate($rules)) {
            $nim = $this->request->getVar('nim');
            $password = $this->request->getVar('password');

            $dataUser = $this->users->where(['nim' => $nim])->first(); //pasw 1234567

            if ($dataUser) {
                if (password_verify($password, $dataUser['password'])) {
                    session()->set([
                        'nim' => $dataUser['nim'],
                        'role' => $dataUser['role'],
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('failed', 'Kombinasi nim & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'nim Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('failed', $this->validator->listErrors());
            return redirect()->back();
        }
    }

    return view('mahasiswa/v_login');
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

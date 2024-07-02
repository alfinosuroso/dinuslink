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
         helper(['form', 'url']);
        $this->users = new UserModel();
    }

    //  public function login()
    // {
    //     if ($this->request->getPost()) {
    //         $rules = [
    //             'nim' => 'required|min_length[6]',
    //             'password' => 'required|min_length[7]|numeric',
    //         ];

    //         if ($this->validate($rules)) {
    //             $nim = $this->request->getVar('nim');
    //             $password = $this->request->getVar('password');

    //             $dataUser = $this->users->where(['nim' => $nim])->first(); //pasw 1234567

    //             if ($dataUser) {
    //                 if (password_verify($password, $dataUser['password'])) {
    //                     session()->set([
    //                         'nim' => $dataUser['nim'],
    //                         'role' => $dataUser['role'],
    //                         'isLoggedIn' => TRUE
    //                     ]);

    //                     if ($dataUser['role'] === 'admin') {
    //                         return redirect()->to(base_url('/event'));
    //                     } else if ($dataUser['role'] === 'mahasiswa') {
    //                         return redirect()->to(base_url('/'));
    //                     }

    //                 } else {
    //                     session()->setFlashdata('failed', 'Kombinasi nim & Password Salah');
    //                     return redirect()->back();
    //                 }
    //             } else {
    //                 session()->setFlashdata('failed', 'nim Tidak Ditemukan');
    //                 return redirect()->back();
    //             }
    //         } else {
    //             session()->setFlashdata('failed', $this->validator->listErrors());
    //             return redirect()->back();
    //         }
    //     }

    //     return view('mahasiswa/v_login');
    // }

    public function login()
    {
        if ($this->request->getPost()) {
            $rules = [
                'nim' => 'required|min_length[12]',
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



    public function register()
    {
        if ($this->request->getPost()) {
            $rules = [
                'nama' => 'required|min_length[3]|max_length[100]',
                // 'nim' => 'required|min_length[12]|max_length[100]',
                'nim' => 'required|exact_length[12]|regex_match[/^A11\d{9}$/]|is_unique[users.nim]',    
                'password' => 'required|min_length[7]',
                'prodi' => 'required|in_list[teknik-informatika,sistem-informasi]',
                'minat' => 'required|in_list[mobile,web,ai]',
                'kontak' => 'required|regex_match[/^08\d{8,11}$/]'
            ];

            if ($this->validate($rules)) {
                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'nim' => $this->request->getVar('nim'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'prodi' => $this->request->getVar('prodi'),
                    'minat' => $this->request->getVar('minat'),
                    'kontak' => $this->request->getVar('kontak'),
                    'role' => 'mahasiswa',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                // Debug output
                error_log("Inserting data: " . print_r($data, true));

                if ($this->users->insert($data)) {
                    session()->setFlashdata('success', 'Registration successful. Please login.');
                    return redirect()->to(base_url('login'));
                } else {
                    session()->setFlashdata('failed', 'Registration failed. Please try again.');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                error_log("Validation failed: " . print_r($this->validator->listErrors(), true)); // Log errors
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        return view('mahasiswa/v_register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

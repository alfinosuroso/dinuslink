<?php

namespace App\Controllers;

class ProfilMhsController extends BaseController
{
    public function index(): string
    {
        return view('/mahasiswa/v_profil');
    }
}

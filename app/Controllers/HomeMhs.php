<?php

namespace App\Controllers;

class HomeMhs extends BaseController
{
    public function index(): string
    {
        return view('/mahasiswa/v_dashboard');
    }
}

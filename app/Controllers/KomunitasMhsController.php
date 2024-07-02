<?php

namespace App\Controllers;

class KomunitasMhsController extends BaseController
{
    public function index(): string
    {
        
        return view('/mahasiswa/v_komunitas');
    }
}

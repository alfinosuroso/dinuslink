<?php

namespace App\Controllers;

class ProfilMhsController extends BaseController
{
    public function index(): string
    {
        return view('/admin/v_verifevent');
    }
}

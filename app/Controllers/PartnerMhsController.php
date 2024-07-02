<?php

namespace App\Controllers;

class PartnerMhsController extends BaseController
{
    public function index(): string
    {
        
        return view('/mahasiswa/v_partner');
    }
}

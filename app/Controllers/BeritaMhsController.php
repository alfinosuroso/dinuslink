<?php

namespace App\Controllers;

class BeritaMhsController extends BaseController
{
    public function index(): string
    {
        return view('/mahasiswa/v_berita');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KomunitasController extends BaseController
{
    public function index()
    {
        return view('v_komunitas');
    }
}

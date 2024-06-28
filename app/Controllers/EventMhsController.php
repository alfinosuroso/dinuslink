<?php

namespace App\Controllers;

class EventMhsController extends BaseController
{
    public function index(): string
    {
        return view('/mahasiswa/v_event');
    }
}

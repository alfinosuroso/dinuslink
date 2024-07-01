<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\EventModel;
use App\Models\CommunityModel;

class HomeAdm extends BaseController
{
    protected $berita;
    protected $lomba;
    protected $komunitas;

    function __construct()
    {
        $this->berita = new NewsModel();
        $this->lomba = new EventModel();
        $this->komunitas = new CommunityModel();
    }

    public function index()
    {
        $berita = $this->berita->findAll();
        $lomba = $this->lomba->findAll();
        $komunitas = $this->komunitas->findAll();

        // Menyimpan data ke dalam array $data dengan key yang benar
        $data['berita'] = $berita;
        $data['lomba'] = $lomba;
        $data['komunitas'] = $komunitas;

        // Mengirim data ke view
        return view('/admin/v_home', $data);
    }
}

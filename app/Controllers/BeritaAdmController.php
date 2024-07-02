<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Controllers\BaseController;

class BeritaAdmController extends BaseController
{
    protected $berita;

    function __construct()
    {
        $this->berita = new NewsModel();
    }

    public function index()
    {
        $berita = $this->berita->findAll();
        $data['berita'] = $berita;
        return view('/admin/v_berita', $data);
    }

    public function create()
    {
        $dataGmbrNews = $this->request->getFile('gambar_berita');

        $dataForm = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if ($dataGmbrNews && $dataGmbrNews->isValid() && !$dataGmbrNews->hasMoved()) {
            $fileName = $dataGmbrNews->getRandomName();
            $dataForm['gambar_berita'] = $fileName;
            $dataGmbrNews->move('img/', $fileName);
        }

        $this->berita->insert($dataForm);

        return redirect()->to('/beritaadm')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataBerita = $this->berita->find($id);

        $dataForm = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataBerita['gambar_berita'] != '' && file_exists("img/" . $dataBerita['gambar_berita'])) {
                unlink("img/" . $dataBerita['gambar_berita']);
            }

            $dataGmbrNews = $this->request->getFile('gambar_berita');

            if ($dataGmbrNews && $dataGmbrNews->isValid() && !$dataGmbrNews->hasMoved()) {
                $fileName = $dataGmbrNews->getRandomName();
                $dataGmbrNews->move('img/', $fileName);
                $dataForm['gambar_berita'] = $fileName;
            }
        }

        $this->berita->update($id, $dataForm);

        return redirect()->to('/beritaadm')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataBerita = $this->berita->find($id);

        if ($dataBerita['gambar_berita'] != '' && file_exists("img/" . $dataBerita['gambar_berita'])) {
            unlink("img/" . $dataBerita['gambar_berita']);
        }

        $this->berita->delete($id);

        return redirect()->to('/beritaadm')->with('success', 'Data Berhasil Dihapus');
    }
}

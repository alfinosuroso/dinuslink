<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventAdmController extends BaseController
{
    protected $lomba; // Ubah dari $lomba menjadi $event
    protected $validation;

    public function __construct()
    {
        $this->lomba = new EventModel(); // Ganti dari new EventModel() menjadi new LombaModel()
    }

    public function index()
    {
        $lomba = $this->lomba->findAll(); // Ganti $this->lomba menjadi $this->event
        $data['event'] = $lomba;

        return view('/admin/v_event', $data);
    }

    public function create()
    {
        $dataGmbrEvent = $this->request->getFile('gambar_event');

        $dataForm = [
            'judul_event' => $this->request->getPost('judul_event'), // Ganti 'judul' menjadi 'judul_event'
            'organizer' => $this->request->getPost('organizer'),
            'tgl_event' => $this->request->getPost('tgl_event'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => $this->request->getPost('status')
        ];

        if ($dataGmbrEvent->isValid()) {
            $fileName = $dataGmbrEvent->getRandomName();
            $dataForm['gambar_event'] = $fileName;
            $dataGmbrEvent->move('img/', $fileName);
        }

        $this->lomba->insert($dataForm); // Ganti $this->event menjadi $this->lomba

        return redirect()->to('eventadm')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataLomba = $this->lomba->find($id); // Ganti $this->lomba menjadi $this->event

        $dataForm = [
            'judul_event' => $this->request->getPost('judul_event'), // Ganti 'judul' menjadi 'judul_event'
            'organizer' => $this->request->getPost('organizer'),
            'tgl_event' => $this->request->getPost('tgl_event'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'created_at' => $this->request->getPost('created_at'), // Pastikan menggunakan 'created_at' dari form
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => $this->request->getPost('status')
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataLomba['gambar_event'] != '' && file_exists("img/" . $dataLomba['gambar_event'])) {
                unlink("img/" . $dataLomba['gambar_event']);
            }

            $dataGmbrEvent = $this->request->getFile('gambar_event');

            if ($dataGmbrEvent->isValid()) {
                $fileName = $dataGmbrEvent->getRandomName();
                $dataGmbrEvent->move('img/', $fileName);
                $dataForm['gambar_event'] = $fileName;
            }
        }

        $this->lomba->update($id, $dataForm); // Ganti $this->product menjadi $this->lomba

        return redirect()->to('eventadm')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataLomba = $this->lomba->find($id); // Ganti $this->lomba menjadi $this->event

        if ($dataLomba['gambar_event'] != '' && file_exists("img/" . $dataLomba['gambar_event'])) {
            unlink("img/" . $dataLomba['gambar_event']);
        }

        $this->lomba->delete($id); // Ganti $this->event menjadi $this->lomba

        return redirect()->to('eventadm')->with('success', 'Data Berhasil Dihapus');
    }
}
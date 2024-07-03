<?php

namespace App\Controllers;

use App\Models\EventModel;
use Exception;

class EventAdmController extends BaseController
{
    protected $event; // Ubah dari $lomba menjadi $event
    protected $validation;

    public function __construct()
    {
        $this->event = new EventModel(); // Ganti dari new EventModel() menjadi new LombaModel()
    }

    public function index()
    {
        $event = $this->event->findAll(); // Ganti $this->lomba menjadi $this->event
        $data['event'] = $event;

        return view('/admin/v_event', $data);
    }

    public function create()
    {
        try {
            $dataGmbrEvent = $this->request->getFile('gambar');

            $dataForm = [
                'nama' => $this->request->getPost('nama'), // Ganti 'judul' menjadi 'judul_event'
                'nim' => session('nim'),
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tanggal' => $this->request->getPost('tanggal'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            if ($dataGmbrEvent->isValid() && !$dataGmbrEvent->hasMoved()) {
                $fileName = $dataGmbrEvent->getRandomName();
                $dataForm['gambar'] = $fileName;
                $dataGmbrEvent->move('img-event/', $fileName);
            }

            $this->event->insert($dataForm); // Ganti $this->event menjadi $this->lomba

            return redirect()->to('eventadm')->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
        }
    }

    public function edit($id)
    {
        $dataEvent = $this->event->find($id); // Ganti $this->lomba menjadi $this->event

        $dataForm = [
            'nama' => $this->request->getPost('nama'), // Ganti 'judul' menjadi 'judul_event'
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataEvent['gambar'] != '' && file_exists("img-event/" . $dataEvent['gambar'])) {
                unlink("img-event/" . $dataEvent['gambar']);
            }

            $dataGmbrEvent = $this->request->getFile('gambar');

            if ($dataGmbrEvent->isValid()) {
                $fileName = $dataGmbrEvent->getRandomName();
                $dataGmbrEvent->move('img-event/', $fileName);
                $dataForm['gambar'] = $fileName;
            }
        }

        $this->event->update($id, $dataForm); // Ganti $this->product menjadi $this->lomba

        return redirect()->to('eventadm')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataEvent = $this->event->find($id); // Ganti $this->lomba menjadi $this->event

        if ($dataEvent['gambar'] != '' && file_exists("img-event/" . $dataEvent['gambar'])) {
            unlink("img-event/" . $dataEvent['gambar']);
        }

        $this->event->delete($id); // Ganti $this->event menjadi $this->lomba

        return redirect()->to('eventadm')->with('success', 'Data Berhasil Dihapus');
    }
}

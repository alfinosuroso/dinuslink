<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\VerificationEventModel;

class VerifEventAdmController extends BaseController
{
    protected $verifyEvent;

    function __construct()
    {
        $this->event = new EventModel();
        $this->verifyEvent = new VerificationEventModel();
    }

    public function index(): string
    {
        $verifyEvent = $this->verifyEvent->findAll();
        $data['verifyEvent'] = $verifyEvent;
        return view('/admin/v_verifevent', $data);
    }

    public function accept($id)
    {
        $dataEvent = $this->verifyEvent->find($id); // Ganti $this->lomba menjadi $this->event

        $dataFormVerify = [
            'status' => 'ACCEPT' // Ganti 'judul' menjadi 'judul_event'
        ];

        $dataGmbrEvent = $this->request->getFile('gambar');
        var_dump($dataEvent);

        $dataFormEvent = [
            'nama' => $this->request->getPost('nama'), // Ganti 'judul' menjadi 'judul_event'
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        /* if ($dataGmbrEvent->isValid()) {
            $fileName = $dataGmbrEvent->getRandomName();
            $dataFormEvent['gambar'] = $fileName;
            $dataGmbrEvent->move('img-event/', $fileName);
        } */

        $this->event->insert($dataFormEvent); // Ganti $this->event menjadi $this->lomba
        $this->verifyEvent->update($id, $dataFormVerify); // Ganti $this->product menjadi $this->lomba

        return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah');
    }

    public function reject($id)
    {
        $dataEvent = $this->verifyEvent->find($id); // Ganti $this->lomba menjadi $this->event

        $dataForm = [
            'status' => 'REJECT' // Ganti 'judul' menjadi 'judul_event'
        ];

        $this->verifyEvent->update($id, $dataForm); // Ganti $this->product menjadi $this->lomba

        return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah');
    }
}

<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\VerificationEventModel;
use Exception;

class VerifEventAdmController extends BaseController
{
    protected $verifyEvent;
    protected $event;

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

    public function accept()
    {
        $id = $this->request->getPost('id');
        try {
            $dataVerifyEvent = $this->verifyEvent->find($id);

            // Mengubah status pada Verifikasi Event menjadi Accept
            $dataFormVerify = [
                'status' => 'ACCEPT'
            ];

            // Menambah data pada Event yang diaccept
            $dataGmbrEvent = $dataVerifyEvent['gambar'];

            $dataFormEvent = [
                'nama' => $dataVerifyEvent['nama'],
                'nim' => $dataVerifyEvent['nim'],
                'judul' => $dataVerifyEvent['judul'],
                'deskripsi' => $dataVerifyEvent['deskripsi'],
                'tanggal' => $dataVerifyEvent['tanggal'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $dataFormEvent['gambar'] = $dataGmbrEvent;

            // Tambah data pada tabel Event
            $this->event->insert($dataFormEvent);

            // Update data pada tabel verifikasi event
            $this->verifyEvent->update($id, $dataFormVerify);

            return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah, Event berhasil ditambahkan');
        } catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
        }
    }

    public function reject($id)
    {
        $dataForm = [
            'status' => 'REJECT' // Ganti 'judul' menjadi 'judul_event'
        ];

        $this->verifyEvent->update($id, $dataForm); // Ganti $this->product menjadi $this->lomba

        return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah');
    }
}

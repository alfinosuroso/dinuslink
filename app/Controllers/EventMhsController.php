<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\VerificationEventModel;
use Exception;

class EventMhsController extends BaseController
{
    protected $event;
    protected $verifyEvent;

    function __construct()
    {
        $this->event = new EventModel();
        $this->verifyEvent = new VerificationEventModel();
    }

    public function index(): string
    {
        $event = $this->event->findAll();
        $verifyEvent = $this->verifyEvent->findAll();
        $data['events'] = $event;
        $data['verifyEvent'] = $verifyEvent;
        return view('/mahasiswa/v_event', $data);
    }

    public function viewCreateEvent(): string
    {
        return view('/mahasiswa/v_create_event');
    }

    public function create()
    {
        try {
            var_dump('hello');
            $dataGambar = $this->request->getFile('gambar');
            $dataProposal = $this->request->getFile('proposal');

            $dataForm = [
                // 'nama' => $this->request->getPost('nama'),
                'nama' => "Alfino", // dummy
                'nim' => "A11203415453", // dummy
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'status' => "PENDING",
                'tanggal' => $this->request->getPost('tanggal'),
                'created_at' => date("Y-m-d H:i:s")
            ];

            if ($dataGambar->isValid() && $dataProposal->isValid()) {
                $fileNameGambar = $dataGambar->getRandomName();
                $fileNameProposal = $dataProposal->getRandomName();
                $dataForm['gambar'] = $fileNameGambar;
                $dataForm['proposal'] = $fileNameProposal;
                $dataGambar->move('img-event/', $fileNameGambar);
                $dataProposal->move('img-event/', $fileNameProposal);
            }

            var_dump($dataForm);

            $this->verifyEvent->insert($dataForm);

            return redirect('event')->with('success', 'Data Berhasil Ditambahkan, Tunggu Verifikasi oleh BIMA.');
        } catch (Exception $e) {
            //alert the user.
            var_dump($e->getMessage());
        }
    }
}

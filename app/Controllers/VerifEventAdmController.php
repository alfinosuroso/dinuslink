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

    public function updateStatus()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        try {
            switch ($status) {
                case 'accept':
                    $this->accept($id);
                    break;

                case 'reject':
                    $this->reject($id);
                    break;

                case 'pending':
                    $this->pending($id);
                    break;

                default:
                    throw new Exception('Invalid status selected');
            }

            return redirect()->to('verifeventadm')->with('success', 'Status berhasil diubah');
        } catch (Exception $e) {
            return redirect()->to('verifeventadm')->with('error', $e->getMessage());
        }
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

            // Check if the event with the same judul already exists in the event table
            $existingEvent = $this->event->where('judul', $dataVerifyEvent['judul'])->first();

            if ($existingEvent) {
                // Event with the same judul exists, just update the status
                $this->verifyEvent->update($id, $dataFormVerify);
                return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah, Event sudah ada');
            } else {
                // Event with the same judul does not exist, add new event
                $dataGmbrEvent = $dataVerifyEvent['gambar'];

                $dataFormEvent = [
                    'nama' => $dataVerifyEvent['nama'],
                    'nim' => $dataVerifyEvent['nim'],
                    'judul' => $dataVerifyEvent['judul'],
                    'deskripsi' => $dataVerifyEvent['deskripsi'],
                    'tanggal' => $dataVerifyEvent['tanggal'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'gambar' => $dataGmbrEvent
                ];

                // Add data to the event table
                $this->event->insert($dataFormEvent);

                // Update the status in the verifyEvent table
                $this->verifyEvent->update($id, $dataFormVerify);

                return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah, Event berhasil ditambahkan');
            }
        } catch (Exception $e) {
            // Alert the user.
            var_dump($e->getMessage());
        }
    }


    public function reject($id)
    {
        $dataVerifyEvent = $this->verifyEvent->find($id);

        $dataForm = [
            'status' => 'REJECT'
        ];

        $this->event->where('judul', $dataVerifyEvent['judul'])->delete();
        $this->verifyEvent->update($id, $dataForm);

        return redirect()->to('verifeventadm')->with('success', 'Data Berhasil Diubah');
    }

    public function pending($id)
    {
        $dataVerifyEvent = $this->verifyEvent->find($id);
        $dataForm = [
            'status' => 'PENDING'
        ];

        $this->event->where('judul', $dataVerifyEvent['judul'])->delete();
        $this->verifyEvent->update($id, $dataForm);

        return redirect()->to('verifeventadm')->with('success', 'Status berhasil diubah menjadi Pending');
    }

    public function readData($id)
    {
        $dataForm = [
            'isReadDetail' => 'TRUE'
        ];

        $this->verifyEvent->update($id, $dataForm);

        return redirect()->to('verifeventadm')->with('success', 'Status berhasil diubah menjadi Pending');
    }
}

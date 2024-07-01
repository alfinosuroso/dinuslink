<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventMhsController extends BaseController
{
    protected $event;

    function __construct()
    {
        $this->event = new EventModel();
    }

    public function index(): string
    {
        $event = $this->event->findAll();
        $data['events'] = $event;
        return view('/mahasiswa/v_event', $data);
    }

    public function viewCreateEvent(): string
    {
        return view('/mahasiswa/v_create_event');
    }
    
}

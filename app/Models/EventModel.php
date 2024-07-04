<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'judul', 'deskripsi', 'tanggal', 'gambar', 'created_at', 'updated_at'
    ];
}

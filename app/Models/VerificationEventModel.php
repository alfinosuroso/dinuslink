<?php

namespace App\Models;

use CodeIgniter\Model;

class VerificationEventModel extends Model
{
    protected $table = 'verification_events';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'nim', 'judul', 'deskripsi', 'tanggal', 'gambar', 'proposal', 'status', 'created_at', 'updated_at'
    ];
}

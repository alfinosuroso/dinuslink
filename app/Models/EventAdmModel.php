<?php 
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
	protected $table = 'event'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'judul','organizer','tgl_event','deskripsi','lokasi','gambar_event','created_at','updated_at','status'
	];  
}
<?php 
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
	protected $table = 'verification_events'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'nama','nama','nim','judul','deskripsi','tanggal','proposal','status','created_at','updated_at'
	];  
}
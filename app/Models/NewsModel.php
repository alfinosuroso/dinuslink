<?php 
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
	protected $table = 'news'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'judul_berita','isi_berita','gambar_berita','created_at','updated_at'
	];  
}

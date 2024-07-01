<?php 
namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
	protected $table = 'news'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'judul_berita','penulis','gambar_berita','created_at','updated_at','status','kategori'
	];  
}

<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model
{
	protected $table = 'community'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'name','organizer','created_at','updated_at','status'
	];  
}
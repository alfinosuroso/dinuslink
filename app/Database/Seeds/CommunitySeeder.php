<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommunitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_komunitas' => 'Tech Enthusiasts Meetup',
                'pembuat_komunitas' => 'TechCommunity',
                'created_at' => '2024-06-30 08:00:00',
                'updated_at' => '2024-06-30 08:00:00',
                'status' => 'active',
            ],
            [
                'nama_komunitas' => 'Local Arts and Crafts Fair',
                'pembuat_komunitas' => 'ArtisansGuild',
                'created_at' => '2024-06-29 13:30:00',
                'updated_at' => '2024-06-29 13:30:00',
                'status' => 'active',
            ],
            [
                'nama_komunitas' => 'Community Health Awareness Campaign',
                'pembuat_komunitas' => 'HealthInitiative',
                'created_at' => '2024-06-28 10:45:00',
                'updated_at' => '2024-06-28 10:45:00',
                'status' => 'inactive',
            ],
        ];
        
        foreach ($data as $komunitas) {
            // insert semua data ke tabel
            $this->db->table('community')->insert($komunitas);
        }
    }
}

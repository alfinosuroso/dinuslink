<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeederAdm extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Konferensi Teknologi 2024',
                'organizer' => 'Tech Events Co.',
                'tgl_event' => '2024-07-15 09:00:00',
                'deskripsi' => 'Acara konferensi teknologi terbesar di tahun ini.',
                'lokasi' => 'Gedung Konvensi Jakarta',
                'gambar_event' => 'conference.jpg',
                'created_at' => '2024-06-30 08:00:00',
                'updated_at' => '2024-06-30 08:00:00',
                'status' => 'upcoming',
            ],
            [
                'judul' => 'Pameran Seni Rupa Kontemporer',
                'organizer' => 'Art Gallery X',
                'tgl_event' => '2024-07-20 10:00:00',
                'deskripsi' => 'Pameran seni rupa dari berbagai seniman kontemporer.',
                'lokasi' => 'Galeri Seni Bandung',
                'gambar_event' => 'art-exhibition.jpg',
                'created_at' => '2024-06-29 15:30:00',
                'updated_at' => '2024-06-29 15:30:00',
                'status' => 'ongoing',
            ],
            [
                'judul' => 'Festival Musik Indie 2024',
                'organizer' => 'Indie Music Festival',
                'tgl_event' => '2024-06-25 18:00:00',
                'deskripsi' => 'Festival musik indie dengan band-bad ternama.',
                'lokasi' => 'Lapangan Festival Surabaya',
                'gambar_event' => 'music-festival.jpg',
                'created_at' => '2024-06-28 10:45:00',
                'updated_at' => '2024-06-28 10:45:00',
                'status' => 'completed',
            ],
        ];

        foreach ($data as $lomba) {
            // insert semua data ke tabel
            $this->db->table('event')->insert($lomba);
        }
    }
}

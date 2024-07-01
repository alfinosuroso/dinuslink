<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'berita_id' => 1,
                'isi_berita' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero id dui placerat, a sollicitudin libero tempus. Sed tristique elit a metus hendrerit condimentum.',
                'created_at' => '2024-06-30 08:00:00',
                'updated_at' => '2024-06-30 08:00:00',
            ],
            [
                'berita_id' => 2,
                'isi_berita' => 'Pellentesque vitae nunc sed leo tincidunt cursus. Proin ac metus ac felis mattis fringilla. Curabitur quis ex pretium, fermentum risus eget, tempor libero.',
                'created_at' => '2024-06-29 13:30:00',
                'updated_at' => '2024-06-29 13:30:00',
            ],
            [
                'berita_id' => 3,
                'isi_berita' => 'Maecenas sit amet odio interdum, ultrices eros nec, consectetur odio. Duis at nisi et ipsum pellentesque auctor. Fusce laoreet sem nec tellus suscipit vestibulum.',
                'created_at' => '2024-06-28 10:45:00',
                'updated_at' => '2024-06-28 10:45:00',
            ],
        ];

        foreach ($data as $detailberita) {
            // insert semua data ke tabel
            $this->db->table('news_detail')->insert($detailberita);
        }
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VerificationSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Alfino Almero Suroso',
                'nim' => 'A11202315453',
                'judul' => 'ITC',
                'deskripsi' => 'Halo teman-teman SMA/SMK/MA Sederajat se-Jateng & DIY 👋 . Himpunan Mahasiswa Teknik Informatika Universitas Dian Nuswantoro akan mengadakan acara Information Technology Competition(ITC). Acara ini terdiri dari Cerdas Cermat IT dan Lomba Bisnis TIK. Acara ITC kali ini bertemakan "Kembangkan Inovasi Cerdasmu Bersama Teknologi Untuk Masa Depan" Pastinya seru dan meriah yuk jangan lupa segera daftarkan dirimu yaa...😃 . Catat tanggal dan tempatnya 📅 22 Januari 2019 🏢Tempat : Aula Gedung E Lt. 3 UDINUS . 📁Persyaratan : . Bisnis TIK 1. Lomba bersifat tim terdiri dari 3 peserta 2. Setiap perwakilan sekolah maksimal 2 tim serta 1 pendamping 3. Biaya 30K/tim 4. FC kartu pelajar 5. Surat izin/rekomendasi dari sekolah . Cerdas Cermat IT 1. Lomba bersifat individu 2. Setiap perwakilan sekolah maksimal 7 peserta serta 1 pendamping 3. Biaya 25K/peserta 4. FC kartu pelajar 5. Surat izin/rekomendasi dari sekolah . Pendaftaran di www.festival.dinus.ac.id Contact Person : Alim : 0812-3041-5641 Prabu : 0812-4729-7626 . Kuota terbatas lhoo, ayo segera daftarkan dirimu Jangan sampai kelewatan....👌',
                'tanggal' => date("Y-m-d H:i:s"),
                'gambar' => 'itc.png',
                'proposal' => 'itc.png',
                'isReadDetail' => null,
                'status' => null,
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('verification_events')->insert($item);
        }
    }
}

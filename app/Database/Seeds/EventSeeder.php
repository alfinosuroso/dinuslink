<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Alfino Almero Suroso',
                'judul' => 'ITC',
                'deskripsi' => 'Halo teman-teman SMA/SMK/MA Sederajat se-Jateng & DIY 👋 . Himpunan Mahasiswa Teknik Informatika Universitas Dian Nuswantoro akan mengadakan acara Information Technology Competition(ITC). Acara ini terdiri dari Cerdas Cermat IT dan Lomba Bisnis TIK. Acara ITC kali ini bertemakan "Kembangkan Inovasi Cerdasmu Bersama Teknologi Untuk Masa Depan" Pastinya seru dan meriah yuk jangan lupa segera daftarkan dirimu yaa...😃 . Catat tanggal dan tempatnya 📅 22 Januari 2019 🏢Tempat : Aula Gedung E Lt. 3 UDINUS . 📁Persyaratan : . Bisnis TIK 1. Lomba bersifat tim terdiri dari 3 peserta 2. Setiap perwakilan sekolah maksimal 2 tim serta 1 pendamping 3. Biaya 30K/tim 4. FC kartu pelajar 5. Surat izin/rekomendasi dari sekolah . Cerdas Cermat IT 1. Lomba bersifat individu 2. Setiap perwakilan sekolah maksimal 7 peserta serta 1 pendamping 3. Biaya 25K/peserta 4. FC kartu pelajar 5. Surat izin/rekomendasi dari sekolah . Pendaftaran di www.festival.dinus.ac.id Contact Person : Alim : 0812-3041-5641 Prabu : 0812-4729-7626 . Kuota terbatas lhoo, ayo segera daftarkan dirimu Jangan sampai kelewatan....👌',
                'tanggal' => date("Y-m-d H:i:s"),
                'gambar' => 'itc.png',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Admin',
                'judul' => 'Lomba Siaran Radio',
                'deskripsi' => '🔊🔊RADIO SWARA DIAN FAKULTAS TEKNIK UDINUS Proudly Present "Lomba siaran radio" Untuk SMA/SMK & Mahasiswa se provinsi Jawa Tengah. Ayo bergabung, dan menangkan total hadiah jutaan rupiah. 💲💲 Syarat dan ketentuan -peserta adalah pelajar SMA Sederajat & mahasiswa aktif se provinsi Jawa Tengah - 1 team terdiri dari 2 orang - peserta bukan penyiar radio swasta Pelaksanaan 📆30 & 31 januari 2019 📍Udinus Registrasi 📅Paling lambat 25januari 2019 🖥Daftar online di festival.dinus.ac.id Fasilitas Snack Makan Sertifikat Info 📱niken 085368187437',
                'tanggal' => date("Y-m-d H:i:s"),
                'gambar' => 'radio.png',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Admin',
                'judul' => 'DINUSFEST',
                'deskripsi' => 'UNIVERSITAS DIAN NUSWANTORO PRESENTS DINUSFEST 2019 22-24 JANUARI 2019 DinusFest adalah rangkaian kegiatan lomba antar SMA (dan sederajat) serta berbagai macam Expo yang diselenggarakan Universitas Dian Nuswantoro setiap tahun. Yuk ikutan DINUSFEST 2019 ! DAN MENANGKAN HADIAH TOTAL RATUSAN JUTA RUPIAH !!!!',
                'tanggal' => date("Y-m-d H:i:s"),
                'gambar' => 'dinusfest.png',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('events')->insert($item);
        }
    }
}
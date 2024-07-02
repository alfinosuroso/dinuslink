<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Libraries\IndonesianPhoneNumberProvider;

class UserSeeder extends Seeder
{
    public function run() {
        $faker = \Faker\Factory::create('id_ID');
        $faker->addProvider(new IndonesianPhoneNumberProvider($faker));

        for ($i = 0; $i < 5; $i++) {
            $data = [
                'nama' => $faker->Name,
                'nim' => $faker->numerify('A###########'),
                'password' => password_hash('1234567', PASSWORD_DEFAULT),
                'prodi' => $faker->randomElement(['teknik-informatika', 'sistem-informasi']),
                'minat' => $faker->randomElement(['mobile', 'web', 'ai']),
                'kontak' => $faker->indonesianPhoneNumber(),
                'role' => $faker->randomElement(['mahasiswa']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            print_r($data);
            $this->db->table('users')->insert($data);
        }

        //  Data admin
        $data = [
                'nama' => "admin",
                'nim' => "admin",
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'prodi' => $faker->randomElement(['teknik-informatika', 'sistem-informasi']),
                'minat' => $faker->randomElement(['mobile', 'web', 'ai']),
                'kontak' => $faker->indonesianPhoneNumber(),
                'role' => $faker->randomElement(['admin']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
                        $this->db->table('users')->insert($data);

    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdmSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'id' => $faker->randomElement([1, 2]),
                'nama' => $faker->unique()->userName,
                'password' => password_hash('123', PASSWORD_DEFAULT),
            ];

            print_r($data); // Ini untuk debugging, bisa dihapus setelah kode berfungsi
            $this->db->table('user_bima')->insert($data);
        }
    }
}

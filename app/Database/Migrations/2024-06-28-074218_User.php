<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up() {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'minat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50, 
                'null' => FALSE,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down() {
        $this->forge->dropTable('users');
    }
}

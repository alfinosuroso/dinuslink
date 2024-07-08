<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VerificationEvent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '12',
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'tanggal' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'proposal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'isReadDetail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('verification_events');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('verification_events');
    }
}

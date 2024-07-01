<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventBima extends Migration
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
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'organizer' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ],
            'tgl_event' => [
                'type' => 'DATETIME',
                'null' => FALSE,
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'gambar_event' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['upcoming', 'ongoing', 'completed'],
                'default' => 'upcoming',
                'null' => FALSE,
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('event_bima');
    }

    public function down()
    {
        $this->forge->dropTable('event_bima');
    }
}

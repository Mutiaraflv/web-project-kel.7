<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kuliner extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kuliner' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar_kuliner' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'nama_kuliner' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penjelasan_singkat' => [
                'type'       => 'TEXT',
                'constraint' => '50',
            ],
            'lokasi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'jam_buka' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'estimasi_makan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tentang' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'maps' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_kuliner', true);
        $this->forge->createTable('kuliner');
    }

    public function down()
    {
        //
    }
}

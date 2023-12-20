<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Resep extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_resep' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar_resep' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'judul_resep' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penjelasan' => [
                'type'       => 'TEXT',
                'constraint' => '100',
            ],
            'bahan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'langkah' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_resep', true);
        $this->forge->createTable('resep');
    }

    public function down()
    {
        $this->forge->dropTable('resep');
    }
}

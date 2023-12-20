<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbArtikel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_artikel' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'judul_artikel' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penjelasan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_artikel', true);
        $this->forge->createTable('tb_artikel');
    }

    public function down()
    {
        $this->forge->dropTable('tb_artikel');
    }
}

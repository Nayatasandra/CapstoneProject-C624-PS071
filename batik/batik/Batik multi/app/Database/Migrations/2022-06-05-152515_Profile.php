<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '512',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'telp'       => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],

            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profile', true);
    }

    public function down()
    {
        $this->forge->dropTable('profile');
    }
}

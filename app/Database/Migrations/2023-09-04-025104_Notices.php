<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notices extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],    
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],    
        ]);
    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('notices');
    }

    public function down()
    {
        $this->forge->dropTable('notices');
    }
}

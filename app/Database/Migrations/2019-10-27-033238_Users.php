<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
                        'id' => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE,
                        ],
                        'user' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'password' => [
                               'type'           => 'TEXT',
                        ],
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}

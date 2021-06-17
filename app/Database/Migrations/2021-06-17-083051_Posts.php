<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'       => [
				'type'           => 'INT',
				'constraint'     => '5',
				'auto_increment' => true

			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'picture'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'caption'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '140'
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
			'deleted_at' => [
				'type'           => 'DATETIME',
				'null'     		 => TRUE,
			],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('username', 'users', 'username');
		$this->forge->createTable('posts', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}

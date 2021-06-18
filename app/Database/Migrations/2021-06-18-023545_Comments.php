<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'       => [
				'type'           => 'INT',
				'constraint'     => '5',
				'auto_increment' => true

			],
			'post_id'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			],
			'user_cmt'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'comment'      => [
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
		$this->forge->addForeignKey('post_id', 'posts', 'id');
		$this->forge->addForeignKey('user_cmt', 'users', 'username');
		$this->forge->createTable('comments', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('comments');
	}
}

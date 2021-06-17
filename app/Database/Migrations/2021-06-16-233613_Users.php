<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel user
		$this->forge->addField([
			'fullname'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20'
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '16'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'role'       => [
				'type'           => 'INT',
				'constraint'     => '2'
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

		// Membuat primary key
		$this->forge->addKey('username', TRUE);

		// Membuat tabel user
		$this->forge->createTable('users', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel user
		$this->forge->dropTable('users');
	}
}

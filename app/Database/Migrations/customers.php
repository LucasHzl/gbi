<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'zip_code' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('phone');
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ticket_id' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
            ],
            'creation_date' => [
                'type' => 'DATETIME',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
            ],
            'priority' => [
                'type' => 'LONGTEXT',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
            'status' => [
                'type' => 'LONGTEXT',
                'null' => false,
                'collate' => 'utf8mb4_bin',
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('ticket_id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->dropTable('ticket');
    }
}

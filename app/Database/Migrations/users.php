<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'skills' => [
                'type' => 'LONGTEXT',
                'null' => true,
                'collate' => 'utf8mb4_bin',
            ],
        ]);

        $this->forge->addForeignKey('user_id', 'roles_users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'ticket', 'id', 'NO ACTION', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('users', 'user_id');
        $this->forge->dropColumn('users', ['last_name', 'phone', 'skills']);
    }
}

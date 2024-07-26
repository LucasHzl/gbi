<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketLogTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('ticket_log');
    }

    public function down()
    {
        $this->forge->dropTable('ticket_log');
    }
}

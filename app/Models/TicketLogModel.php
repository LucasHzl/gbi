<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketLogModel extends Model
{
    protected $table = 'ticket_log';
    protected $primaryKey = 'id';

    protected $allowedFields = [];

    protected $useTimestamps = false;
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ticket_id', 'creation_date', 'description', 'priority', 
        'status', 'user_id', 'customer_id'
    ];

    public function getUser()
    {
        return $this->db->table('users')
            ->where('users.id', $this->user_id)
            ->get()
            ->getRow();
    }

    public function getCustomer()
    {
        return $this->db->table('customers')
            ->where('customers.id', $this->customer_id)
            ->get()
            ->getRow();
    }
}

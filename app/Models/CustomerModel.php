<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name', 'last_name', 'company', 'address', 'city', 
        'zip_code', 'email', 'phone', 'role_id'
    ];

    public function getTickets()
    {
        return $this->db->table('ticket')
            ->where('customer_id', $this->id)
            ->get()
            ->getResult();
    }
}

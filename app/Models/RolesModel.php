<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['role'];

    public function getUsers()
    {
        return $this->db->table('roles_users')
            ->join('users', 'users.id = roles_users.user_id')
            ->where('roles_users.role_id', $this->id)
            ->select('users.username')
            ->get()
            ->getResult();
    }
}


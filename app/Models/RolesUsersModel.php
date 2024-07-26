<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesUsersModel extends Model
{
    protected $table = 'roles_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'role_id'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'email', 'password', 'no_telp', 'bio', 'is_verif', 'is_active', 'created_at', 'level'];
}

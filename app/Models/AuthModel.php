<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'email', 'password', 'no_telp', 'bio', 'is_verif', 'is_active', 'created_at', 'level'];

    public function getUserByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }
}

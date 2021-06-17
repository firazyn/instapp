<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['email', 'fullname', 'username',  'password', 'role'];

    public function getLogin($username)
    {
        return $this->where('username', $username)->where('deleted_at', NULL)->get()->getRow();
    }

    public function findDetail($username)
    {
        return $this->where(['username' => $username])->first();
    }
}

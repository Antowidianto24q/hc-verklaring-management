<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'level'];

    public function getUserWithProfile($userId)
    {
        return $this->db->table('profiles')
            ->select('users.id, users.username, users.level, profiles.outlet_name, profiles.address, profiles.email, profiles.phone, profiles.u_id')
            ->join('users', 'users.id = profiles.u_id')
            ->where('users.id', $userId)
            ->get()
            ->getRowArray();

            // $sql = "SELECT 
            //         users.id, users.username, users.level,
            //         profiles.outlet_name, profiles.address, profiles.email, profiles.phone, profiles.u_id
            //     FROM users
            //     JOIN PROFILES ON users.id = profiles.u_id 
            //     WHERE users.id = :userId
            //     ";
    }
}

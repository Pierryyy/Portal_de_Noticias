<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    //Atributos de Configuração
    protected $table = 'users';

    // METODO GET
    public function getUsers($user, $password)
    {

        return $this->asArray()
            ->where(['user' => $user, 'password' => md5($password)])
            ->first();
    }
}

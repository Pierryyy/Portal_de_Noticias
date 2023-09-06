<?php namespace App\Database\Seeds;

class Users extends \CodeIgniter\Database\Seeder
{
        public function run()
        {

            $data = [
                'user' => 'admin',
                'password'    => md5('123'),     
                ];

            $this->db->table('users')->insert($data);
        }
}
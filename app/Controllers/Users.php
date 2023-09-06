<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Users extends Controller
{
    public function index()
    {
        $data['session'] = \Config\Services::session();
        $data['title'] = 'Login';

        echo view('teamplates/header', $data);
        echo view('login_page');
        echo view('teamplates/footer');
    }

    public function login()
    {
        $model = new UsersModel();

        $request = \Config\Services::request();
        $user = $request->getVar('user');
        $password = $request->getVar('password');

        $data['users'] = $model->getUsers($user, $password);
        $data['session'] = \Config\Services::session();

        if (empty($data['users'])) {
            return redirect('login');
        } else {
            $sessionData = [
                'user' => $user,
                'logged_in' => TRUE
            ];
            $data['session']->set($sessionData);
            return redirect('notices');
        }
    }

    public function logout()
    {
        $data['session'] = \Config\Services::session();
        $data['session']->destroy();
        return redirect('login');
    }
}

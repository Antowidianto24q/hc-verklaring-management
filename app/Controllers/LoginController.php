<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index(){
        return view('index');
    }

    public function login(){
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $user = $model->where('username', $username)->first();
        // var_dump($user);
        // echo 'Password: ' . $password;
        // echo 'Hash: ' . $user['password'];
        // echo password_hash("123456", PASSWORD_DEFAULT);
        // die();

        if ($user && isset($user['password'])) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'level'    => $user['level'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Incorrect password');
            }
        }
    
        return redirect()->back()->with('error', 'Username not found');
    }
    

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}

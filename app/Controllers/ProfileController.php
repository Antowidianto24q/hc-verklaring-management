<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/');
        }

        $userId = session('user_id');
        $userModel = new UserModel();
        $userData = $userModel->getUserWithProfile($userId);
        // var_dump($userData); 
        // die();
        return view('profile/index', [
            'title' => 'My Profile',
            'user'  => $userData,
        ]);
    }


    public function updatePassword()
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->where('username', session('username'))->first();

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');

        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Old password incorrect.');
        }

        $userModel->update($user['id'], [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}

<?php 
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'level' => $user['level'],
                'is_logged_in' => true
            ]);
            return redirect()->to('/dashboard'); // You can change this
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}


?>
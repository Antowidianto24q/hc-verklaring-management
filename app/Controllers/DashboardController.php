<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $level = session()->get('level');
        if ($level === 'admin') {
            return redirect()->to('/dashboard/admin');
        } else {
            return redirect()->to('/dashboard/user');
        }
    }

    public function admin()
    {
        if (!$this->authorize('admin')) return redirect()->to('/');
        return view('dashboard/admin');
    }

    public function user()
    {
        if (!$this->authorize('user')) return redirect()->to('/');
        return view('dashboard/user');
    }

    private function authorize($role)
    {
        return session()->get('isLoggedIn') && session()->get('level') === $role;
    }
}

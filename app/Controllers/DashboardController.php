<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        return redirect()->to(
            session()->get('level') === 'admin' ? '/admin-dashboard' : '/user-dashboard'
        );
    }

    public function admin()
    {
        return view('dashboard/admin', ['title' => 'Admin Dashboard']);
    }

    public function user()
    {
        return view('dashboard/user', ['title' => 'User Dashboard']);
    }
}

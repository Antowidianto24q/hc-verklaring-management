<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Dashboard'];

        if (session()->get('level') === 'admin') {
            return view('dashboard/admin', $data);
        } else {
            return view('dashboard/user', $data);
        }
    }
}


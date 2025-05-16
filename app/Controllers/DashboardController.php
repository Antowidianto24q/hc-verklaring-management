<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        return "Welcome " . session()->get('username') . "! <a href='/logout'>Logout</a>";
    }
}

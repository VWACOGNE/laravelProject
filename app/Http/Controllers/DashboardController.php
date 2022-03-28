<?php

namespace App\Http\Controllers;

class DashboardController
{
    public function index()
    {
        if (\Auth::user()->is_admin) {
            return view('dashboard');
        }
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        return view('compte');
    }
}

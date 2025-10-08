<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('Admin.Users.user', compact('users'));
    }
}

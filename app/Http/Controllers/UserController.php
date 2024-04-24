<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->latest()->paginate();
        return view('pages.user.index', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    public function profile()
    {
        return view('pages.profile.index', [
            'title' => 'Profile'
        ]);
    }
}

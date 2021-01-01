<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index () {
        return view('admin.listar_users', [
                'users' => User::all(),
                'user' => Auth::user()
            ]
        );

    }
}

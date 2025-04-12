<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $users = User::with(['domains'])
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(20);

        return view('users', compact('users'));
    }
}

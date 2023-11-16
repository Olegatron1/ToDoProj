<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserService
{
    public function index(): View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

}

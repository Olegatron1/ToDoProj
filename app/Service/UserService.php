<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function index(): Collection
    {
        return User::all();
    }

}

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

    public function store(array $attributes): void
    {
        User::create($attributes);
    }

    public function update(User $user, array $attributes): void
    {
        $user->update($attributes);
    }

    public function destroy(User $user): void
    {
        $user->delete();
    }
}

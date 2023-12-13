<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function index(): Collection
    {
        return User::all();
    }

    public function store(array $attributes): User
    {
        return User::create($attributes);
    }

    public function update(User $user, array $attributes): void
    {
        $user->update($attributes);
    }

    public function destroy(User $user): void
    {
        $user->delete();
    }

    public function updateAvatar(User $user, $avatar): void
    {
        $imageName = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(public_path('images'), $imageName);
        $user->avatar = '/images/' . $imageName;
        $user->save();
    }

    public function storeAvatar(User $user, $avatar): void
    {
        $imageName = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(public_path('images'), $imageName);
        $user->avatar = '/images/' . $imageName;
        $user->save();
    }
}

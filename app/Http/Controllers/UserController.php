<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        User::create($data);

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('user.show', $user->id);
    }

    public function delete(User $user)
    {;
        $user->delete();
        return redirect()->route('user.index');
    }

}

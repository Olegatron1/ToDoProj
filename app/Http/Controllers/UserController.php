<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;

class UserController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.show', compact('user'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {

        $data = $request->validated();

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit(User $user): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('user.show', $user->id);
    }

    public function destroy(User $user): RedirectResponse
    {;
        $user->delete();
        return redirect()->route('users.index');
    }

}

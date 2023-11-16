<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller

{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
    }

    public function show(User $user): View
    {
        return view('user.show', compact('user'));
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('user.show');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }

}

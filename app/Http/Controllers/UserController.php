<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller

{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        $users = $this->userService->index();

        return view('user.index', compact('users'));
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
        $this->userService->store($request->validated());

        return redirect()->route('users.index');
    }

    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->update($user, $request->validated());

        return redirect()->route('user.show');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->userService->destroy($user);

        return redirect()->route('users.index');
    }

}

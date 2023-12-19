<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Auth\Access\AuthorizationException;
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

    public function show($userId): View
    {
        $user = User::findOrFail($userId);

        return view('user.show', [
            'user' => $user,
            'userId' => $userId,
        ]);
    }


    public function create(): View
    {
        $this->authorize('create', User::class);

        return view('user.create');
    }

    /**
     * @throws AuthorizationException
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->authorize('create', User::class);

        $user = $this->userService->store($request->validated());

        if ($request->hasFile('avatar') && $user) {
            $avatar = $request->file('avatar');
            $this->userService->storeAvatar($user, $avatar);
        }

        return redirect()->route('users.index');
    }

    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('create', User::class);

        $this->userService->update($user, $request->validated());

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $this->userService->updateAvatar($user, $avatar);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->userService->destroy($user);

        return redirect()->route('users.index');
    }

}

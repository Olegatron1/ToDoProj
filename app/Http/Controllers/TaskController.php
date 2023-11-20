<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Task;
use App\Service\TaskService;
use App\Service\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller

{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tasks = $this->taskService->index();

        return view('task.index', compact('tasks'));
    }

    public function show(Task $task): View
    {
        return view('task.show', compact('task'));
    }

    public function create(): View
    {
        return view('task.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task): View
    {
        return view('task.edit', compact('task'));
    }

    public function update(UpdateUserRequest $request, Task $task): RedirectResponse
    {
        $data = $request->validated();

        $task->update($data);

        return redirect()->route('task.show');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}


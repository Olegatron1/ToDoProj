<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Task;
use App\Service\TaskService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller

{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(): View
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
        $this->taskService->store($request->validated());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task): View
    {
        return view('task.edit', compact('task'));
    }

    public function update(UpdateUserRequest $request, Task $task): RedirectResponse
    {
        $this->taskService->update($task, $request->validated());

        return redirect()->route('task.show');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->taskService->destroy($task);

        return redirect()->route('tasks.index');
    }

}


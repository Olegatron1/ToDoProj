<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Service\TaskService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = $this->taskService->storeTask($request->validated());

        $userId = Auth::id();

        return redirect()->route('users.show', ["user" => $userId]);
    }

    public function edit(Task $task): View
    {
        return view('task.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $this->taskService->update($task, $request->validated());

        $userId = Auth::id();

        return redirect()->route('users.show', ["user" => $userId]);
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->taskService->destroy($task);

        $user_id = Auth::id();

        return redirect()->route('users.show', ["user" => $user_id]);
    }
}

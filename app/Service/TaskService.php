<?php

namespace App\Service;

use App\Http\Middleware\Authenticate;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function index(): Collection
    {
        return Task::all();
    }

    public function storeTask(array $attributes): Task
    {
        $attributes['user_id'] = Auth::id();

        return Task::create($attributes);
    }

    public function update(Task $task, array $attributes): void
    {
        $task->update($attributes);
    }

    public function destroy(Task $task): void
    {
        $task->delete();
    }
}

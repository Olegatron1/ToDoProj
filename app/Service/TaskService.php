<?php

namespace App\Service;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function index(): Collection
    {
        return Task::all();
    }

    public function store(array $attributes): void
    {
        Task::create($attributes);
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

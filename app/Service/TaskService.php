<?php

namespace App\Service;

use App\Http\Requests\Task\IndexTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function index(IndexTaskRequest $request)
    {
        $data = $request->validated();

        $taskQuery = Task::query();

        if (isset($data['name'])) {
            $taskQuery->where('name', 'like', "%{$data['name']}%");
        }

        if (isset($data['description'])) {
            $taskQuery->where('description', 'like', "%{$data['description']}%");
        }

        if (isset($data['priority'])) {
            $taskQuery->where('priority', 'like', "%{$data['priority']}%");
        }

        if (isset($data['status'])) {
            $taskQuery->where('status', 'like', "%{$data['status']}%");
        }

        if ($request->has('sort_priority')) {
            $taskQuery->orderBy('priority', $request->input('sort_priority'));
        }

        if ($request->has('sort_deadline')) {
            $taskQuery->orderBy('deadline', $request->input('sort_deadline'));
        }

        return $taskQuery->paginate(20);
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

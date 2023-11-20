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

}

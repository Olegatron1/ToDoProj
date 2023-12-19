@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div>
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-success">Workers</a>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add</a>
                </div>
                <hr>
                <div>
                    <th>
                        <div class="btn-group" role="group">
                            <a href="{{ route('tasks.index', array_merge(request()->except('sort_priority', 'sort_deadline'), ['sort_priority' => 'asc'])) }}" class="btn btn-primary {{ request()->get('sort_priority') === 'asc' ? 'active' : '' }}">Sort Priority ASC</a>
                            <a href="{{ route('tasks.index', array_merge(request()->except('sort_priority', 'sort_deadline'), ['sort_priority' => 'desc'])) }}" class="btn btn-primary {{ request()->get('sort_priority') === 'desc' ? 'active' : '' }}">Sort Priority DESC</a>
                            <a href="{{ route('tasks.index', array_merge(request()->except('sort_priority', 'sort_deadline'), ['sort_deadline' => 'asc'])) }}" class="btn btn-primary {{ request()->get('sort_deadline') === 'asc' ? 'active' : '' }}">Sort Deadline ASC</a>
                            <a href="{{ route('tasks.index', array_merge(request()->except('sort_priority', 'sort_deadline'), ['sort_deadline' => 'desc'])) }}" class="btn btn-primary {{ request()->get('sort_deadline') === 'desc' ? 'active' : '' }}">Sort Deadline DESC</a>
                        </div>
                    </th>
                </div>
                <div>
                    <form action="{{ route('tasks.index') }}" class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request()->get('name') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <input type="text" name="description" class="form-control" placeholder="Description" value="{{ request()->get('description') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <input type="text" name="priority" class="form-control" placeholder="Priority" value="{{ request()->get('priority') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ request()->get('status') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <input type="date" name="deadline" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label"></label>
                            <div class="d-flex">
                                <input type="submit" class="btn btn-primary me-2" value="Submit">
                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div>
                    @foreach($tasks as $task)
                        <div class="border border-primary p-3">
                            <div>{{$task->name}}</div>
                            <div>{{$task->description}}</div>
                            <div class="d-flex justify-content-start border p-3">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Show</a>
                                <div>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                </div>
                                <div>
                                    <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-group">
                        <label for="perPage">Show:</label>
                        <select id="perPage" class="form-select" onchange="changePerPage()">
                            <option value="5" {{ request()->get('perPage') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request()->get('perPage') == 20 || !request()->has('perPage') ? 'selected' : '' }}>20</option>
                            <option value="30" {{ request()->get('perPage') == 30 ? 'selected' : '' }}>30</option>
                            <option value="50" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                    <div class="my_nav">
                        {{ $tasks->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
                <style>
                    .my_nav svg{
                        width: 20px;
                    }
                </style>
            </div>
        </div>
    </div>
    <script>
        function changePerPage() {
            const perPage = document.getElementById('perPage').value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('perPage', perPage);
            window.location.href = window.location.pathname + '?' + urlParams.toString();
        }
    </script>
@endsection

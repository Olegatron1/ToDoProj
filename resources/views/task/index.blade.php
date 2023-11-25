@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div >
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-success">Workers</a>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add</a>
                </div>
                <hr>
                <div >
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
                                        @method('Delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


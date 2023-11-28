@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <div>
            <form action="{{ route('tasks.update', $task->id) }}" method="Post">
                @csrf
                @method('Patch')
                <div class="mb-3"><label>
                        <input  class="form-control" type="text" name="name"
                                placeholder="name" value="{{$task->name}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="description"
                               placeholder="description" value="{{$task->description}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="priority"
                               placeholder="priority" value="{{$task->priority}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="text" name="status"
                               placeholder="status" value="{{$task->status}}">
                    </label></div>
                <div class="mb-3"><label>
                        <input class="form-control" type="date" name="deadline"
                               placeholder="deadline" value="{{$task->deadline}}">
                    </label></div>

                <div class="mb-3"><input type="submit" value="Сохранить" class="btn btn-success"></div>
            </form>
        </div>
    </div>
@endsection


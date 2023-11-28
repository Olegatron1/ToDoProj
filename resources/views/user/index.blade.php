@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <div class="d-flex justify-content-between">
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-success">Task</a>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add</a>
        </div>
        <hr>
        @foreach($users as $user)
            <div>
                <div class="border border-primary p-3">
                    <div>{{$user->name}}</div>
                    <div>{{$user->surname}}</div>
                    <div class="d-flex justify-content-start border p-3">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Show</a>
                        <div>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                        <div>
                            <form action="{{route('users.destroy', $user->id)}}" method="Post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection

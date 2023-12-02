@php use App\Models\User; @endphp
@extends('layouts.app')

@section('content')
    <div>
        <hr>
        @can('create', User::class)
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-success">Task</a>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add</a>
            </div>
        @endcan
        <hr>
        @foreach($users as $user)
            <div>
                <div class="border border-primary p-3">
                    <div>{{$user->name}}</div>
                    <div>{{$user->surname}}</div>
                    <div class="d-flex justify-content-start border p-3">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mr-1">Show</a>
                        @can('create', User::class)
                            <div>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning mr-1">Edit</a>
                            </div>
                        @endcan

                        @can('create', User::class)
                            <div>
                                <form action="{{route('users.destroy', $user->id)}}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection

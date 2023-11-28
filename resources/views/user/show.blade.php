@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>{{$user->id}}</div>
            <div>{{$user->name}}</div>
            <div>{{$user->surname}}</div>
            <div>{{$user->email}}</div>
            <div>{{$user->birthdate}}</div>
            <div>{{$user->position}}</div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <hr>
        <div>
            <a href="{{ route('tasks.create', ['userId' => $userId]) }}" class="btn btn-primary">Создать задачу</a>
        </div>

        <hr>

        <div>
            <h3>Задания пользователя {{ $user->name }}:</h3>
            @if(count($user->tasks) > 0)
                <ul>
                    @foreach($user->tasks as $task)
                        <li>{{ $task->name }} - {{ $task->description }}</li>
                    @endforeach
                </ul>
            @else
                <p>У этого пользователя пока нет заданий.</p>
            @endif
        </div>
    </div>
@endsection

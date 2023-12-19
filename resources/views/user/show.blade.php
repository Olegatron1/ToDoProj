@extends('layouts.app')

@section('content')
    <div>
        <div class="avatar-square">
            @if($user->avatar)
                <div class="avatar-container" style="width: 50px; height: 50px; overflow: hidden; border: 2px solid #ccc; border-radius: 4px;">
                    <img class="avatar" src="{{ $user->avatar }}" alt="Avatar" style="width: 100%; height: auto; display: block;">
                </div>
            @else
                <!-- Если аватар не загружен, можно отобразить стандартное изображение или надпись -->
                <span>Нет аватара</span>
            @endif
        </div>
        <div>
            <div>{{$user->name}}</div>
            <div>{{$user->surname}}</div>
            <div>{{$user->email}}</div>
            <div>{{$user->birthdate}}</div>
            <div>{{$user->position}}</div>
            @can('create', User::class)
                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
                </div>
            @endcan
        </div>
        <hr>
        <div>
            <a href="{{ route('tasks.create', ['userId' => $userId]) }}" class="btn btn-primary">Создать задачу</a>
        </div>

        <hr>

        <div>
            @if(count($user->tasks) > 0)
                <ul>
                    @foreach($user->tasks as $task)
                        <div class="border border-primary p-3">
                            <div>{{$task->name}}</div>
                            <div>{{$task->description}}</div>
                            <div class="d-flex justify-content-start border p-3">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info mr-1">Show</a>
                                <div>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning mr-1">Edit</a>
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
                </ul>
            @else
                <p>У этого пользователя пока нет заданий.</p>
            @endif
        </div>
    </div>
@endsection

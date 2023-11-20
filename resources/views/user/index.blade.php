@php use App\Models\User; @endphp
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <hr>

    @can('create', User::class)
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Добавить</a>
        </div>
    @endcan
        <hr>
        @foreach($users as $user)
            <div>
                <div>{{$user->name}}</div>
                <div>{{$user->surname}}</div>
                <div>{{$user->email}}</div>
                <div>{{$user->birthdate}}</div>
                <div>{{$user->position}}</div>
                <a href="{{ route('users.show', $user->id) }}" style="margin-bottom: 15px" class="btn btn-info">Посмотреть</a>
                @can('create', $user)
                    <div>
                        <a href="{{ route('users.edit', $user->id) }}" style="margin-bottom: 15px" class="btn btn-warning">Редактировать</a>
                    </div>
                @endcan
                @can('delete', $user)
                    <div>
                        <form action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('Delete')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </div>
                @endcan
            </div>
            <hr>
        @endforeach
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

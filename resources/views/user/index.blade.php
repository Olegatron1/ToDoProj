<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <hr>
    <div>
        <a href="{{ route('user.create')  }}">Добавить</a>
    </div>
    <hr>
    @foreach($users as $user)
        <div>
            <div>{{$user->name}}</div>
            <div>{{$user->surname}}</div>
            <div>{{$user->email}}</div>
            <div>{{$user->birthdate}}</div>
            <div>{{$user->position}}</div>
            <a href="{{ route('user.show', $user->id) }}">Посмотреть</a>
        </div>
        <hr>
    @endforeach
</div>
</body>
</html>

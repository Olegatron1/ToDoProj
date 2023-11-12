<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <div>{{$user->name}}</div>
        <div>{{$user->surname}}</div>
        <div>{{$user->email}}</div>
        <div>{{$user->birthdate}}</div>
        <div>{{$user->position}}</div>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-dark">Назад</a>
        </div>
    </div>
    <hr>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

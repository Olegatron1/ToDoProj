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
Create page
<div>
    <hr>
        <div>
            <form action="{{ route('user.update', $user->id) }}" method="Post">
                @csrf
                @method('Patch')
                <div style="margin-bottom: 15px"><label>
                        <input type="text" name="name"
                            placeholder="name" value="{{$user->name}}">
                    </label></div>
                <div style="margin-bottom: 15px"><label>
                        <input type="text" name="surname"
                            placeholder="surname" value="{{$user->surname}}">
                    </label></div>
                <div style="margin-bottom: 15px"><label>
                        <input type="email" name="email"
                            placeholder="email" value="{{$user->email}}">
                    </label></div>
                <div style="margin-bottom: 15px"><label>
                        <input type="date" name="birthdate"
                            placeholder="birthdate" value="{{$user->name}}">
                    </label></div>
                <div style="margin-bottom: 15px"><label>
                        <input type="text" name="position"
                            placeholder="position" value="{{$user->position}}">
                    </label></div>
                <div style="margin-bottom: 15px"><label>
                        <input type="password" name="password"
                            placeholder="password" value="{{$user->password}}">
                    </label></div>

                <div style="margin-bottom: 15px"><input type="submit" value="Сохранить" class="btn btn-success"></div>
            </form>
        </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
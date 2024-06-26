<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title >ToDo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Дополнительные стили, если нужно -->
    @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-3" href="{{ route('users.show', ['user' => Auth::id()]) }}">ToDoList</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mr-3" type="submit">Выход</button>
                </form>
            </li>
            <!-- Другие ссылки навигации -->
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>

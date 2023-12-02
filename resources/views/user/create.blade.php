@extends('layouts.app')

@section('content')
    <div>
        <hr>
        <div>
            <form action="{{ route('users.store') }}" method="Post">
                @csrf
                <div class="mb-2"><label>
                        <input class="form-control" type="text" name="name"
                               placeholder="name">
                    </label></div>
                <div class="mb-2"><label>
                        <input class="form-control" type="text" name="surname"
                               placeholder="surname">
                    </label></div>
                <div class="mb-2"><label>
                        <input class="form-control" type="email" name="email"
                               placeholder="email">
                    </label></div>
                <div class="mb-2"><label>
                        <input class="form-control" type="date" name="birthdate"
                               placeholder="birthdate">
                    </label></div>
                <div class="mb-2"><label>
                        <input class="form-control" type="text" name="position"
                               placeholder="position">
                    </label></div>
                <div class="mb-2"><label>
                        <input class="form-control" type="password" name="password"
                               placeholder="password">
                    </label></div>

                <div class="mb-2"><input type="submit" value="Добавить" class="btn btn-danger"></div>
            </form>
        </div>
    </div>
@endsection
